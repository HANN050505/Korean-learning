@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')

<div class="profile-page">
<div class="profile-wrapper">

    {{-- Header Profile --}}
    <div class="profile-header d-flex align-items-center mb-4">
        <img src="{{ asset('images/icons/profile.png') }}" class="profile-avatar me-3">

        <div class="profile-info">
    @if(auth()->user()->is_premium)
        <small class="text-success fw-semibold">⭐ Pengguna Premium</small>
    @else
        <small class="text-muted">Pengguna Gratis</small>

        <div class="mt-2">
            {{-- PERUBAHAN ADA DI SINI --}}
            {{-- Mengarahkan ke route checkout yang sudah kita buat --}}
            <a href="{{ route('payment.checkout') }}" class="btn btn-warning btn-sm">
                ⭐ Upgrade ke Premium
            </a>
        </div>
    @endif
</div>

        <a href="#" class="ms-auto edit-icon">
            <img src="{{ asset('images/icons/edit.png') }}" class="profile-side" >
        </a>
    </div>

    {{-- Menu Box --}}
    <div class="profile-menu">

        <a href="#" class="profile-item">
            <img src="{{ asset('images/icons/info.png') }}" class="item-img">
            <span>Informasi Aplikasi</span>
            <img src="{{ asset('images/icons/arrow.png') }}" class="arrow">
        </a>
        <a href="#" class="profile-item">
            <img src="{{ asset('images/icons/settings.png') }}" class="item-img">
            <span>Pusat Bantuan</span>
            <img src="{{ asset('images/icons/arrow.png') }}" class="arrow">
        </a>
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="profile-item profile-logout">
                <img src="{{ asset('images/icons/logout.png') }}" class="item-img">
                <span>Keluar</span>
                <img src="{{ asset('images/icons/arrow.png') }}" class="arrow">
            </button>
        </form>

        
    </div>
</div>
@endsection