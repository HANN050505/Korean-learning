@extends('layouts.dashboard')

@section('content')
<div class="quiz-container">

    {{-- Loop Soal --}}
    @foreach ($quiz->questions as $index => $question)
        <div class="quiz-slide {{ $index == 0 ? 'active' : '' }}" id="question-{{ $index }}">
            
            {{-- KARTU SOAL --}}
            <div class="question-card {{ $question->icon ? '' : 'text-only' }}">
                
                @if($question->icon)
                    <div class="image-wrapper">
                        <img src="{{ asset('images/' . $question->icon) }}" alt="Ilustrasi">
                    </div>
                @endif

                <h2 class="question-text">{{ $question->question }}</h2>
            </div>

            {{-- PILIHAN JAWABAN --}}
            <div class="options-grid" id="options-{{ $index }}">
                @foreach ($question->options as $option)
                    <button 
                        class="quiz-option" 
                        onclick="checkAnswer(this, {{ $option->is_correct }}, {{ $index }}, {{ count($quiz->questions) }})">
                        {{ $option->option_text }}
                    </button>
                @endforeach
            </div>

        </div>
    @endforeach

    {{-- LAYAR SELESAI --}}
    <div id="quiz-completed" class="quiz-slide">
        <div class="question-card text-only" style="text-align: center;">
            <h2>🎉 Selesai! 🎉</h2>
            <p>Kamu telah menyelesaikan kuis ini.</p>
            
            {{-- Statistik Hasil --}}
            <div style="margin: 20px 0; font-size: 1.2rem;">
                <div style="color: #2ecc71; margin-bottom: 10px;">
                    <strong>Benar: <span id="total-correct">0</span></strong>
                </div>
                <div style="color: #e74c3c;">
                    <strong>Salah: <span id="total-wrong">0</span></strong>
                </div>
            </div>

            <br>
            <a href="{{ route('quizzes.index') }}" 
            class="quiz-option correct" 
            style="text-decoration: none; display:inline-block; width: auto; padding: 15px 30px;">
            Kembali ke Menu
            </a>
        </div>
    </div>

</div>

{{-- JAVASCRIPT LOGIC --}}
<script>
    // Inisialisasi penghitung skor
    let correctCount = 0;
    let wrongCount = 0;

    function checkAnswer(button, isCorrect, currentIndex, totalQuestions) {
        // 1. Cegah klik ganda pada soal yang sama
        const optionsContainer = document.getElementById('options-' + currentIndex);
        const allButtons = optionsContainer.getElementsByTagName('button');
        
        // Loop untuk mematikan fungsi klik (disabled) pada semua tombol di slide ini
        for (let btn of allButtons) {
            btn.disabled = true; 
            btn.style.pointerEvents = 'none'; // Tambahan visual agar cursor tidak berubah
            btn.style.opacity = '0.6'; // Efek visual tombol non-aktif
        }
        
        // Kembalikan opacity tombol yang diklik supaya tetap jelas
        button.style.opacity = '1';

        // 2. Cek Jawaban & Update Skor
        if (isCorrect) {
            button.classList.add('correct');
            correctCount++; // Tambah poin benar
        } else {
            button.classList.add('wrong');
            wrongCount++; // Tambah poin salah
        }

        // 3. Pindah ke Soal Berikutnya (Benar atau Salah tetap jalan)
        setTimeout(() => {
            // Sembunyikan soal saat ini
            document.getElementById('question-' + currentIndex).classList.remove('active');
            
            let nextIndex = currentIndex + 1;

            if (nextIndex < totalQuestions) {
                // Tampilkan soal berikutnya
                document.getElementById('question-' + nextIndex).classList.add('active');
            } else {
                // Kuis Selesai: Tampilkan Layar Akhir & Update Angka
                showResults();
            }
        }, 800); // Jeda 800ms
    }

    function showResults() {
        // Update teks HTML dengan variabel JS
        document.getElementById('total-correct').innerText = correctCount;
        document.getElementById('total-wrong').innerText = wrongCount;

        // Tampilkan slide selesai
        document.getElementById('quiz-completed').classList.add('active');
    }
</script>
@endsection