<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Tasty Food</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @vite(['resources/css/app.css'])
    <style>
        .site-header { position: relative; padding: 25px 0; background: #fff; z-index: 50; }
    </style>
</head>
<body>
    <header class="site-header shadow-sm">
        <div class="container nav-wrap flex justify-between items-center">
            <a href="/" class="brand text-black no-underline" style="font-size: 28px; font-weight: 800;">TASTY FOOD</a>
            @include('partials.user-nav', ['active' => 'kontak'])
        </div>
    </header>

    <main>
        <section class="page-hero">
            <div class="container">
                <h1>KONTAK KAMI</h1>
            </div>
        </section>

        <section class="contact-section">
            <div class="container">
                <h2>KONTAK KAMI</h2>
                <form class="contact-form" action="{{ route('kontak.store') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-stack">
                            <label>
                                <span>Subject</span>
                                <input type="text" name="subject" placeholder="Subject">
                            </label>
                            <label>
                                <span>Name</span>
                                <input type="text" name="name" placeholder="Name">
                            </label>
                            <label>
                                <span>Email</span>
                                <input type="email" name="email" placeholder="Email">
                            </label>
                        </div>
                        <label class="message-field">
                            <span>Message</span>
                            <textarea name="message" placeholder="Message"></textarea>
                        </label>
                    </div>
                    <button class="btn-submit" type="submit">Kirim</button>
                </form>

                <div class="contact-info" aria-label="Informasi kontak">
                    <article>
                        <span class="info-icon">
                            <img src="/assets/ic_markunread_24px.png" alt="">
                        </span>
                        <h3>Email</h3>
                        <p>tastyfood@gmail.com</p>
                    </article>
                    <article>
                        <span class="info-icon">
                            <img src="/assets/ic_call_24px.png" alt="">
                        </span>
                        <h3>Phone</h3>
                        <p>+62 812 3456 7890</p>
                    </article>
                    <article>
                        <span class="info-icon">
                            <img src="/assets/ic_place_24px.png" alt="">
                        </span>
                        <h3>Location</h3>
                        <p>Kota Bandung, Jawa Barat</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="map-section" aria-label="Peta lokasi Tasty Food">
            <div class="container">
                <div class="map-frame">
                    <iframe
                        title="Lokasi Tasty Food di Bandung"
                        src="https://www.google.com/maps?q=Kota%20Bandung%2C%20Jawa%20Barat&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>
    @include('partials.user-footer')
</body>
</html>
