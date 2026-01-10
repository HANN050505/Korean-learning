<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hangeul.css') }}">

</head>
<body>

<div class="container-fluid">
    <div class="row vh-100">
        <nav class="col-3 col-md-2 sidebar p-4">
            <img src="{{ asset('images/icons/garis.png') }}" alt="Logo" class="mb-4 logo">

            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a href="/home" class="nav-link {{ request()->is('home') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/home.png') }}" class="me-3 icon-menu">
                        <span>Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/hangeul" class="nav-link {{ request()->is('hangeul') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/hangeul.png') }}" class="me-3 icon-menu">
                        <span>Hangeul</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/lessons" class="nav-link {{ request()->is('lessons') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/lessons.png') }}" class="me-3 icon-menu">
                        <span>Lessons</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/quizzes" class="nav-link {{ request()->is('quizzes') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/quizzes.png') }}" class="me-3 icon-menu">
                        <span>Quizzes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/progress" class="nav-link {{ request()->is('progress') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/progress.png') }}" class="me-3 icon-menu">
                        <span>Progress</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/profile" class="nav-link {{ request()->is('profile') ? 'active' : '' }} d-flex align-items-center">
                        <img src="{{ asset('images/icons/profile.png') }}" class="me-3 icon-menu">
                        <span>Profile</span>
                    </a>
                </li>
            </ul>
        </nav>

        <main class="col-9 col-md-10 bg-light p-4">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
