@extends('layouts.dashboard')

@section('title', 'Quizzes')

@section('content')
<div class="lessons-wrapper">

    <div class="home-header" style="display: flex; justify-content: space-between; align-items: center;">
        {{-- Bagian Kiri: Teks Judul --}}
        <div>
            <h1>Quizzes</h1>
            <p>Uji pemahamanmu dari setiap materi</p>
        </div>
        {{-- Bagian Kanan: Logo --}}
        <img src="{{ asset('images/icons/korea.png') }}" alt="Korea Logo" style="width: 70px; height: auto;">
        
    </div>

    <div class="lessons-grid">
        @foreach ($lessons as $lesson)
            {{-- 1. BAGIAN INI PENTING: MENCARI NILAI DARI DATABASE --}}
            @php
                // Cari nilai user untuk kuis ini
                $result = \App\Models\QuizResult::where('user_id', Auth::id())
                                ->where('quiz_id', $lesson->id)
                                ->orderBy('score', 'desc') // Ambil yang paling tinggi
                                ->first();
                
                $userScore = $result ? $result->score : null;
            @endphp

            <div class="lessons-card">

                <div class="lessons-img">
                    <img src="{{ asset($lesson->icon) }}">
                </div>

                <h3>{{ $lesson->title }}</h3>
                
                {{-- LOGIKA AKSES (Gratis / Premium) --}}
                @if ($lesson->id <= 2 || auth()->user()->is_premium)
                    
                    {{-- 2. LOGIKA TAMPILAN TOMBOL BERDASARKAN NILAI --}}
                    
                    @if($userScore !== null)
                        {{-- Jika User SUDAH pernah mengerjakan --}}
                        
                        @if($userScore > 80)
                            {{-- KONDISI LULUS --}}
                            <a href="#" style="color: #2ecc71; font-weight: bold; text-decoration: none; cursor: default;">
                                ✅ Selesai ({{ $userScore }})
                            </a>
                        @else
                            {{-- KONDISI BELUM LULUS (Misal dapet 40) --}}
                            <a href="{{ route('quizzes.show', $lesson->id) }}" style="color: #e67e22; font-weight: bold; text-decoration: none;">
                                🔄 Coba Lagi (Skor: {{ $userScore }})
                            </a>
                        @endif

                    @else
                        {{-- Jika User BELUM pernah mengerjakan --}}
                        <a href="{{ route('quizzes.show', $lesson->id) }}">
                            Mulai Quiz
                        </a>
                    @endif

                @else
                    {{-- JIKA PREMIUM TERKUNCI --}}
                    <span class="btn premium">🔒 Premium</span>
                @endif

            </div>
        @endforeach
    </div>

</div>
@endsection