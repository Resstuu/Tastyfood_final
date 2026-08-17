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
                <a href="{{ route('admin.news') }}" class="nav-link active">
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
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout" title="Logout">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </button>
            </form>
        </div>
    </aside>
    <main class="admin-main">

        <div class="topbar">
            <h2>berita</h2>
            <p>Kelola berita</p>
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
                <h3 class="section-title">Tambah Berita</h3>
            </div>

            <form class="form-card" action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul Berita</label>
                    <input id="title" type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul berita" required>
                </div>
                <div class="form-group">
                    <label for="description">Keterangan</label>
                    <textarea id="description" name="description" rows="5" placeholder="Masukkan isi atau keterangan berita">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Gambar Berita</label>
                    <input id="image" type="file" name="image" accept="image/png,image/jpeg,image/webp">
                </div>
                <button type="submit" class="btn-primary">Simpan Berita</button>
            </form>
        </section>

        <section id="berita" class="crud-section">
            <div class="section-header">
                <h3 class="section-title">BERITA</h3>
                <a href="{{ route('berita') }}" class="btn-secondary">Lihat Halaman User</a>
            </div>

            <div class="table-card">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul Berita</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($newsItems as $news)
                            <tr>
                                <td>
                                    <img src="{{ $news->image_path ? Storage::url($news->image_path) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=150' }}" class="table-img" alt="{{ $news->title }}">
                                </td>
                                <td class="text-title">{{ $news->title }}</td>
                                <td class="text-muted">{{ Str::limit($news->description, 80) }}</td>
                                <td>
                                    <form action="{{ route('admin.news.destroy', $news) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action-delete">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data berita.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>

</body>
</html>
