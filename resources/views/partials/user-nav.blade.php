<button class="nav-hamburger" id="navHamburger" onclick="openUserSidebar()" aria-label="Buka menu" aria-expanded="false">
    <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
</button>

<div class="user-sidebar-overlay" id="userSidebarOverlay" onclick="closeUserSidebar()"></div>

<aside class="user-sidebar" id="userSidebar" aria-label="Menu navigasi">
    <div class="user-sidebar-header">
        <span class="user-sidebar-brand">TASTY FOOD</span>
        <button class="user-sidebar-close" onclick="closeUserSidebar()" aria-label="Tutup menu">
            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
    <nav class="user-sidebar-nav">
        <a href="/" class="user-sidebar-link @if(($active ?? '') === 'home') active @endif">Home</a>
        <a href="/tentang" class="user-sidebar-link @if(($active ?? '') === 'tentang') active @endif">Tentang</a>
        <a href="/berita" class="user-sidebar-link @if(($active ?? '') === 'berita') active @endif">Berita</a>
        <a href="/galeri" class="user-sidebar-link @if(($active ?? '') === 'galeri') active @endif">Galeri</a>
        <a href="/kontak" class="user-sidebar-link @if(($active ?? '') === 'kontak') active @endif">Kontak</a>
    </nav>
    <div class="user-sidebar-footer">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="user-sidebar-logout">LOGOUT</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="user-sidebar-logout">LOGIN</a>
        @endauth
    </div>
</aside>

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

<script>
    function openUserSidebar() {
        document.getElementById('userSidebar').classList.add('open');
        document.getElementById('userSidebarOverlay').classList.add('active');
        document.getElementById('navHamburger').setAttribute('aria-expanded', 'true');
    }
    function closeUserSidebar() {
        document.getElementById('userSidebar').classList.remove('open');
        document.getElementById('userSidebarOverlay').classList.remove('active');
        document.getElementById('navHamburger').setAttribute('aria-expanded', 'false');
    }
</script>
