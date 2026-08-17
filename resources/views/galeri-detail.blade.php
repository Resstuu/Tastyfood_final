<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $gallery->title }} - Tasty Food</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/galeri.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a href="/" class="brand">TASTY FOOD</a>
            @include('partials.user-nav', ['active' => 'galeri'])
        </div>
    </header>

    <main>
        <section class="page-hero">
            <div class="container">
                <h1>DETAIL GALERI</h1>
            </div>
        </section>

        <section class="detail-section">
            <div class="container detail-wrap">
                <div class="detail-image">
                    <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}">
                </div>
                <article class="detail-copy">
                    <h2>{{ $gallery->title }}</h2>
                    @if($gallery->description)
                        <p>{{ $gallery->description }}</p>
                    @endif
                    <a href="{{ route('public.galeri') }}" class="back-link">Kembali ke Galeri</a>
                </article>
            </div>
        </section>
    </main>
    @include('partials.user-footer')
</body>
</html>
