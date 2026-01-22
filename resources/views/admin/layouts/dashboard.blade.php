<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>

<div class="container-fluid">
    <div class="row"> {{-- Hapus vh-100 di sini biar ga conflict sama CSS custom --}}
        
        {{-- SIDEBAR --}}
        <nav id="sidebar" class="sidebar p-4">
            {{-- Tombol Burger (Garis) --}}
            <button id="sidebarToggle" class="btn p-0 border-0 bg-transparent mb-4">
                <img src="{{ asset('images/icons/garis.png') }}" alt="Menu" class="logo">
            </button>

            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a href="/home" class="nav-link {{ request()->is('home') ? 'active' : '' }} d-flex align-items-center">
                        {{-- Hapus class 'me-3' disini, kita atur pake CSS biar rapi pas dicollapse --}}
                        <img src="{{ asset('images/icons/home.png') }}" class="icon-menu">
                        <span class="link-text ms-3">Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/hangeul" class="nav-link {{ request()->is('hangeul') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/hangeul.png') }}" class="icon-menu">
                        <span class="link-text ms-3">Hangeul</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/lessons" class="nav-link {{ request()->is('lessons') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/lessons.png') }}" class="icon-menu">
                        <span class="link-text ms-3">Lessons</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/quizzes" class="nav-link {{ request()->is('quizzes') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/quizzes.png') }}" class="icon-menu">
                        <span class="link-text ms-3">Quizzes</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/progress" class="nav-link {{ request()->is('progress') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/progress.png') }}" class="icon-menu">
                        <span class="link-text ms-3">Progress</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/profile" class="nav-link {{ request()->is('profile') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/profile.png') }}" class="icon-menu">
                        <span class="link-text ms-3">Profile</span>
                    </a>
                </li>
            </ul>
        </nav>

        {{-- MAIN CONTENT --}}
        <main id="main-content" class="bg-light p-4">
            @yield('content')
        </main>

    </div>
</div>

{{-- SCRIPT JAVASCRIPT --}}
<script>
    const toggleBtn = document.getElementById('sidebarToggle');
    const body = document.body;

    toggleBtn.addEventListener('click', () => {
        body.classList.toggle('sidebar-collapsed');
    });
</script>

</body>

</body>
</html>
