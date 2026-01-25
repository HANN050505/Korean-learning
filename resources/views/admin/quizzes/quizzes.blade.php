@extends('admin.layouts.dashboard')

@section('title', 'Bank Soal')

@section('admin.content')


<div class="container-fluid p-0">

    <div class="home-header" style="display: flex; justify-content: space-between; align-items: center;">
        {{-- Bagian Kiri: Teks Judul --}}
        <div>
            <h2 class="fw-bold text-dark">Manajemen Soal</h2>
            <p class="text-muted mb-0">Daftar semua soal yang tersedia.</p>
            <p></p>
            <span class="badge bg-primary">{{ date('d M Y') }}</span>
        </div>
        {{-- Bagian Kanan: Logo --}}
        <img src="{{ asset('images/icons/korea.png') }}" alt="Korea Logo" style="width: 70px; height: auto;">
        
    </div>


    <h1 class="h3 mb-4 text-gray-800">Bank Soal (Pilih Materi)</h1>

    

    <div class="row">
        {{-- GANTI $lessonsWithQuiz MENJADI $lessons --}}
        @forelse($lessons as $lesson)
        <div class="col-md-4 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $lesson->title }}</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{-- Cek jumlah soal --}}
                                @if($lesson->quiz && $lesson->quiz->questions->count() > 0)
                                    {{ $lesson->quiz->questions->count() }} Soal Tersedia
                                @else
                                    <span class="text-danger">Belum ada kuis</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <hr>
                    
                    {{-- Tombol Kelola --}}
                    {{-- Pastikan route 'admin.quizzes.manage' sudah ada di web.php --}}
                    <a href="{{ route('admin.quizzes.manage', $lesson->id) }}" class="btn btn-primary btn-block btn-sm">
                        <i class="fas fa-edit"></i> Kelola Soal
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">
                Belum ada materi pelajaran. Silakan buat materi dulu di menu Lessons.
            </div>
        </div>
        @endforelse
    </div>
    
    {{-- Pagination (Sekarang sudah cocok karena pakai $lessons) --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $lessons->links() }}
    </div>
</div>
@endsection