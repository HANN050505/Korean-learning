<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('quiz_id')->constrained()->cascadeOnDelete();
            
            // --- PERBAIKAN DISINI ---
            $table->integer('score'); // <--- WAJIB ADA untuk menyimpan nilai 0-100
            
            // Kita buat nullable dulu supaya tidak error kalau datanya belum dikirim
            $table->integer('correct')->nullable(); 
            $table->integer('wrong')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_results');
    }
};