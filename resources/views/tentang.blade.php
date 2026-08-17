<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang - Tasty Food</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a href="/" class="brand">TASTY FOOD</a>
            @include('partials.user-nav', ['active' => 'tentang'])
        </div>
    </header>

    <main>
        <section class="page-hero">
            <div class="container">
                <h1>TENTANG KAMI</h1>
            </div>
        </section>

        <section class="intro-section">
            <div class="container intro-wrap">
                <article class="intro-copy">
                    <h2>TASTY FOOD</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
                </article>
                <div class="intro-gallery" aria-label="Foto restoran dan hidangan">
                    <img src="/assets/anh-nguyen-kcA-c3f_3FE-unsplash.jpg" alt="Salad segar di mangkuk hijau">
                    <img src="/assets/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg" alt="Koki menata hidangan di dapur">
                </div>
            </div>
        </section>

        <section class="vision-section">
            <div class="container vision-grid">
                <div class="vision-images" aria-label="Foto sajian makanan">
                    <img src="/assets/mariana-medvedeva-iNwCO9ycBlc-unsplash.jpg" alt="Hidangan kari dan roti">
                    <img src="/assets/brooke-lark-oaz0raysASk-unsplash.jpg" alt="Mangkuk makanan sehat dengan sumpit">
                </div>
                <article class="text-block">
                    <h2>VISI</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ex at ante volutpat posuere. Morbi vel nunc tortor. Nulla facilisi. Nulla accumsan ullamcorper purus nec venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet erat vel leo rutrum lobortis.</p>
                </article>
            </div>
        </section>

        <section class="mission-section">
            <div class="container mission-grid">
                <article class="text-block">
                    <h2>MISI</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ex at ante volutpat posuere. Morbi vel nunc tortor. Nulla facilisi. Nulla accumsan ullamcorper purus nec venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet erat vel leo rutrum lobortis.</p>
                </article>
                <figure class="mission-image">
                    <img src="/assets/sanket-shah-SVA7TyHxojY-unsplash.jpg" alt="Sayuran segar di talenan">
                </figure>
            </div>
        </section>
    </main>
    @include('partials.user-footer')
</body>
</html>
