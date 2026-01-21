<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            
            // 1. Yang Bayar Siapa? (Konek ke tabel users)
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            // 2. Nomor Order Unik (Wajib buat Midtrans, misal: ORDER-12345)
            $table->string('order_id')->unique(); 
            
            // 3. Nominal Bayar
            $table->decimal('amount', 10, 2);
            
            // 4. Status Pembayaran (pending, success, failed, expired)
            $table->string('status')->default('pending');
            
            // 5. Token Popup Midtrans (Ini yang tadi kamu cari)
            $table->string('snap_token')->nullable();
            
            // 6. Tipe Pembayaran (Gopay, BCA, Indomaret, dll - Opsional)
            $table->string('payment_type')->nullable(); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
