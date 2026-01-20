@extends('layouts.dashboard')

@section('title', 'Hangeul')

@section('content')
<div class="hangeul-wrapper">

    <div class="hangeul-header">
        <h1>Hangeul</h1>
        <p>Pelajari huruf dalam Bahasa Korea</p>
    </div>

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
        <div class="hangeul-card" onclick="speak('ㅏ')">
            <div class="huruf">ㅏ</div>
            <div class="latin">a</div>
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
            <div class="Aspirasi">ch</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅋ')">
            <div class="huruf">ㅋ</div>
            <div class="Aspirasi">k</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅌ')">
            <div class="huruf">ㅌ</div>
            <div class="Aspirasi">t</div>
        </div>
        <div class="hangeul-card" onclick="speak('ㅍ')">
            <div class="huruf">ㅍ</div>
            <div class="Aspirasi">p</div>
        </div>
    </div>


    <div class="hangeul-section-title">
        <span></span>
        <h3>Konsonan Bertekanan</h3>
        <span></span>
    </div>

    <div class="hangeul-section-description">
    <h5>konsonan yang diucapkan dengan ketegangan otot mulut yang lebih kuat dan tanpa hembusan udara yang besar.</h5>
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
</div>

<script>
function speak(text) {
    // hentikan suara sebelumnya kalau masih jalan
    window.speechSynthesis.cancel();

    const utterance = new SpeechSynthesisUtterance(text);
    utterance.lang = 'ko-KR'; // bahasa Korea
    utterance.rate = 0.8;     // kecepatan (0.5 - 1 normal)
    utterance.pitch = 1;      // nada suara

    window.speechSynthesis.speak(utterance);
}
</script>

@endsection
