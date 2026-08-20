<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a href="/" class="brand">TASTY FOOD</a>
            @include('partials.user-nav', ['active' => 'home'])
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-copy">
                    <div class="line" aria-hidden="true"></div>
                    <h1>HEALTHY <strong>TASTY FOOD</strong></h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
                    <a href="tentang" class="btn">Tentang Kami</a>
                </div>
            </div>
            <img class="hero-food" src="/assets/img-4-2000x2000.png" alt="Sepiring makanan sehat">
        </section>

        <section class="about">
            <div class="container">
                <h2 class="section-title">Tentang Kami</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
                <div class="line" aria-hidden="true"></div>
            </div>
        </section>

        @if($featuredGalleries->isNotEmpty())
            <section class="featured" aria-label="Menu pilihan">
                <div class="container">
                    <div class="food-grid">
                        @foreach($featuredGalleries as $gallery)
                            <a href="{{ route('public.galeri.show', $gallery) }}" class="food-card">
                                <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}">
                                <h3>{{ $gallery->title }}</h3>
                                @if($gallery->description)  
                                    <p>{{ Str::limit($gallery->description, 95) }}</p>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if($homeNews->isNotEmpty())
            <section class="section news">
                <div class="container">
                    <h2 class="section-title">Berita Kami</h2>
                    <div class="news-grid">
                        @php
                            $mainNews = $homeNews->first();
                            $sideNews = $homeNews->skip(1);
                        @endphp

                        <a href="{{ route('berita.show', $mainNews) }}" class="article large">
                            @if($mainNews->image_path)
                                <img class="curry-cover" src="{{ Storage::url($mainNews->image_path) }}" alt="{{ $mainNews->title }}">
                            @endif
                            <div class="article-body">
                                <h3>{{ $mainNews->title }}</h3>
                                @if($mainNews->description)
                                    <p>{{ Str::limit($mainNews->description, 240) }}</p>
                                @endif
                                <div class="article-footer">
                                    <span class="read-more">Baca selengkapnya</span>
                                    <span class="dots">...</span>
                                </div>
                            </div>
                        </a>

                        @if($sideNews->isNotEmpty())
                            <div class="side-news">
                                @foreach($sideNews as $news)
                                    <a href="{{ route('berita.show', $news) }}" class="article">
                                        @if($news->image_path)
                                            <img src="{{ Storage::url($news->image_path) }}" alt="{{ $news->title }}">
                                        @endif
                                        <div class="article-body">
                                            <h3>{{ $news->title }}</h3>
                                            @if($news->description)
                                                <p>{{ Str::limit($news->description, 95) }}</p>
                                            @endif
                                            <div class="article-footer">
                                                <span class="read-more">Baca selengkapnya</span>
                                                <span class="dots">...</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif

        @if($homeGalleries->isNotEmpty())
            <section class="section gallery">
                <div class="container">
                    <h2 class="section-title">Galeri Kami</h2>
                    <div class="gallery-grid">
                        @foreach($homeGalleries as $gallery)
                            <a href="{{ route('public.galeri.show', $gallery) }}">
                                <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}">
                            </a>
                        @endforeach
                    </div>
                    <div class="gallery-action">
                        <a href="{{ route('public.galeri') }}" class="btn">Lihat Lebih Banyak</a>
                    </div>
                </div>
            </section>
        @endif
    </main>
    @include('partials.user-footer')
</body>
</html>
