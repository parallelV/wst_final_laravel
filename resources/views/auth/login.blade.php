<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in - GameHub POS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body class="login-page theme-gta6">
    <div class="login-card">
        <div class="brand">
            <img class="brand-logo" src="{{ asset('images/logo.png') }}" alt="GameHub logo" onerror="this.style.visibility='hidden'">
        </div>

        <p class="eyebrow">STAFF PORTAL</p>
        <h1>Welcome back</h1>
        <p class="subtle">Sign in to manage your counter.</p>

        @if ($errors->any())
            <div class="login-alert" role="alert">
                <strong>Sign in failed</strong>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <label>
                Username
                <input name="username" value="{{ old('username') }}" class="{{ $errors->has('username') ? 'is-invalid' : '' }}" aria-invalid="{{ $errors->has('username') ? 'true' : 'false' }}" autofocus required>
            </label>

            <label>
                Password
                <input type="password" name="password" class="{{ $errors->has('password') || $errors->has('username') ? 'is-invalid' : '' }}" aria-invalid="{{ $errors->has('password') || $errors->has('username') ? 'true' : 'false' }}" required>
            </label>

            <button class="button primary wide">
                Sign in <span aria-hidden="true">&#8594;</span>
            </button>
        </form>
    </div>
</body>
</html>
