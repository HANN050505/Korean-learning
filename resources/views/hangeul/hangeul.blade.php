@extends('layouts.dashboard')

@section('title', 'Hangeul')

@section('content')
<div class="hangeul-wrapper">

    {{-- HEADER --}}
    <div class="hangeul-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <h1 class="h3 mb-2 text-gray-800">Hangeul</h1>
            <p class="mb-4">Pelajari huruf dalam Bahasa Korea</p>
        </div>
        <img src="{{ asset('images/icons/korea.png') }}" alt="Korea Logo" style="width: 70px; height: auto;">
    </div>

    {{-- FITUR PENCARIAN --}}
    <div class="search-container" style="margin-bottom: 30px;">
        <input type="text" id="hangeulSearch" class="form-control" 
            placeholder="Cari huruf... (contoh: a, wa, atau ㄱ)" 
            style="width: 100%; padding: 15px; border-radius: 10px; border: 1px solid #d1d3e2; font-size: 16px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    </div>

    {{-- 1. VOKAL TUNGGAL --}}
    <div class="hangeul-section-title">
        <span></span>
        <h3>Vokal Tunggal</h3>
        <span></span>
    </div>

    <div class="hangeul-grid">
        <div class="hangeul-card" onclick="speak('ㅏ')">
            <div class="huruf">ㅏ</div>
            <div class="latin">a</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅑ')">
            <div class="huruf">ㅑ</div>
            <div class="latin">ya</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅓ')">
            <div class="huruf">ㅓ</div>
            <div class="latin">eo</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅕ')">
            <div class="huruf">ㅕ</div>
            <div class="latin">yeo</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅗ')">
            <div class="huruf">ㅗ</div>
            <div class="latin">o</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅛ')">
            <div class="huruf">ㅛ</div>
            <div class="latin">yo</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅜ')">
            <div class="huruf">ㅜ</div>
            <div class="latin">u</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅠ')">
            <div class="huruf">ㅠ</div>
            <div class="latin">yu</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅡ')">
            <div class="huruf">ㅡ</div>
            <div class="latin">eu</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅣ')">
            <div class="huruf">ㅣ</div>
            <div class="latin">i</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅐ')">
            <div class="huruf">ㅐ</div>
            <div class="latin">ae</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅒ')">
            <div class="huruf">ㅒ</div>
            <div class="latin">yae</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅔ')">
            <div class="huruf">ㅔ</div>
            <div class="latin">e</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅖ')">
            <div class="huruf">ㅖ</div>
            <div class="latin">ye</div>
        </div>
    </div>

    {{-- 2. VOKAL GANDA --}}
    <div class="hangeul-section-title">
        <span></span>
        <h3>Vokal Ganda</h3>
        <span></span>
    </div>

    <div class="hangeul-grid">
        <div class="hangeul-card" onclick="speak('ㅘ')">
            <div class="huruf">ㅘ</div>
            <div class="latin">wa</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅝ')">
            <div class="huruf">ㅝ</div>
            <div class="latin">weo</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅙ')">
            <div class="huruf">ㅙ</div>
            <div class="latin">wae</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅚ')">
            <div class="huruf">ㅚ</div>
            <div class="latin">oe</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅞ')">
            <div class="huruf">ㅞ</div>
            <div class="latin">we</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅟ')">
            <div class="huruf">ㅟ</div>
            <div class="latin">wi</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅢ')">
            <div class="huruf">ㅢ</div>
            <div class="latin">ui</div>
        </div>
    </div>

    {{-- 3. KONSONAN BIASA --}}
    <div class="hangeul-section-title">
        <span></span>
        <h3>Konsonan Biasa</h3>
        <span></span>
    </div>

    <div class="hangeul-grid">
        <div class="hangeul-card" onclick="speak('ㄱ')">
            <div class="huruf">ㄱ</div>
            <div class="latin">g</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㄴ')">
            <div class="huruf">ㄴ</div>
            <div class="latin">n</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㄷ')">
            <div class="huruf">ㄷ</div>
            <div class="latin">d</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㄹ')">
            <div class="huruf">ㄹ</div>
            <div class="latin">r/l</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅁ')">
            <div class="huruf">ㅁ</div>
            <div class="latin">m</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅂ')">
            <div class="huruf">ㅂ</div>
            <div class="latin">b</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅅ')">
            <div class="huruf">ㅅ</div>
            <div class="latin">s</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅇ')">
            <div class="huruf">ㅇ</div>
            <div class="latin">ng</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅈ')">
            <div class="huruf">ㅈ</div>
            <div class="latin">j</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅎ')">
            <div class="huruf">ㅎ</div>
            <div class="latin">h</div>
        </div>
    </div>

    {{-- 4. KONSONAN ASPIRASI --}}
    <div class="hangeul-section-title">
        <span></span>
        <h3>Konsonan Aspirasi</h3>
        <span></span>
    </div>

    <div class="hangeul-section-description">
        <h5>Konsonan-konsonan ini diucapkan dengan hembusan udara yang lebih kuat saat pengucapan.</h5>
    </div>

    <div class="hangeul-grid">
        <div class="hangeul-card" onclick="speak('ㅊ')">
            <div class="huruf">ㅊ</div>
            <div class="latin">ch</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅋ')">
            <div class="huruf">ㅋ</div>
            <div class="latin">k</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅌ')">
            <div class="huruf">ㅌ</div>
            <div class="latin">t</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅍ')">
            <div class="huruf">ㅍ</div>
            <div class="latin">p</div>
        </div>
    </div>

    {{-- 5. KONSONAN BERTEKANAN --}}
    <div class="hangeul-section-title">
        <span></span>
        <h3>Konsonan Bertekanan</h3>
        <span></span>
    </div>

    <div class="hangeul-section-description">
        <h5>Konsonan yang diucapkan dengan ketegangan otot mulut yang lebih kuat dan tanpa hembusan udara yang besar.</h5>
    </div>

    <div class="hangeul-grid">
        <div class="hangeul-card" onclick="speak('ㄲ')">
            <div class="huruf">ㄲ</div>
            <div class="latin">kk</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㄸ')">
            <div class="huruf">ㄸ</div>
            <div class="latin">tt</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅃ')">
            <div class="huruf">ㅃ</div>
            <div class="latin">pp</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅆ')">
            <div class="huruf">ㅆ</div>
            <div class="latin">ss</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅉ')">
            <div class="huruf">ㅉ</div>
            <div class="latin">jj</div>
        </div>
    </div>

