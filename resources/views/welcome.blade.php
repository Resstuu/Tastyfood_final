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
                    @if($heroGallery?->description)
                        <p>{{ $heroGallery->description }}</p>
                    @endif
                    <a href="{{ route('tentang') }}" class="btn">Tentang Kami</a>
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

        <section class="featured" aria-label="Menu pilihan">
            <div class="container">
                @if ($galleries && $galleries->isNotEmpty())
                    <div class="carousel food-carousel" data-food-carousel>
                        <div class="food-carousel-window">
                            <div class="carousel-track food-carousel-track" data-carousel-track>
                                @foreach ($galleries as $gallery)
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
                        @if($galleries->count() > 1)
                            <button class="carousel-btn carousel-btn--prev" type="button" aria-label="Menu sebelumnya" data-carousel-prev>&lt;</button>
                            <button class="carousel-btn carousel-btn--next" type="button" aria-label="Menu berikutnya" data-carousel-next>&gt;</button>
                            <div class="carousel-dots" aria-label="Navigasi carousel" data-carousel-dots></div>
                        @endif
                    </div>
                @else
                    <p class="empty-state empty-state--light">Belum ada foto menu</p>
                @endif
            </div>
        </section>

        <section class="section news">
            <div class="container">
                <h2 class="section-title">Berita Kami</h2>
                @if ($featuredNews || ($news && $news->isNotEmpty()))
                    <div class="news-grid">
                        @if ($featuredNews)
                            <a href="{{ route('berita.show', $featuredNews) }}" class="article large">
                                @if($featuredNews->image_path)
                                    <img class="curry-cover" src="{{ Storage::url($featuredNews->image_path) }}" alt="{{ $featuredNews->title }}">
                                @endif
                                <div class="article-body">
                                    <h3>{{ $featuredNews->title }}</h3>
                                    @if($featuredNews->description)
                                        <p>{{ Str::limit($featuredNews->description, 300) }}</p>
                                    @endif
                                    <div class="article-footer">
                                        <span class="read-more">Baca selengkapnya</span>
                                        <span class="dots">...</span>
                                    </div>
                                </div>
                            </a>
                        @endif
                        @if ($news && $news->isNotEmpty())
                            <div class="side-news">
                                @foreach ($news->take(4) as $newsItem)
                                    <a href="{{ route('berita.show', $newsItem) }}" class="article">
                                        @if($newsItem->image_path)
                                            <img src="{{ Storage::url($newsItem->image_path) }}" alt="{{ $newsItem->title }}">
                                        @endif
                                        <div class="article-body">
                                            <h3>{{ $newsItem->title }}</h3>
                                            @if($newsItem->description)
                                                <p>{{ Str::limit($newsItem->description, 95) }}</p>
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
                @else
                    <p class="empty-state">Belum ada berita</p>
                @endif
            </div>
        </section>

        <section class="section gallery">
            <div class="container">
                <h2 class="section-title">Galeri Kami</h2>
                @if ($galleries && $galleries->isNotEmpty())
                    <div class="gallery-grid">
                        @foreach ($galleries->take(6) as $gallery)
                            <a href="{{ route('public.galeri.show', $gallery) }}">
                                <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}">
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="empty-state">Belum ada galeri</p>
                @endif
                <div class="gallery-action">
                    <a href="{{ route('public.galeri') }}" class="btn">Lihat Lebih Banyak</a>
                </div>
            </div>
        </section>
    </main>

    @include('partials.user-footer')
    <script>
        document.querySelectorAll('[data-food-carousel]').forEach((carousel) => {
            const track = carousel.querySelector('[data-carousel-track]');
            const cards = Array.from(track.querySelectorAll('.food-card'));
            const prevButton = carousel.querySelector('[data-carousel-prev]');
            const nextButton = carousel.querySelector('[data-carousel-next]');
            const dotsWrap = carousel.querySelector('[data-carousel-dots]');
            let currentPage = 0;
            let itemsPerView = 1;

            const getItemsPerView = () => {
                if (window.innerWidth >= 1024) return 4;
                if (window.innerWidth >= 641) return 2;
                return 1;
            };

            const getPageCount = () => Math.ceil(cards.length / itemsPerView);

            const getMaxPage = () => Math.max(0, getPageCount() - 1);

            const renderDots = () => {
                if (!dotsWrap) return;

                const dotCount = getPageCount();
                dotsWrap.innerHTML = '';

                if (dotCount <= 1) return;

                for (let index = 0; index < dotCount; index += 1) {
                    const dot = document.createElement('button');
                    dot.className = `carousel-dot${index === currentPage ? ' active' : ''}`;
                    dot.type = 'button';
                    dot.setAttribute('aria-label', `Tampilkan blok menu ${index + 1}`);
                    dot.addEventListener('click', () => {
                        currentPage = index;
                        updateCarousel();
                    });
                    dotsWrap.appendChild(dot);
                }
            };

            const updateCarousel = () => {
                itemsPerView = getItemsPerView();
                currentPage = Math.min(currentPage, getMaxPage());

                const targetCard = cards[currentPage * itemsPerView];
                const offset = targetCard ? targetCard.offsetLeft : 0;

                track.classList.add('is-sliding');
                track.style.transform = `translateX(-${offset}px)`;
                window.setTimeout(() => track.classList.remove('is-sliding'), 520);

                if (prevButton) prevButton.hidden = getMaxPage() === 0;
                if (nextButton) nextButton.hidden = getMaxPage() === 0;

                renderDots();
            };

            prevButton?.addEventListener('click', () => {
                currentPage = currentPage <= 0 ? getMaxPage() : currentPage - 1;
                updateCarousel();
            });

            nextButton?.addEventListener('click', () => {
                currentPage = currentPage >= getMaxPage() ? 0 : currentPage + 1;
                updateCarousel();
            });

            window.addEventListener('resize', updateCarousel);
            updateCarousel();
        });
    </script>
</body>
</html>
