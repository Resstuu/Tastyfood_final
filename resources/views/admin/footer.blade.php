<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
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
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span>Home</span>
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
                <a href="{{ route('admin.footer') }}" class="nav-link active">
                    <span>Footer</span>
                </a>
            </nav>
        </div>

        <div class="user-profile">
            <div>
                <div class="user-name">Admin Tasty</div>
                <div class="user-email">admin@tastyfood.com</div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout" title="Logout">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
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
                    <h2>footer</h2>
                    <p>Kelola footer yang tampil di halaman user</p>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success-box">{{ session('success') }}</div>
        @endif

        @if(isset($errors) && $errors->any())
            <div class="alert-error-box">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <section class="crud-section">
            <div class="section-header">
                <h3 class="section-title">Edit Footer User</h3>
                <a href="{{ route('home') }}" class="btn-secondary">Lihat Halaman User</a>
            </div>

            <form class="form-card form-card-wide" action="{{ route('admin.footer.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="brand_title">Judul Brand</label>
                        <input id="brand_title" type="text" name="brand_title" value="{{ old('brand_title', $footerSetting->brand_title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="copyright">Copyright</label>
                        <input id="copyright" type="text" name="copyright" value="{{ old('copyright', $footerSetting->copyright) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Brand</label>
                    <textarea id="description" name="description" rows="4">{{ old('description', $footerSetting->description) }}</textarea>
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="useful_title">Judul Kolom Useful</label>
                        <input id="useful_title" type="text" name="useful_title" value="{{ old('useful_title', $footerSetting->useful_title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="privacy_title">Judul Kolom Privacy</label>
                        <input id="privacy_title" type="text" name="privacy_title" value="{{ old('privacy_title', $footerSetting->privacy_title) }}" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="useful_links">Link Useful</label>
                        <textarea id="useful_links" name="useful_links" rows="5" placeholder="Blog|#">{{ old('useful_links', $footerSetting->useful_links) }}</textarea>
                        <small class="form-help">Format: Label|URL, satu link per baris.</small>
                    </div>
                    <div class="form-group">
                        <label for="privacy_links">Link Privacy</label>
                        <textarea id="privacy_links" name="privacy_links" rows="5" placeholder="Tentang Kami|/tentang">{{ old('privacy_links', $footerSetting->privacy_links) }}</textarea>
                        <small class="form-help">Contoh: Kontak Kami|/kontak</small>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="contact_title">Judul Kontak</label>
                        <input id="contact_title" type="text" name="contact_title" value="{{ old('contact_title', $footerSetting->contact_title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $footerSetting->email) }}">
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone', $footerSetting->phone) }}">
                    </div>
                    <div class="form-group">
                        <label for="location">Lokasi</label>
                        <input id="location" type="text" name="location" value="{{ old('location', $footerSetting->location) }}">
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="facebook_url">URL Facebook</label>
                        <input id="facebook_url" type="text" name="facebook_url" value="{{ old('facebook_url', $footerSetting->facebook_url) }}">
                    </div>
                    <div class="form-group">
                        <label for="twitter_url">URL Twitter</label>
                        <input id="twitter_url" type="text" name="twitter_url" value="{{ old('twitter_url', $footerSetting->twitter_url) }}">
                    </div>
                </div>

                <button type="submit" class="btn-primary">Simpan Footer</button>
            </form>
        </section>

        <section class="crud-section">
            <div class="section-header">
                <h3 class="section-title">Preview Layout</h3>
            </div>

            <div class="admin-footer-preview">
                @include('partials.user-footer')
            </div>
        </section>
    </main>

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

</body>
</html>
