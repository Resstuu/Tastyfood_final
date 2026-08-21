<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Tasty Food</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/galeri.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @vite(['resources/css/app.css'])
    <style>
        .site-header { position: relative; padding: 25px 0; background: #fff; z-index: 50; }
    </style>
</head>
<body>
    @php
        $galleryItems = $galleries->map(fn ($gallery) => [
            'detail_url' => route('public.galeri.show', $gallery),
            'image_url' => Storage::url($gallery->image_path),
            'title' => $gallery->title,
            'description' => $gallery->description,
        ]);
        $featured = $galleryItems->first();
    @endphp

    <header class="site-header shadow-sm">
        <div class="container nav-wrap flex justify-between items-center">
            <a href="/" class="brand text-black no-underline" style="font-size: 28px; font-weight: 800;">TASTY FOOD</a>
            @include('partials.user-nav', ['active' => 'galeri'])
        </div>
    </header>

    <main>
        <section class="page-hero">
            <div class="container">
                <h1>GALERI KAMI</h1>
            </div>
        </section>

        @if($galleryItems->isNotEmpty())
            <section class="showcase" aria-label="Sorotan galeri">
                <div class="container slider-wrap">
                    <button class="slider-arrow prev" type="button" aria-label="Foto sebelumnya" data-slider-prev></button>
                    <a href="{{ $featured['detail_url'] }}" class="featured-photo" data-slider-link>
                        <img src="{{ $featured['image_url'] }}" alt="{{ $featured['title'] }}" data-slider-image>
                        <span data-slider-caption>
                            <strong>{{ $featured['title'] }}</strong>
                            @if($featured['description'])
                                <span>{{ $featured['description'] }}</span>
                            @endif
                        </span>
                    </a>
                    <button class="slider-arrow next" type="button" aria-label="Foto berikutnya" data-slider-next></button>
                </div>
            </section>
        @endif

        <section class="gallery-section" aria-label="Daftar foto galeri">
            <div class="container">
                @if($galleryItems->isNotEmpty())
                    <div class="gallery-grid">
                        @foreach($galleryItems as $item)
                            <a href="{{ $item['detail_url'] }}" class="gallery-item">
                                <img src="{{ $item['image_url'] }}" alt="{{ $item['title'] }}">
                                <div class="gallery-caption">
                                    <h2>{{ $item['title'] }}</h2>
                                    @if($item['description'])
                                        <p>{{ $item['description'] }}</p>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>
    @include('partials.user-footer')
    @if($galleryItems->isNotEmpty())
        <script>
            const galleryItems = @json($galleryItems->values());
            const sliderLink = document.querySelector('[data-slider-link]');
            const sliderImage = document.querySelector('[data-slider-image]');
            const sliderCaption = document.querySelector('[data-slider-caption]');
            let activeIndex = 0;

            function showGalleryItem(index) {
                if (!sliderImage || galleryItems.length === 0) return;

                activeIndex = (index + galleryItems.length) % galleryItems.length;
                const item = galleryItems[activeIndex];

                sliderImage.classList.add('is-changing');
                window.setTimeout(() => {
                    sliderLink.href = item.detail_url;
                    sliderImage.src = item.image_url;
                    sliderImage.alt = item.title;
                    sliderCaption.replaceChildren();

                    const title = document.createElement('strong');
                    title.textContent = item.title;
                    sliderCaption.appendChild(title);

                    if (item.description) {
                        const description = document.createElement('span');
                        description.textContent = item.description;
                        sliderCaption.appendChild(description);
                    }

                    sliderImage.classList.remove('is-changing');
                }, 120);
            }

            document.querySelector('[data-slider-prev]')?.addEventListener('click', () => showGalleryItem(activeIndex - 1));
            document.querySelector('[data-slider-next]')?.addEventListener('click', () => showGalleryItem(activeIndex + 1));
        </script>
    @endif
</body>
</html>
