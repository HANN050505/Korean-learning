
@extends('layouts.dashboard')

@section('title', 'lessons')

@section('content')


<div class="quizzes-wrapper">

    <div class="quizzes-header" style="display: flex; justify-content: space-between; align-items: center;">
        {{-- Bagian Kiri: Teks Judul --}}
        <div>
            <h1>Lessons</h1>
            <p>Pelajari huruf dalam Bahasa Korea</p>
        </div>
        {{-- Bagian Kanan: Logo --}}
        <img src="{{ asset('images/icons/korea.png') }}" alt="Korea Logo" style="width: 70px; height: auto;">
        
    </div>
    

<div class="lessons-grid">
    @foreach ($lessons as $lesson)
        <div class="lessons-card">
            <div class="lessons-img">
                <img src="{{ asset($lesson->icon) }}" alt="{{ $lesson->title }}">
            </div>

            <strong>
                <h3>{{ $lesson->title }}</h3>
                @if ($lesson->id <= 2 || auth()->user()->is_premium)
            <a href="{{ route('lessons.show', $lesson->id) }}">
                Mulai Belajar
            </a>
                @else
                    <span class="locked">
                        🔒 Premium
                    </span>
                @endif
            </strong>
        </div>
    @endforeach




      
</div>
</div>

@endsection
