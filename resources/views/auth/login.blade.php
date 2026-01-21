<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        a { text-decoration: none; }
        .modal-backdrop { z-index: 1040; }
        .modal { z-index: 1050; color: #333; }
    </style>
</head>
<body>

<div class="custom-container">
    <div class="left"></div>

    <div class="right">
        <div class="login-box">
            <h2>Welcome</h2>

            @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>

                <div style="text-align:right; margin-bottom:15px;">
                    @if (Route::has('password.request'))
                        <a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot password?</a>
                    @endif
                </div>

                <button type="submit">Log in</button>

                <div class="links">
                    Don't have an account?
                    <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Sign up</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('auth.partials.register_modal')
@include('auth.partials.forgot_modal')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if ($errors->has('name') || $errors->has('password') || ($errors->has('email') && old('name')))
            var registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
            registerModal.show();
        @endif

        @if (session('status'))
            alert('{{ session('status') }}');
        @endif
    });
</script>

</body>
</html>