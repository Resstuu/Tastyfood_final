<nav class="nav" aria-label="Navigasi utama">
    <a href="/" @if(($active ?? '') === 'home') aria-current="page" @endif>Home</a>
    <a href="/tentang" @if(($active ?? '') === 'tentang') aria-current="page" @endif>Tentang</a>
    <a href="/berita" @if(($active ?? '') === 'berita') aria-current="page" @endif>Berita</a>
    <a href="/galeri" @if(($active ?? '') === 'galeri') aria-current="page" @endif>Galeri</a>
    <a href="/kontak" @if(($active ?? '') === 'kontak') aria-current="page" @endif>Kontak</a>

    @auth
        <form action="{{ route('logout') }}" method="POST" class="nav-logout">
            @csrf
            <button type="submit" class="nav-action">LOGOUT</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="nav-action">LOGIN</a>
    @endauth
</nav>
