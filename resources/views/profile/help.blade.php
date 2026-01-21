@extends('layouts.dashboard')

@section('title', 'Pusat Bantuan')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        
        {{-- TOMBOL KEMBALI --}}
        {{-- Saya ganti jadi 'mt-3' supaya pas (tidak terlalu turun) --}}
        <div class="mb-4 mt-3"> 
            <a href="{{ route('profile.edit') }}" class="btn-back-custom d-inline-flex align-items-center gap-2 px-4 py-2 rounded-pill shadow-sm text-decoration-none">
                <i class="bi bi-arrow-left icon-animate"></i>
                <span class="fw-medium">Kembali ke Profil</span>
            </a>
        </div>
        
        <div class="card shadow-sm border-0 rounded-lg p-4">
            <h2 class="h4 fw-bold text-dark mb-4 border-bottom pb-3">Pusat Bantuan</h2>

            <div class="accordion" id="faqAccordion">
                
                {{-- Pertanyaan 1 --}}
                <div class="mb-4">
                    <h5 class="fw-bold text-dark d-flex align-items-center gap-2">
                        <span class="text-success">Q:</span> Bagaimana cara memulai belajar?
                    </h5>
                    <p class="text-muted ms-4">
                        A: Silakan masuk ke menu <strong>Lessons</strong> dan pilih materi dasar "Hangeul" atau "Kata Benda" untuk memulai.
                    </p>
                </div>

                {{-- Pertanyaan 2 --}}
                <div class="mb-4">
                    <h5 class="fw-bold text-dark d-flex align-items-center gap-2">
                        <span class="text-success">Q:</span> Apakah aplikasi ini gratis?
                    </h5>
                    <p class="text-muted ms-4">
                        A: Aplikasi ini dapat digunakan secara <strong>Gratis</strong> untuk materi dasar. Namun, Anda bisa upgrade ke <strong>Premium</strong> untuk membuka akses ke seluruh kuis dan materi lanjutan.
                    </p>
                </div>

                {{-- Pertanyaan 3 --}}
                <div class="mb-4">
                    <h5 class="fw-bold text-dark d-flex align-items-center gap-2">
                        <span class="text-success">Q:</span> Bagaimana cara upgrade ke Premium?
                    </h5>
                    <p class="text-muted ms-4">
                        A: Buka menu <strong>Home</strong> atau <strong>Profil</strong>, lalu klik tombol "Upgrade ke Premium". Ikuti instruksi pembayaran melalui Virtual Account atau metode lainnya.
                    </p>
                </div>

                {{-- Pertanyaan 4 --}}
                <div class="mb-4">
                    <h5 class="fw-bold text-dark d-flex align-items-center gap-2">
                        <span class="text-success">Q:</span> Suara pelafalan tidak keluar?
                    </h5>
                    <p class="text-muted ms-4">
                        A: Pastikan volume perangkat Anda menyala dan browser mengizinkan pemutaran audio otomatis. Coba refresh halaman jika audio macet.
                    </p>
                </div>

                {{-- Pertanyaan 5 --}}
                <div class="mb-4">
                    <h5 class="fw-bold text-dark d-flex align-items-center gap-2">
                        <span class="text-success">Q:</span> Saya lupa password, bagaimana ini?
                    </h5>
                    <p class="text-muted ms-4">
                        A: Silakan keluar (Logout) terlebih dahulu, lalu klik link "Lupa Password" di halaman Login. Kami akan mengirimkan link reset ke email Anda.
                    </p>
                </div>

            </div>

            {{-- Kontak Email --}}
            <div class="mt-5 bg-light p-3 rounded border text-center small">
                <span class="text-muted">Masih butuh bantuan? Hubungi kami di:</span>
                <br>
                <a href="mailto:support@koreanapp.com" class="fw-bold text-success text-decoration-none">
                    support@koreanapp.com
                </a>
            </div>
        </div>
    </div>
</div>
@endsection