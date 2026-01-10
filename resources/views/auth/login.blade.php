<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
</head>
<body>

<div class="container">
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
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="name@example.com"
                       required>

                <label>Password</label>
                <input type="password"
                       name="password"
                       placeholder="Enter your password"
                       required>

                <div style="text-align:right; margin-bottom:15px;">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button type="submit">Log in</button>

                <div class="links">
                    Don't have an account?
                    <a href="{{ route('register') }}">Sign up</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
