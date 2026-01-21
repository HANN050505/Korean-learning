@extends('layouts.dashboard')

@section('title', 'Progress Belajar')

@section('content')
<div class="progress-wrapper">
    <div class="progress-header">
        <h1>Beranda</h1>
        <p>Statistik kelulusan kuis bahasa Korea kamu</p>
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

{{-- STATISTIK LOGIN --}}
<div class="stats-card">
    <h3>Statistik Login Bulan Ini</h3>
    
    <div class="chart-container">
        {{-- Loop hari dalam seminggu --}}
        @foreach(['Monday'=>'Sen', 'Tuesday'=>'Sel', 'Wednesday'=>'Rab', 'Thursday'=>'Kam', 'Friday'=>'Jum', 'Saturday'=>'Sab', 'Sunday'=>'Ming'] as $english => $indo)
            <div class="chart-bar-wrapper" title="Total Login: {{ $stats[$english]['count'] ?? 0 }}x">
                {{-- Cek apakah data hari itu ada, jika tidak pakai default 5% tingginya --}}
                <div class="bar" style="height: {{ $stats[$english]['height'] ?? 5 }}%;"></div> 
                <span class="day">{{ $indo }}</span>
            </div>
        @endforeach
    </div>
</div>
@endsection