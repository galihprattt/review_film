<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review Film - Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }

        .hero {
            background: url('https://images.unsplash.com/photo-1747116728949-bd0b222526a4?q=80&w=1375&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center/cover no-repeat;
            height: 60vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero::after {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .film-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .film-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.1);
        }

        .film-card img {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }

        .footer-icons a {
            color: white;
            margin: 0 10px;
            font-size: 1.4rem;
        }

        .card-title {
            color: #fff;
        }

        .card-text {
            color: #ccc;
        }

        .btn-primary {
            background-color: #e50914;
            border: none;
        }

        .btn-primary:hover {
            background-color: #b20710;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🎬 ReviewFilm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Dashboard</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <header class="hero">
        <div class="hero-content">
            <h1 class="display-5 fw-bold">Temukan Review Film & Anime Terbaik</h1>
            <p class="lead">Nikmati ulasan jujur dan rekomendasi film terkini</p>
        </div>
    </header>

    {{-- Film Terbaru --}}
    <section class="container my-5">
        <h2 class="text-center mb-4 fw-bold">🎥 Review Terbaru</h2>

        {{-- Filter Film --}}
        <form method="GET" class="row g-2 mb-4">
            <div class="col-md-3">
                <input type="text" name="genre" value="{{ request('genre') }}" placeholder="Genre" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="number" step="0.1" name="min_rating" value="{{ request('min_rating') }}" placeholder="Min Rating" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="number" step="0.1" name="max_rating" value="{{ request('max_rating') }}" placeholder="Max Rating" class="form-control">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('home') }}" class="btn btn-outline-light w-100">Reset</a>
            </div>
        </form>

        <div class="row">
            @forelse ($films as $film)
                <div class="col-md-4 mb-4">
                    <div class="card film-card h-100">
                        <img src="{{ $film->poster ? asset('storage/' . $film->poster) : 'https://via.placeholder.com/400x250' }}" alt="{{ $film->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $film->judul }}</h5>
                            <p class="card-text">{{ Str::limit($film->ulasan, 100) }}</p>
                            <a href="{{ route('films.show', $film->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Tidak ada film tersedia saat ini.</p>
            @endforelse
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $films->links() }}
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-2">&copy; {{ date('Y') }} ReviewFilm. All rights reserved.</p>
            <div class="footer-icons">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
