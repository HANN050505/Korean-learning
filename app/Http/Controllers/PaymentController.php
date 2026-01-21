<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\User;

class PaymentController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();

        // 1. Cek apakah user sudah premium
        if ($user->is_premium) {
            return redirect()->back()->with('error', 'Akun Anda sudah Premium!');
        }

        // 2. Buat Order ID & Simpan Database (Awal)
        $orderId = 'ORDER-' . $user->id . '-' . time();
        $grossAmount = 50000;

        $payment = Payment::create([
            'user_id' => $user->id,
            'order_id' => $orderId,
            'amount' => $grossAmount,
            'status' => 'pending',
            // snap_token biarkan NULL dulu
        ]);

        // 3. SIAPKAN DATA MIDTRANS
        // PERBAIKAN: Ambil key dari file .env (JANGAN TULIS LANGSUNG DISINI)
        $serverKey = env('MIDTRANS_SERVER_KEY'); 

        // Cek jika key belum di-set di .env
        if (!$serverKey) {
            dd("Error: MIDTRANS_SERVER_KEY belum diatur di file .env");
        }
        
        $payload = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'credit_card' => [
                'secure' => true
            ]
        ];

        // 4. TEMBAK API MANUAL (BYPASS ERROR 10023)
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://app.sandbox.midtrans.com/snap/v1/transactions');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Accept: application/json',
                // Authorization header menggunakan key dari env
                'Authorization: Basic ' . base64_encode($serverKey . ':')
            ]);
            
            // --- KUNCI ANTI ERROR SSL ---
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            // ----------------------------

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            // 5. PROSES HASILNYA
            if ($httpCode === 201) {
                // Sukses! Ambil token
                $result = json_decode($response);
                $snapToken = $result->token;

                // Update database agar TIDAK NULL lagi
                $payment->update(['snap_token' => $snapToken]);

                // Tampilkan halaman bayar
                return view('payment.checkout', compact('snapToken', 'payment'));
            } else {
                // Gagal dari Midtrans
                dd('Gagal Konek Midtrans (' . $httpCode . '): ' . $response);
            }

        } catch (\Exception $e) {
            dd("Error Sistem: " . $e->getMessage());
        }
    }

    public function success(Payment $payment)
    {
        $payment->update(['status' => 'success']);
        
        $user = User::find($payment->user_id);
        $user->update(['is_premium' => true]);

        return redirect()->route('home')->with('success', 'Pembayaran Berhasil! Akun Anda kini Premium.');
    }
}