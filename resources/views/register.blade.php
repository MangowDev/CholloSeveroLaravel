<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="{{ asset('assets/images/logo_images/LogoNoBg.png') }}" alt="logo">
            <h1 class="form-title">Chollosevero</h1>
        </div>
        
        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <h4 class="login-title">Register</h4>

            <div class="label-div">
                <i class="fa-solid fa-user"></i>
                <label for="username">Username:</label>
            </div>
            <input type="text" id="username" name="name" value="{{ old('name') }}" required>
            @error('username')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <div class="label-div">
                <i class="fa-solid fa-lock"></i>
                <label for="password">Password:</label>
            </div>
            <input type="password" id="password" name="password" required>
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <div class="label-div">
                <i class="fa-solid fa-envelope"></i>
                <label for="email">Email:</label>
            </div>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <div class="radio-div">
                <input type="checkbox" id="terms" name="terms" value="terms" required>
                <label for="terms">I accept the terms and conditions.</label>
            </div>
            @error('terms')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <button type="submit">Register</button>
            <span>Already have an account? <a href="{{ route('login') }}">Log in here</a></span>

            @if(session('message'))
                <p class="notify-message">{{ session('message') }}</p>
            @endif
        </form>
    </div>
    
    <script src="https://kit.fontawesome.com/8b39d50696.js" crossorigin="anonymous"></script>
</body>

</html>
