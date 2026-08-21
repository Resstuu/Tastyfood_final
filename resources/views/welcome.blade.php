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
    @vite(['resources/css/app.css'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .site-header { position: relative; padding: 25px 0; background: #fff; z-index: 50; }
        .hero-img-bg { position: absolute; right: -5%; top: -10%; width: 50%; max-width: 600px; z-index: -1; }
        @media (max-width: 1024px) { .hero-img-bg { display: none; } }
    </style>
</head>
<body class="bg-white overflow-x-hidden">
    <header class="site-header shadow-sm">
        <div class="container nav-wrap flex justify-between items-center">
            <a href="/" class="brand text-black no-underline" style="font-size: 28px; font-weight: 800;">TASTY FOOD</a>
            @include('partials.user-nav', ['active' => 'home'])
        </div>
    </header>

    <main class="relative overflow-hidden">
        {{-- Hero Section --}}
        <div class="container relative">
            <div class="flex flex-col items-center gap-8 py-12 lg:my-20 lg:w-1/2 lg:items-start lg:gap-6 xl:px-0">
                <div class="w-full">
                    <div class="lg:w-30 -top-6 mb-8 h-0.5 w-16 bg-gray-900 sm:-top-8 sm:w-20 md:-top-10 md:w-24 lg:h-1"></div>
                    <p class="lg:leading-14 text-3xl uppercase leading-tight sm:text-4xl md:text-5xl">
                         <br>
                        <span class="font-extrabold uppercase">Tasty food</span>
                    </p>
                </div>
                <p class="text-sm font-medium text-gray-700 leading-relaxed">
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ex at ante volutpat posuere. Morbi vel nunc tortor. Nulla facilisi. Nulla accumsan ullamcorper purus nec venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet erat vel leo rutrum lobortis
                </p>
                <x-ui.button :href="route('tentang')" class="w-full text-center sm:w-auto text-white">TENTANG KAMI</x-ui.button>
            </div>
            <img src="/assets/img-4-2000x2000.png" alt="Sepiring makanan sehat" class="hero-img-bg drop-shadow-2xl">
        </div>

        {{-- About Home --}}
        <div class="flex items-center justify-center px-4 py-12 sm:px-6 md:px-8 bg-gray-50">
            <div class="flex w-full flex-col gap-6 py-12 text-center sm:gap-8 sm:py-16 md:w-3/4 md:gap-10 md:py-20 lg:w-2/5">
                <p class="text-lg font-bold sm:text-xl uppercase">TENTANG KAMI</p>
                <p class="text-sm font-medium text-gray-700 leading-relaxed">
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ex at ante volutpat posuere. Morbi vel nunc tortor. Nulla facilisi. Nulla accumsan ullamcorper purus nec venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet erat vel leo rutrum lobortis
                </p>
                <div class="lg:bottom-25 lg:w-30 bottom-12 left-0 right-0 mx-auto h-0.5 w-16 bg-gray-900 sm:bottom-16 sm:w-20 md:bottom-20 md:w-24 lg:h-1"></div>
            </div>
        </div>

        {{-- Carousel Home --}}
        @if ($galleries && $galleries->isNotEmpty())
            <div class="lg:px-22 md:px-22 overflow-hidden bg-gray-900 px-4 pb-24 pt-48 sm:px-6 relative"
                style="background-image: url('/assets/Group%2070.png'); background-size: cover; background-position: center;"
                x-data="carousel()"
                x-init="init()"
                @resize.window="handleResize()"
               
               
               >

                <div class="container relative w-full">
                    <div class="relative">
                        <!-- Render slides directly in HTML -->
                        <div class="flex justify-center gap-4 sm:gap-6">
                            <template x-for="(gallery, index) in visibleSlides" :key="index">
                                <a :href="gallery.url" class="flex flex-col gap-5 pt-24 relative w-64 rounded-2xl bg-white px-8 py-10 text-center shadow-lg transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                                    <h3 class="flex-1 text-xl font-bold uppercase text-gray-900" x-text="gallery.title"></h3>
                                    <p class="flex-1 text-sm text-gray-600" x-text="gallery.description ? gallery.description.substring(0, 80) + '...' : ''"></p>
                                    <img :src="gallery.image_url" :alt="gallery.title"
                                        class="absolute left-0 right-0 top-0 mx-auto h-32 w-32 -translate-y-1/2 rounded-full object-cover shadow-md transition duration-300 hover:scale-110 bg-white p-1">
                                </a>
                            </template>
                        </div>
                    </div>

                    <button type="button"
                        class="absolute left-0 top-1/2 z-30 flex -translate-y-1/2 cursor-pointer items-center justify-center px-2 transition duration-150 hover:scale-110 sm:px-4"
                        @click="changeSlide(-1)"
                       >
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-amber-400 text-gray-900 shadow-lg transition duration-150 hover:bg-amber-500 hover:scale-110 hover:shadow-xl sm:h-12 sm:w-12">
                            <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m15 19-7-7 7-7" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>

                    <button type="button"
                        class="absolute right-0 top-1/2 z-30 flex -translate-y-1/2 cursor-pointer items-center justify-center px-2 transition duration-150 hover:scale-110 sm:px-4"
                        @click="changeSlide(1)"
                       >
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-amber-400 text-gray-900 shadow-lg transition duration-150 hover:bg-amber-500 hover:scale-110 hover:shadow-xl sm:h-12 sm:w-12">
                            <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m9 5 7 7-7 7" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>

            @php
                $carouselData = $galleries->map(function($g) {
                    return [
                        'title' => $g->title,
                        'description' => $g->description,
                        'image_url' => Storage::url($g->image_path),
                        'url' => route('public.galeri.show', $g)
                    ];
                });
            @endphp

            <script>
                function carousel() {
                    return {
                        galleries: @json($carouselData),
                        currentSlide: 0,
                        itemsPerSlide: 1,

                        init() {
                            this.updateItemsPerSlide();
                            this.$watch('itemsPerSlide', () => {});
                        },

                        get visibleSlides() {
                            if (!this.galleries || this.galleries.length === 0) return [];
                            const start = this.currentSlide * this.itemsPerSlide;
                            return this.galleries.slice(start, start + this.itemsPerSlide);
                        },

                        get totalSlides() {
                            return Math.ceil(this.galleries.length / this.itemsPerSlide);
                        },

                        updateItemsPerSlide() {
                            const width = window.innerWidth;
                            if (width >= 1024) {
                                this.itemsPerSlide = 4;
                            } else if (width >= 768) {
                                this.itemsPerSlide = 2;
                            } else {
                                this.itemsPerSlide = 1;
                            }
                            if (this.currentSlide >= this.totalSlides) {
                                this.currentSlide = 0;
                            }
                        },

                        handleResize() {
                            this.updateItemsPerSlide();
                        },

                        changeSlide(direction) {
                            if (this.totalSlides > 0) {
                                this.currentSlide = (this.currentSlide + direction + this.totalSlides) % this.totalSlides;
                            }
                        }
                    }
                }
            </script>
        @endif

        {{-- News Home --}}
        <div class="bg-gray-100 px-4 py-16 sm:px-6 md:px-8 lg:px-20 lg:py-24">
            <div class="container">
                <p class="mb-10 text-center text-xl font-extrabold uppercase tracking-widest sm:text-2xl md:mb-12">BERITA KAMI</p>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
                    @if ($featuredNews)
                        <x-ui.card :image="Storage::url($featuredNews->image_path)" :title="$featuredNews->title" content="{{ Str::limit($featuredNews->description, 300) }}"
                            :link="route('berita.show', $featuredNews->id)" featured="true" />
                    @endif
                    @if ($news && $news->isNotEmpty())
                        @foreach ($news as $index => $newsItem)
                            <x-ui.card :image="Storage::url($newsItem->image_path)" :title="$newsItem->title" content="{{ Str::limit($newsItem->description, 100) }}"
                                :link="route('berita.show', $newsItem->id)" />
                        @endforeach
                    @elseif (!$featuredNews)
                        <div class="col-span-full my-24 flex items-center justify-center sm:my-32">
                            <p class="text-3xl font-extrabold uppercase sm:text-4xl md:text-5xl text-gray-400">Belum ada berita</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Gallery Home --}}
        <div class="flex flex-col gap-12 px-4 py-16 sm:gap-16 sm:px-6 md:gap-20 md:px-8 lg:px-20 lg:py-24">
            <div class="container">
                <p class="text-center text-xl font-extrabold uppercase tracking-widest sm:text-2xl mb-10">GALERI KAMI</p>
                @if ($galleries && $galleries->isNotEmpty())
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-3 mb-12">
                        @foreach ($galleries->take(6) as $index => $gallery)
                            <a href="{{ route('public.galeri.show', $gallery) }}">
                                <x-ui.image-card :image="Storage::url($gallery->image_path)" :alt="$gallery->title" />
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="my-24 flex items-center justify-center sm:my-32">
                        <p class="text-3xl font-extrabold uppercase sm:text-4xl md:text-5xl text-gray-400">Belum ada galeri</p>
                    </div>
                @endif
                <div class="text-center">
                    <x-ui.button href="{{ route('public.galeri') }}" class="mx-auto w-full text-center sm:w-auto text-white">LIHAT LEBIH BANYAK</x-ui.button>
                </div>
            </div>
        </div>
    </main>

    @include('partials.user-footer')

</body>
</html>
