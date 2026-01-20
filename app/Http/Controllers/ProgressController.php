<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\LoginHistory;

class ProgressController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // 1. Ambil range TANGGAL 1 s/d AKHIR BULAN ini
        $startOfMonth = Carbon::now()->startOfMonth(); 
        $endOfMonth   = Carbon::now()->endOfMonth();

        // 2. Ambil semua data login bulan ini & ubah jadi nama hari
        $logs = LoginHistory::where('user_id', $userId)
                    ->whereBetween('login_date', [$startOfMonth, $endOfMonth])
                    ->get()
                    ->map(function($item) {
                        // Ambil nama harinya saja (Monday, Tuesday...)
                        return Carbon::parse($item->login_date)->locale('en')->format('l'); 
                    })
                    // Hitung jumlah kemunculan per hari
                    // Contoh hasil: ['Monday' => 3, 'Tuesday' => 1]
                    ->countBy() 
                    ->toArray();

        // 3. Siapkan data untuk grafik (Senin - Minggu)
        // Rumus Tinggi: (Jumlah Login / 5) * 100. 
        // Kenapa bagi 5? Karena dlm sebulan maksimal ada 5 hari Senin.
        
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $stats = [];

        foreach ($days as $day) {
            $count = $logs[$day] ?? 0; // Jumlah login hari itu
            
            // Hitung persentase tinggi (Maksimal 100%)
            $height = ($count / 5) * 100;
            if ($height > 100) $height = 100; // Jaga-jaga biar gak lewat atap
            if ($count > 0 && $height < 10) $height = 10; // Biar tetep kelihatan kalau ada isinya

            $stats[$day] = [
                'count'  => $count,  // Untuk ditampilkan sebagai angka (misal: 3x)
                'height' => $height  // Untuk tinggi CSS
            ];
        }

        return view('progress', compact('stats'));
    }
}