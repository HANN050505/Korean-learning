@extends('layouts.dashboard')

@section('title', 'Informasi Aplikasi')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        
        {{-- TOMBOL KEMBALI (Updated) --}}
        {{-- Menggunakan style yang sama dengan Pusat Bantuan (mt-3) --}}
        <div class="mb-4 mt-3">
            <a href="{{ route('profile.edit') }}" class="btn-back-custom d-inline-flex align-items-center gap-2 px-4 py-2 rounded-pill shadow-sm text-decoration-none">
                <i class="bi bi-arrow-left icon-animate"></i>
                <span class="fw-medium">Kembali ke Profil</span>
            </a>
        </div>

        <div class="card shadow-sm border-0 rounded-lg p-4">
            {{-- Header Logo --}}
            <div class="text-center mb-4">
                <div class="bg-success bg-opacity-10 text-success d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                    ㅎ
                </div>
                <h2 class="h4 fw-bold text-dark">Korean Learning App</h2>
                <p class="text-muted">Belajar Bahasa Korea jadi lebih mudah</p>
            </div>

            {{-- BAGIAN TENTANG & FITUR --}}
            <div class="mb-4 px-2">
                <h5 class="fw-bold text-dark mb-2">Tentang Aplikasi</h5>
                <p class="text-muted" style="line-height: 1.6;">
                    Korean Learning App adalah platform belajar bahasa Korea yang dirancang khusus untuk pemula. 
                    Kami membantu kamu memahami dasar-dasar Hangeul, kosakata sehari-hari, hingga tata bahasa 
                    dengan metode yang interaktif dan menyenangkan.
                </p>

                <h5 class="fw-bold text-dark mb-3 mt-4">Fitur Utama</h5>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled text-muted">
                            <li class="mb-2 d-flex align-items-center">
                                <span class="text-success me-2">✔</span> Belajar Hangeul Dasar
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <span class="text-success me-2">✔</span> Materi Terstruktur
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled text-muted">
                            <li class="mb-2 d-flex align-items-center">
                                <span class="text-success me-2">✔</span> Kuis Interaktif
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <span class="text-success me-2">✔</span> Tracking Progress Belajar
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Bagian Versi Aplikasi --}}
            <div class="border-top pt-4">
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Versi Aplikasi</span>
                    <span class="fw-semibold text-dark">1.0.0 (Beta)</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Dibuat oleh</span>
                    <span class="fw-semibold text-dark">Tim Developer Kece</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Framework</span>
                    <span class="fw-semibold text-dark">Laravel 11 & Bootstrap</span>
                </div>
            </div>

            <div class="mt-4 text-center text-muted small">
                &copy; {{ date('Y') }} All Rights Reserved.
            </div>
        </div>
    </div>
</div>

@endsection