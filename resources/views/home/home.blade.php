@extends('layouts.dashboard')

@section('title', 'home')

@section('content')
<div class="home-wrapper">

    <div class="home-header">
        <h1>Beranda</h1>
        <p>Biar aku aja yang isi kalimatnya</p>
    </div>

    <div class="home-welcome">
        <h2>Selamat datang di K-Class</h2>
        <p>Biar aku aja yang isi kalimatnya</p>
    </div>

    <div class="home-progress">
        <div class="progress-bar">
            <div class="progress-fill" style="width: 30%;"></div>
        </div>
        <span class="progress-text">30%</span>
    </div>

    <div class="home-premium">
        <div class="premium-card">
            <div class="premium-img"></div>
            <strong>Anggota<br>Premium</strong>
        </div>
    </div>

</div>

@endsection
