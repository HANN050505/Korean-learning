@extends('layouts.dashboard')

@section('title', $lesson->title)

@section('content')
<div class="lesson-wrapper">

    <div class="lesson-header">
        <h1>{{ $lesson->title }}</h1>
        <p>Klik kartu untuk mendengar pelafalan</p>
    </div>

    <div class="vocab-list">
        @foreach ($lesson->vocabularies as $index => $vocab)
            <div 
                class="vocab-card clickable"
                onclick="speak('{{ $vocab->korean }}')">

                <span class="vocab-number">{{ $index + 1 }}.</span>

                <div class="vocab-text">
                    <strong>{{ $vocab->meaning }}</strong>

                    <span class="vocab-korean">
                        {{ $vocab->korean }} ({{ $vocab->latin }})
                    </span>
                </div>
            </div>
        @endforeach
    </div>

</div>

<script>
function speak(text) {
    window.speechSynthesis.cancel();

    const utterance = new SpeechSynthesisUtterance(text);
    utterance.lang = 'ko-KR';
    utterance.rate = 0.8;
    utterance.pitch = 1;

    window.speechSynthesis.speak(utterance);
}
</script>
@endsection
