@extends('admin.layouts.dashboard')

@section('title', 'Dashboard Overview')

@section('admin.content')


<div class="container-fluid p-0">
    {{-- Header Halaman --}}
    <div class="home-header" style="display: flex; justify-content: space-between; align-items: center;">
        {{-- Bagian Kiri: Teks Judul --}}
        <div>
            <h2 class="fw-bold text-dark">Dashboard Overview</h2>
            <p class="text-muted mb-0">Ringkasan aktivitas aplikasi.</p>
            <p></p>
            <span class="badge bg-primary">{{ date('d M Y') }}</span>
        </div>
        {{-- Bagian Kanan: Logo --}}
        <img src="{{ asset('images/icons/korea.png') }}" alt="Korea Logo" style="width: 70px; height: auto;">
        
    </div>


    {{-- 1. KARTU STATISTIK --}}
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card-stat bg-primary-soft">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-2" style="opacity: 0.8">Total User</h6>
                        <h2 class="mb-0 fw-bold">{{ $totalUsers ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-stat bg-success-soft">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-2" style="opacity: 0.8">User Premium</h6>
                        <h2 class="mb-0 fw-bold">{{ $premiumUsers ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-stat bg-info-soft">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-2" style="opacity: 0.8">Total Materi</h6>
                        <h2 class="mb-0 fw-bold">{{ $totalLessons ?? 0 }} Bab</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-stat bg-warning-soft">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-2" style="opacity: 0.8">Pendapatan</h6>
                        <h2 class="mb-0 fw-bold">Rp {{ number_format($revenue ?? 0, 0, ',', '.') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 2. TABEL USER BULAN INI --}}
    <div class="card table-card">
        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
            {{-- Ubah Judul jadi lebih spesifik --}}
            <h5 class="mb-0 fw-bold text-dark">Pendaftar Bulan Ini ({{ date('F Y') }})</h5>
            <small class="text-muted">Menampilkan 5 terbaru</small>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Nama Pengguna</th>
                            <th class="d-none d-md-table-cell">Email</th> {{-- Hide email di HP biar rapi --}}
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentUsers ?? [] as $user)
                        <tr>
                            <td class="ps-4 fw-bold">
                                <div class="d-flex align-items-center">
                                    {{-- Avatar kecil --}}
                                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-2" style="width: 30px; height: 30px; font-size: 12px;">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td class="d-none d-md-table-cell">{{ $user->email }}</td>
                            <td>
                                @if($user->is_premium)
                                    <span class="badge bg-warning text-dark">Premium</span>
                                @else
                                    <span class="badge bg-secondary">Free</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td class="text-end pe-4">
                                {{-- Link ke Detail yang sudah kita perbaiki tadi --}}
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-5">
                                <img src="{{ asset('images/icons/empty.png') }}" alt="" style="width: 50px; opacity: 0.5; margin-bottom: 10px;">
                                <br>
                                Belum ada pendaftar baru di bulan {{ date('F') }} ini.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>  

@endsection