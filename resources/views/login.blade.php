<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="{{ asset('assets/images/Logo_Images/LogoNoBg.png') }}" alt="logo">
            <h1 class="form-title">Chollosevero</h1>
        </div>
        
        <form action="{{ url('login') }}" method="POST">
            @csrf
            <h4 class="login-title">Log in</h4>
            <div class="label-div">
                <i class="fa-solid fa-user"></i>
                <label for="username">Username:</label>
            </div>
            <input type="text" id="username" name="username" required>
            
            <div class="label-div">
                <i class="fa-solid fa-lock"></i>
                <label for="password">Password:</label>
            </div>
            <input type="password" id="password" name="password" required>

            <button type="submit">Log in</button>
            <span>Don't have an account? <a href="{{ route('register') }}">Sign up here</a></span>


            @if(session('message'))
                <p class="notify-message">{{ session('message') }}</p>
            @endif
        </form>
    </div>

    <script src="https://kit.fontawesome.com/8b39d50696.js" crossorigin="anonymous"></script>
</body>

</html>
