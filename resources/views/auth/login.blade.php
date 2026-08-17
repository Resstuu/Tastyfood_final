<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <main class="main-wrapper">
        <div class="ornament-left">
            <img src="/assets/img-4-2000x2000.png" alt="Food Decorative" class="ornament-img">
        </div>
        <div class="ornament-right">
            <img src="/assets/img-4-2000x2000.png" alt="Food Decorative" class="ornament-img">
        </div>
        <div class="auth-card">
            
            <div class="auth-header">
                <h1 class="auth-title">MASUK</h1>
                <p class="auth-subtitle">Silakan masuk ke akun Tasty Food Anda</p>
                <div class="auth-divider"></div>
            </div>
            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert-status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                {{ csrf_field() }}
                <div>
                    <label for="email" class="form-label">EMAIL</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="nama@email.com"
                           class="form-input">
                </div>
                <div>
                    <div class="form-flex-between">
                        <label for="password" class="form-label mb-0">PASSWORD</label>
                        @if (Route::has('password.request'))
                            <a href="#" class="link-forgot">Lupa?</a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required
                           placeholder="••••••••"
                           class="form-input">
                </div>
                <div class="checkbox-wrapper">
                    <input id="remember_me" type="checkbox" name="remember" class="checkbox-input">
                    <label for="remember_me" class="checkbox-label">Ingat Saya</label>
                </div>
                <div>
                    <button type="submit" class="btn-submit">
                        MASUK SEKARANG
                    </button>
                </div>
            </form>

            <div class="auth-footer-link">
                <p class="auth-subtitle">
                    Belum punya akun? 
                    <a href="register" class="link-register">Daftar</a>
                </p>
            </div>

        </div>
    </main>
</body>
</html>
