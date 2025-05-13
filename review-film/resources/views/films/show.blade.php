@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $film->poster) }}" class="img-fluid rounded shadow" alt="{{ $film->judul }}">
        </div>
        <div class="col-md-8">
            <h2 class="fw-bold">{{ $film->judul }}</h2>
            <p class="text-muted">{{ $film->genre }} | {{ $film->tahun }}</p>
            <p>{{ $film->ulasan }}</p>
            <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
        </div>
    </div>

    <hr>
    <h3 class="mt-4">Komentar</h3>

    {{-- Form komentar (hanya jika login) --}}
    @auth
       <form action="{{ route('komentar.store', $film->id) }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <textarea name="isi" rows="3" class="form-control" placeholder="Tulis komentar..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Login</a> untuk menulis komentar.</p>
    @endauth

    {{-- Daftar komentar --}}
    <div class="mt-4">
        @forelse ($film->komentars as $komentar)
            <div class="border-bottom mb-3 pb-2">
                <strong>{{ $komentar->user->name }}</strong><br>
                {{ $komentar->isi }}<br>
                <small class="text-muted">{{ $komentar->created_at->diffForHumans() }}</small>
            </div>
        @empty
            <p>Belum ada komentar.</p>
        @endforelse
    </div>
</div>
@endsection