</div> {{-- End hangeul-wrapper --}}

{{-- JAVASCRIPT --}}
<script>
    // 1. Fungsi Text-to-Speech
    function speak(text) {
        window.speechSynthesis.cancel(); // Hentikan suara sebelumnya

        const utterance = new SpeechSynthesisUtterance(text);
        utterance.lang = 'ko-KR'; // Bahasa Korea
        utterance.rate = 0.8;     // Kecepatan
        utterance.pitch = 1;      // Nada

        window.speechSynthesis.speak(utterance);
    }

    // 2. Fungsi Pencarian Real-time
    document.getElementById('hangeulSearch').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let grids = document.querySelectorAll('.hangeul-grid');

        grids.forEach(grid => {
            let cards = grid.querySelectorAll('.hangeul-card');
            let visibleCount = 0;

            // Filter Kartu di dalam Grid ini
            cards.forEach(card => {
                let text = card.innerText.toLowerCase();
                if (text.includes(filter)) {
                    card.style.display = ""; // Tampilkan
                    visibleCount++;
                } else {
                    card.style.display = "none"; // Sembunyikan
                }
            });

            // Logic Menyembunyikan Judul & Deskripsi jika Grid kosong
            // Ambil elemen sebelumnya (Biasanya Title atau Description)
            let prevElement = grid.previousElementSibling;
            let titleElement = null;
            let descElement = null;

            // Cek struktur HTML di atas Grid
            if (prevElement) {
                if (prevElement.classList.contains('hangeul-section-description')) {
                    descElement = prevElement;
                    // Jika ada deskripsi, judulnya ada di atas deskripsi
                    if (descElement.previousElementSibling && descElement.previousElementSibling.classList.contains('hangeul-section-title')) {
                        titleElement = descElement.previousElementSibling;
                    }
                } else if (prevElement.classList.contains('hangeul-section-title')) {
                    titleElement = prevElement;
                }
            }

            // Aksi Tampilkan/Sembunyikan Section
            if (visibleCount > 0) {
                grid.style.display = ""; // Grid Muncul
                if (titleElement) titleElement.style.display = "";
                if (descElement) descElement.style.display = "";
            } else {
                grid.style.display = "none"; // Grid Hilang
                if (titleElement) titleElement.style.display = "none";
                if (descElement) descElement.style.display = "none";
            }
        });
    });
</script>

@endsection