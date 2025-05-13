@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f0f2f5; /* Abu muda */
        min-height: 100vh;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
    }

    .login-card {
        width: 100%;
        max-width: 420px;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .login-header {
        background-color: #1d3557; /* Biru gelap */
        color: white;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        text-align: center;
        padding: 1rem;
    }

    .login-btn {
        background-color: #1d3557;
        color: white;
        transition: background 0.3s ease;
    }

    .login-btn:hover {
        background-color: #457b9d;
    }
</style>

<div class="login-container">
    <div class="card login-card">
        <div class="login-header">
            <h4 class="mb-0">🎬 Masuk ke ReviewFilm</h4>
        </div>

        <div class="card-body bg-white">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                           value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        Ingat Saya
                    </label>
                </div>

                <div class="d-grid mb-2">
                    <button type="submit" class="btn login-btn">Login</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}">🔒 Lupa password?</a>
            </div>
        </div>
    </div>
</div>
@endsection
