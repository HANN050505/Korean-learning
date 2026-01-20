@extends('layouts.dashboard')

@section('title', 'progress')

@section('content')
<div class="progress-wrapper">
    <div class="progress-header">
        <h1>Beranda</h1>
        <p>Biar aku aja yang isi kalimatnya</p>
    </div>

    <div class="progress-progress">
        <div class="progress-bar">
            <div class="progress-fill" style="width: 30%;"></div>
        </div>
        <span class="progress-text">30%</span>
    </div>
</div>

<p></p>
<div class="stats-card">
    <h3>Statistik Bulan Ini</h3>
    
    <div class="chart-container">
        {{-- SENIN --}}
        {{-- title="..." akan memunculkan tulisan kecil saat mouse diam di atas batang --}}
        <div class="chart-bar-wrapper" title="Total Login: {{ $stats['Monday']['count'] ?? 0 }}x">
            <div class="bar" style="height: {{ $stats['Monday']['height'] ?? 5 }}%;"></div> 
            <span class="day">Sen</span>
        </div>

        {{-- SELASA --}}
        <div class="chart-bar-wrapper" title="Total Login: {{ $stats['Tuesday']['count'] ?? 0 }}x">
            <div class="bar" style="height: {{ $stats['Tuesday']['height'] ?? 5 }}%;"></div>
            <span class="day">Sel</span>
        </div>

        {{-- RABU --}}
        <div class="chart-bar-wrapper" title="Total Login: {{ $stats['Wednesday']['count'] ?? 0 }}x">
            <div class="bar" style="height: {{ $stats['Wednesday']['height'] ?? 5 }}%;"></div>
            <span class="day">Rab</span>
        </div>

        {{-- KAMIS --}}
        <div class="chart-bar-wrapper" title="Total Login: {{ $stats['Thursday']['count'] ?? 0 }}x">
            <div class="bar" style="height: {{ $stats['Thursday']['height'] ?? 5 }}%;"></div>
            <span class="day">Kam</span>
        </div>

        {{-- JUMAT --}}
        <div class="chart-bar-wrapper" title="Total Login: {{ $stats['Friday']['count'] ?? 0 }}x">
            <div class="bar" style="height: {{ $stats['Friday']['height'] ?? 5 }}%;"></div>
            <span class="day">Jum</span>
        </div>

        {{-- SABTU --}}
        <div class="chart-bar-wrapper" title="Total Login: {{ $stats['Saturday']['count'] ?? 0 }}x">
            <div class="bar" style="height: {{ $stats['Saturday']['height'] ?? 5 }}%;"></div>
            <span class="day">Sab</span>
        </div>

        {{-- MINGGU --}}
        <div class="chart-bar-wrapper" title="Total Login: {{ $stats['Sunday']['count'] ?? 0 }}x">
            <div class="bar" style="height: {{ $stats['Sunday']['height'] ?? 5 }}%;"></div>
            <span class="day">Ming</span>
        </div>
    </div>
</div>

@endsection
