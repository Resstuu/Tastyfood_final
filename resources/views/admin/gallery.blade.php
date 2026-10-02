<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/galery.css') }}">
    <title>Tasty Food - Admin Galeri</title>
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
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.gallery') }}" class="nav-link active">
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
                    <h2>galeri</h2>
                    <p>Kelola foto dan deskripsi yang tampil di halaman user</p>
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
                <h3 class="section-title">Tambah Menu Foto</h3>
            </div>

            <form class="form-card" action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Nama Menu / Judul Foto</label>
                    <input id="title" type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Salad Buah Segar" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" rows="4" placeholder="Tulis deskripsi singkat menu">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Foto Menu</label>
                    <input id="image" type="file" name="image" accept="image/png,image/jpeg,image/webp" required>
                </div>
                <button type="submit" class="btn-primary">Simpan Foto</button>
            </form>
        </section>

        <section class="crud-section">
            <div class="section-header">
                <h3 class="section-title">Galeri Foto</h3>
                <a href="{{ route('public.galeri') }}" class="btn-secondary">Lihat Halaman User</a>
            </div>

            <div class="gallery-grid">
                @forelse($galleries as $gallery)
                    <div class="card">
                        <img src="{{ Storage::url($gallery->image_path) }}" class="card-image" alt="{{ $gallery->title }}">
                        <div class="card-body">
                            <span class="card-title">{{ $gallery->title }}</span>
                            @if($gallery->description)
                                <p class="card-description">{{ $gallery->description }}</p>
                            @endif
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn-action-edit" onclick="openEditModal({{ $gallery->id }}, '{{ addslashes($gallery->title) }}', '{{ addslashes($gallery->description) }}', '{{ Storage::url($gallery->image_path) }}')">Edit</button>
                            <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="empty-state">Belum ada foto galeri. Tambahkan foto pertama dari form di atas.</p>
                @endforelse
            </div>
        </section>
    </main>

    <div id="editModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:1000; align-items:center; justify-content:center;">
        <div style="background:#fff; border-radius:12px; padding:32px; width:100%; max-width:480px; position:relative;">
            <h3 style="margin-bottom:20px; font-size:1.2rem; font-weight:700;">Edit Foto Galeri</h3>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="edit_title">Nama Menu / Judul Foto</label>
                    <input id="edit_title" type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label for="edit_description">Deskripsi</label>
                    <textarea id="edit_description" name="description" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label>Foto Saat Ini</label>
                    <img id="edit_preview" src="" alt="Preview" style="width:100%; max-height:180px; object-fit:cover; border-radius:8px; margin-bottom:8px;">
                </div>
                <div class="form-group">
                    <label for="edit_image">Ganti Foto (opsional)</label>
                    <input id="edit_image" type="file" name="image" accept="image/png,image/jpeg,image/webp">
                </div>
                <div style="display:flex; gap:12px; margin-top:16px;">
                    <button type="submit" class="btn-primary">Simpan Perubahan</button>
                    <button type="button" class="btn-delete" onclick="closeEditModal()">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.querySelector('.admin-sidebar').classList.toggle('open');
            document.getElementById('sidebarOverlay').classList.toggle('active');
        }
        function closeSidebar() {
            document.querySelector('.admin-sidebar').classList.remove('open');
            document.getElementById('sidebarOverlay').classList.remove('active');
        }
        function openEditModal(id, title, description, imageUrl) {
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_preview').src = imageUrl;
            document.getElementById('editForm').action = '/galery/' + id;
            document.getElementById('editModal').style.display = 'flex';
        }
        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
</body>
</html>
