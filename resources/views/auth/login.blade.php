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

            <form method="POST" action="#">
                @csrf

                <label>Email</label>
                <input type="email" placeholder="example@email.com">

                <label>Password</label>
                <input type="password" placeholder="Enter your password">

                <div class="forgot">
                    <a href="#">Forgot password?</a>
                </div>

                <button type="submit">Log In</button>

                <div class="register">
                    Don't have an account?
                    <a href="#">Sign up</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
