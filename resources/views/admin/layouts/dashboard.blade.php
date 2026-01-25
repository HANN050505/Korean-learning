<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/admin-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-lesson.css') }}">
    @stack('styles') 
</head>

<body>

<div class="container-fluid">
    <div class="row"> 
        
        {{-- ================= SIDEBAR ================= --}}
        <nav id="sidebar" class="sidebar p-4">
            <button id="sidebarToggle" class="btn p-0 border-0 bg-transparent mb-4">
                <img src="{{ asset('images/icons/garis.png') }}" alt="Menu" class="logo">
            </button>

            <ul class="nav flex-column gap-2">
                {{-- 1. Dashboard --}}
                <li class="nav-item">
                    {{-- PERHATIKAN: route('admin.home') --}}
                    <a href="{{ route('admin.home') }}" class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/home.png') }}" class="icon-menu">
                        <span class="link-text ms-3">Home</span>
                    </a>
                </li>

                {{-- 2. Kelola User --}}
                <li class="nav-item">
                    {{-- GANTI href="#" JADI route('admin.users') --}}
                    <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/profile.png') }}" class="icon-menu">
                        <span class="link-text ms-3">Kelola User</span>
                    </a>
                </li>

                {{-- 3. Kelola Materi --}}
                <li class="nav-item">
                    {{-- GANTI href="#" JADI route('admin.lessons') --}}
                    <a href="{{ route('admin.lessons') }}" class="nav-link {{ request()->routeIs('admin.lessons*') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/lessons.png') }}" class="icon-menu">
                        <span class="link-text ms-3">Kelola Materi</span>
                    </a>
                </li>

                {{-- 4. Kelola Kuis --}}
                <li class="nav-item">
                    {{-- GANTI href="#" JADI route('admin.quizzes') --}}
                    <a href="{{ route('admin.quizzes') }}" class="nav-link {{ request()->routeIs('admin.quizzes*') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/quizzes.png') }}" class="icon-menu">
                        <span class="link-text ms-3">Bank Soal</span>
                    </a>
                </li>

                {{-- 5. Keuangan --}}
                <li class="nav-item">
                    {{-- GANTI href="#" JADI route('admin.payments') --}}
                    <a href="{{ route('admin.payments') }}" class="nav-link {{ request()->routeIs('admin.payments*') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/progress.png') }}" class="icon-menu">
                        <span class="link-text ms-3">Keuangan</span>
                    </a>
                </li>
            </ul>
        </nav>

        {{-- ================= KONTEN UTAMA ================= --}}
        <main id="main-content" class="bg-light p-4 col">
            @yield('admin.content') {{-- Pastikan ini sesuai dengan yg di home.blade.php --}}
        </main>

    </div>
</div>

<script>
    const toggleBtn = document.getElementById('sidebarToggle');
    const body = document.body;
    if(toggleBtn){
        toggleBtn.addEventListener('click', () => {
            body.classList.toggle('sidebar-collapsed');
        });
    }
</script>

@stack('scripts')

</body>
</html>