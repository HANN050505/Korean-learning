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

            {{-- OPSI JAWABAN --}}
            <div class="options-grid" id="options-{{ $index }}">
                @foreach ($question->options as $option)
                    <button 
                        class="quiz-option" 
                        onclick="checkAnswer(this, {{ $option->is_correct }}, {{ $index }}, {{ count($quiz->questions) }})">
                        {{ $option->option_text }}
                    </button>
                @endforeach
            </div>

            {{-- --- BARU: TAMPILAN NILAI SEMENTARA --- --}}
            <div style="margin-top: 20px; text-align: center; font-size: 1rem; color: #7f8c8d;">
                Nilai saat ini: <strong><span class="live-score">0</span></strong>
            </div>

        </div>
    @endforeach

    {{-- LAYAR SELESAI --}}
    <div id="quiz-completed" class="quiz-slide">
        <div class="question-card text-only" style="text-align: center;">
            <h2>🎉 Hasil Kuis 🎉</h2>
            <p>Kamu telah menyelesaikan kuis ini.</p>
            
            <div style="margin: 20px 0; font-size: 1.2rem;">
                {{-- Detail Benar Salah --}}
                <div style="display: flex; justify-content: center; gap: 20px; margin-bottom: 15px;">
                    <div style="color: #2ecc71;">Benar: <span id="total-correct">0</span></div>
                    <div style="color: #e74c3c;">Salah: <span id="total-wrong">0</span></div>
                </div>

                <hr style="opacity: 0.3; margin: 10px 0;">

                {{-- Tampilan Skor Akhir --}}
                <div style="font-size: 1.5rem; font-weight: bold; margin-bottom: 5px;">
                    Nilai Akhir: <span id="final-score">0</span>
                </div>

                {{-- Status Lulus/Gagal (Selesai / Belum) --}}
                <div id="status-text" style="font-weight: bold; font-size: 1.5rem; margin-bottom: 20px; text-transform: uppercase;">
                    {{-- Teks diisi Javascript --}}
                </div>
            </div>

            <a href="{{ route('quizzes.index') }}" 
            class="quiz-option correct" 
            style="text-decoration: none; display:inline-block; width: auto; padding: 15px 30px;">
            Kembali ke Menu
            </a>
        </div>
    </div>

</div>

{{-- JAVASCRIPT --}}
<script>
    let correctCount = 0;
    let wrongCount = 0;

    function checkAnswer(button, isCorrect, currentIndex, totalQuestions) {
        const optionsContainer = document.getElementById('options-' + currentIndex);
        const allButtons = optionsContainer.getElementsByTagName('button');
        
        // Disable tombol setelah klik
        for (let btn of allButtons) {
            btn.disabled = true; 
            btn.style.pointerEvents = 'none';
            btn.style.opacity = '0.6';
        }
        
        button.style.opacity = '1';

        if (isCorrect) {
            button.classList.add('correct');
            correctCount++;
        } else {
            button.classList.add('wrong');
            wrongCount++;
        }

        // --- BARU: UPDATE NILAI SEMENTARA SECARA LIVE ---
        let currentScore = Math.round((correctCount / totalQuestions) * 100);
        // Update semua elemen dengan class 'live-score'
        document.querySelectorAll('.live-score').forEach(function(el) {
            el.innerText = currentScore;
        });

        // Pindah slide otomatis setelah 800ms
        setTimeout(() => {
            document.getElementById('question-' + currentIndex).classList.remove('active');
            
            let nextIndex = currentIndex + 1;

            if (nextIndex < totalQuestions) {
                document.getElementById('question-' + nextIndex).classList.add('active');
            } else {
                showResults(); // Panggil fungsi selesai
            }
        }, 800);
    }

    function showResults() {
        // 1. Update HTML Angka
        document.getElementById('total-correct').innerText = correctCount;
        document.getElementById('total-wrong').innerText = wrongCount;
        
        // 2. Hitung Persentase (Skor 0 - 100)
        let totalQuestions = {{ count($quiz->questions) }};
        let score = 0;
        if(totalQuestions > 0){
            score = Math.round((correctCount / totalQuestions) * 100);
        }
        
        document.getElementById('final-score').innerText = score;

        // 3. Logika Lulus (> 80) -> Ubah teks jadi "Selesai" atau "Belum"
        const statusElement = document.getElementById('status-text');
        
        if (score > 80) {
            // Jika Lulus
            statusElement.innerText = "Selesai";
            statusElement.style.color = "#2ecc71"; // Hijau
        } else {
            // Jika Gagal
            statusElement.innerText = "Belum";
            statusElement.style.color = "#e74c3c"; // Merah
        }
        
        // Tampilkan layar selesai
        document.getElementById('quiz-completed').classList.add('active');

        // 4. Kirim ke Database
        saveScoreToDatabase(score);
    }

    function saveScoreToDatabase(score) {
        // Kita kirim score, correctCount, dan wrongCount
        fetch("{{ route('quizzes.store', $quiz->id) }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            // Update body jadi seperti ini:
            body: JSON.stringify({ 
                score: score,
                correct: correctCount, // Variabel global di atas
                wrong: wrongCount      // Variabel global di atas
            })
        })
        .then(response => {
            if (!response.ok) {
                console.error("Gagal save:", response.statusText);
            } else {
                console.log("Berhasil disimpan!");
            }
        })
        .catch(error => console.error("Error:", error));
    }
</script>
@endsection