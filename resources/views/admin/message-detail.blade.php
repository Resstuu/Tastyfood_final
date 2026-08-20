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
                <a href="{{ route('message.index') }}" class="nav-link active">
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
            <h2>Detail Pesan</h2>
            <p>Isi pesan dari pengirim</p>
        </div>

        @if(session('success'))
            <div class="alert-success-box">{{ session('success') }}</div>
        @endif

        <div class="pesan-card" style="max-width: 720px; padding: 32px;">
            <div style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
                <div style="display: flex; gap: 40px; flex-wrap: wrap;">
                    <div>
                        <div style="font-size: 11px; font-weight: 800; text-transform: uppercase; color: #888; margin-bottom: 4px;">Nama</div>
                        <div style="font-size: 14px; font-weight: 600;">{{ $message->name }}</div>
                    </div>
                    <div>
                        <div style="font-size: 11px; font-weight: 800; text-transform: uppercase; color: #888; margin-bottom: 4px;">Email</div>
                        <div style="font-size: 14px; font-weight: 600;">{{ $message->email }}</div>
                    </div>
                    <div>
                        <div style="font-size: 11px; font-weight: 800; text-transform: uppercase; color: #888; margin-bottom: 4px;">Tanggal</div>
                        <div style="font-size: 14px; font-weight: 600;">{{ $message->created_at->format('d-m-Y H:i') }}</div>
                    </div>
                </div>
            </div>

            <div style="margin-bottom: 24px;">
                <div style="font-size: 11px; font-weight: 800; text-transform: uppercase; color: #888; margin-bottom: 6px;">Subject</div>
                <div style="font-size: 16px; font-weight: 700; color: #111;">{{ $message->subject }}</div>
            </div>

            <div style="margin-bottom: 32px;">
                <div style="font-size: 11px; font-weight: 800; text-transform: uppercase; color: #888; margin-bottom: 10px;">Pesan</div>
                <div style="font-size: 14px; line-height: 1.8; color: #333; background: #f8f9fa; border-radius: 8px; padding: 16px 20px;">{{ $message->message }}</div>
            </div>

            <div style="display: flex; gap: 12px; align-items: center;">
                <a href="{{ route('message.index') }}" class="btn-secondary">← Kembali</a>
                <form action="{{ route('message.destroy', $message) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action-delete">Hapus Pesan</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
