<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }} - Tasty Food</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a href="/" class="brand">TASTY FOOD</a>
            @include('partials.user-nav', ['active' => 'berita'])
        </div>
    </header>

    <main>
        <section class="page-hero">
            <div class="container">
                <h1>DETAIL BERITA</h1>
            </div>
        </section>

        <section class="detail-section">
            <div class="container detail-wrap">
                @if($news->image_path)
                    <div class="detail-image">
                        <img src="{{ Storage::url($news->image_path) }}" alt="{{ $news->title }}">
                    </div>
                @endif
                <article class="detail-copy">
                    <h2>{{ $news->title }}</h2>
                    @if($news->description)
                        <p>{{ $news->description }}</p>
                    @endif
                    <a href="{{ route('berita') }}" class="back-link">Kembali ke Berita</a>
                </article>
            </div>
        </section>
    </main>
    @include('partials.user-footer')
</body>
</html>
