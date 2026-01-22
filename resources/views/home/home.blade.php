@extends('layouts.dashboard')

@section('title', 'home')

@section('content')
<div class="home-wrapper">

    <div class="home-header" style="display: flex; justify-content: space-between; align-items: center;">
        {{-- Bagian Kiri: Teks Judul --}}
        <div>
            <h1>Beranda</h1>
            <p>Biar aku aja yang isi kalimatnya</p>
        </div>
        {{-- Bagian Kanan: Logo --}}
        <img src="{{ asset('images/icons/korea.png') }}" alt="Korea Logo" style="width: 70px; height: auto;">
        
    </div>

    <div class="home-welcome">
        <h2>Selamat datang di K-Class</h2>
        <p>Biar aku aja yang isi kalimatnya</p>
    </div>

    <div class="progress-progress">
        <div class="progress-bar">
            {{-- Lebar bar sesuai variabel $percentage dari Controller --}}
            <div class="progress-fill" style="width: {{ $percentage }}%;"></div>
        </div>
        
        {{-- Teks angka dinamis --}}
        <div style="display: flex; justify-content: space-between; margin-top: 5px;">
            <span class="progress-text font-weight-bold">{{ $percentage }}% Selesai</span>
            {{-- UBAH DISINI: Dari 'Materi' jadi 'Kuis Lulus' --}}
            <span style="font-size: 0.9em; color: #666;">({{ $completed }} / {{ $total }} Kuis Lulus)</span>
        </div>
    </div>
</div>

<p></p>

   <div class="home-premium mt-4">
        
        {{-- CEK STATUS: Jika User SUDAH Premium --}}
        @if(auth()->user()->is_premium)
            <div class="premium-card" style="background: linear-gradient(135deg, #96e6a1); cursor: default;">
                <div class="premium-img">
                    
                </div>
                <div style="margin-left: 10px;">
                    <strong style="color: #155724;">Member Premium<br>Aktif</strong>
                    <div style="font-size: 12px; color: #155724;">Terima kasih sudah berlangganan!</div>
                </div>
            </div>

        {{-- CEK STATUS: Jika User MASIH Gratis (Belum Premium) --}}
        @else
            <a href="{{ route('payment.checkout') }}" style="text-decoration: none; color: inherit;">
                <div class="premium-card" style="cursor: pointer; transition: transform 0.2s; border: 2px solid #ffd700;">
                    <div class="premium-img">

                    </div>
                    <div style="margin-left: 10px;">
                        <strong>Upgrade ke<br>Premium</strong>
                        <div style="font-size: 12px; color: #666;">Klik untuk buka semua fitur</div>
                    </div>
                </div>
            </a>
        @endif

    </div>

</div>

@endsection
