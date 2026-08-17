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
                <h1 class="auth-title">REGISTER</h1>
                <p class="auth-subtitle">Buat akun user Tasty Food</p>
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

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf
                <div>
                    <label for="name" class="form-label">NAMA</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                           placeholder="Nama lengkap"
                           class="form-input">
                </div>
                <div>
                    <label for="email" class="form-label">EMAIL</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                           placeholder="nama@email.com"
                           class="form-input">
                </div>
                <div>
                    <label for="password" class="form-label">PASSWORD</label>
                    <input id="password" type="password" name="password" required
                           placeholder="••••••••"
                           class="form-input">
                </div>
                <div>
                    <label for="password_confirmation" class="form-label">KONFIRMASI PASSWORD</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                           placeholder="••••••••"
                           class="form-input">
                </div>
                <div>
                    <button type="submit" class="btn-submit">
                        DAFTAR SEKARANG
                    </button>
                </div>
            </form>

            <div class="auth-footer-link">
                <p class="auth-subtitle">
                    Sudah punya akun? 
                    <a href="login" class="link-register">Masuk</a>
                </p>
            </div>

        </div>
    </main>
</body>
</html>
