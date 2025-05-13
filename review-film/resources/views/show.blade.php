@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $film->gambar) }}" class="img-fluid rounded shadow" alt="{{ $film->judul }}">
        </div>
        <div class="col-md-8">
            <h2 class="fw-bold">{{ $film->judul }}</h2>
            <p class="text-muted">{{ $film->genre }} | {{ $film->tahun }}</p>
            <p>{{ $film->deskripsi }}</p>
            <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection
