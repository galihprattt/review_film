<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1601933470928-c1e5ae23eb4e?auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
        }

        main {
            flex: 1;
        }

        .glass-card {
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 1rem;
            backdrop-filter: blur(12px);
            color: #000;
        }

        .card-title, .card-text, h1, p {
            text-shadow: 1px 1px 2px rgba(0,0,0,0.4);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand mx-auto text-center">🎬 ReviewFilm Admin</a>
        </div>
    </nav>

    <main class="container my-5 glass-card p-4 shadow-lg">
        <h1 class="mb-4 text-center">👋 Selamat Datang, Admin!</h1>
        <p class="text-center mb-5">Silakan pilih fitur yang ingin dikelola di bawah ini.</p>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card shadow-sm border-primary h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-film fs-1 text-primary mb-3"></i>
                        <h5 class="card-title">Daftar Film</h5>
                        <p class="card-text">Lihat dan kelola semua film yang tersedia di situs.</p>
                        <a href="{{ route('admin.films.index') }}" class="btn btn-primary">Kelola Film</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm border-success h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-plus-circle fs-1 text-success mb-3"></i>
                        <h5 class="card-title">Tambah Film</h5>
                        <p class="card-text">Tambahkan film baru ke dalam daftar.</p>
                        <a href="{{ route('admin.films.create') }}" class="btn btn-success">Tambah Film</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm border-warning h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-chat-left-text fs-1 text-warning mb-3"></i>
                        <h5 class="card-title">Kelola Komentar</h5>
                        <p class="card-text">Pantau dan hapus komentar yang tidak pantas.</p>
                        <a href="{{ route('admin.komentar.index') }}" class="btn btn-warning text-white">Komentar</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm border-secondary h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-person-circle fs-1 text-secondary mb-3"></i>
                        <h5 class="card-title">Edit Profil</h5>
                        <p class="card-text">Perbarui informasi akun admin Anda.</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit Profil</a>
                    </div>
                </div>
            </div>

            {{-- CARD UNTUK EDIT FILM TERAKHIR --}}
            <div class="col">
                <div class="card shadow-sm border-danger h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-pencil-square fs-1 text-danger mb-3"></i>
                        <h5 class="card-title">Edit Film Terbaru</h5>
                        @php
                            $filmTerbaru = \App\Models\Film::latest()->first();
                        @endphp
                        @if($filmTerbaru)
                            <p class="card-text">Edit film terakhir: <strong>{{ $filmTerbaru->judul }}</strong></p>
                            <a href="{{ route('admin.films.edit', $filmTerbaru->id) }}" class="btn btn-danger">Edit Film</a>
                        @else
                            <p class="text-muted">Belum ada film yang bisa diedit.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <small>&copy; {{ date('Y') }} ReviewFilm. Admin Panel.</small>
        </div>
    </footer>
</body>
</html>
