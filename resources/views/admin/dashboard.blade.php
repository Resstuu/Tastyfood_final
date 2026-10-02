<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <aside class="admin-sidebar">
        <div>
            <div class="brand-header">
                <h1>Tasty Food</h1>
                <p>Admin Dashboard</p>
            </div>

            <nav class="nav-menu">
                <a href="{{ route('dashboard') }}" class="nav-link active">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.gallery') }}" class="nav-link">
                    <span>Galeri</span>
                </a>
                <a href="{{ route('admin.news') }}" class="nav-link">
                    <span>Berita</span>
                </a>
                <a href="{{ route('message.index') }}" class="nav-link">
                    <span>Pesan</span>
                </a>
                <a href="{{ route('admin.footer') }}" class="nav-link">
                    <span>Footer</span>
                </a>
            </nav>
        </div>

        <div class="user-profile">
            <div>
                <div class="user-name">Admin Tasty</div>
                <div class="user-email">admin@tastyfood.com</div>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout" title="Logout"
                    style="background: none; border: none; cursor: pointer; padding: 0;">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
    </aside>
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    <main class="admin-main">

        <div class="topbar">
            <div class="topbar-left">
                <button class="hamburger-btn" id="hamburgerBtn" onclick="toggleSidebar()">
                    <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div>
                    <h2>Dashboard</h2>
                    <p>Kelola website Tasty Food</p>
                </div>
            </div>
        </div>

        <div class="dashboard-cards-container">
            <div class="stat-card">
                <div class="card-icon yellow">
                    <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="card-info">
                    <h3 class="card-value">{{ $galleryCount ?? 0 }}</h3>
                    <span class="card-label">Galeri</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="card-icon blue">
                    <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                <div class="card-info">
                    <h3 class="card-value">{{ $newsCount ?? 0 }}</h3>
                    <span class="card-label">Berita</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="card-icon orange">
                    <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </div>
                <div class="card-info">
                    <h3 class="card-value">{{ $messageCount ?? 0 }}</h3>
                    <span class="card-label">Pesan</span>
                </div>
            </div>
        </div>

    </main>
</body>

<script>
    function toggleSidebar() {
        document.querySelector('.admin-sidebar').classList.toggle('open');
        document.getElementById('sidebarOverlay').classList.toggle('active');
    }
    function closeSidebar() {
        document.querySelector('.admin-sidebar').classList.remove('open');
        document.getElementById('sidebarOverlay').classList.remove('active');
    }
</script>

</html>
