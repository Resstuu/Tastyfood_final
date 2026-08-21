<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - Tasty Food</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @vite(['resources/css/app.css'])
    <style>
        .site-header { position: relative; padding: 25px 0; background: #fff; z-index: 50; }
    </style>
</head>
<body>
    @php
        $featuredNews = $newsItems->first();
        $otherNews = $newsItems->skip(1);
    @endphp

    <header class="site-header shadow-sm">
        <div class="container nav-wrap flex justify-between items-center">
            <a href="/" class="brand text-black no-underline" style="font-size: 28px; font-weight: 800;">TASTY FOOD</a>
            @include('partials.user-nav', ['active' => 'berita'])
        </div>
    </header>

    <main>
        <section class="page-hero">
            <div class="container">
                <h1>BERITA KAMI</h1>
            </div>
        </section>

        @if($featuredNews)
            <section class="featured-news">
                <div class="container featured-wrap">
                    @if($featuredNews->image_path)
                        <a href="{{ route('berita.show', $featuredNews) }}" class="featured-image">
                            <img src="{{ Storage::url($featuredNews->image_path) }}" alt="{{ $featuredNews->title }}">
                        </a>
                    @endif
                    <article class="featured-copy">
                        <h2>{{ $featuredNews->title }}</h2>
                        @if($featuredNews->description)
                            <p>{{ $featuredNews->description }}</p>
                        @endif
                        <a class="btn" href="{{ route('berita.show', $featuredNews) }}">Baca Selengkapnya</a>
                    </article>
                </div>
            </section>
        @endif

        @if($otherNews->isNotEmpty())
            <section class="more-news">
                <div class="container">
                    <h2>BERITA LAINNYA</h2>
                    <div class="news-grid">
                        @foreach($otherNews as $news)
                            <a href="{{ route('berita.show', $news) }}" class="news-card">
                                @if($news->image_path)
                                    <img src="{{ Storage::url($news->image_path) }}" alt="{{ $news->title }}">
                                @endif
                                <div class="card-body">
                                    <h3>{{ $news->title }}</h3>
                                    @if($news->description)
                                        <p>{{ Str::limit($news->description, 120) }}</p>
                                    @endif
                                    <div class="card-footer">
                                        <span>Baca selengkapnya</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </main>
    @include('partials.user-footer')
</body>
</html>
