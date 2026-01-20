@extends('layouts.dashboard')

@section('title', 'Quizzes')

@section('content')
<div class="lessons-wrapper">

    <div class="lessons-header">
        <h1>Quizzes</h1>
        <p>Uji pemahamanmu dari setiap materi</p>
    </div>

    <div class="lessons-grid">
@foreach ($lessons as $lesson)
    <div class="lessons-card">

        <div class="lessons-img">
            <img src="{{ asset($lesson->icon) }}">
        </div>

        <h3>{{ $lesson->title }}</h3>
        @if ($lesson->id <= 2 || auth()->user()->is_premium)
            <a href="{{ route('quizzes.show', $lesson->id) }}">
                Mulai Quiz
            </a>
        @else
            <span class="btn premium">🔒 Premium</span>
        @endif

    </div>
@endforeach
</div>


    </div>

</div>
@endsection
