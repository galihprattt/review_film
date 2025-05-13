@extends('layouts.app')

@section('content')
<h1 class="mb-4">📽️ Daftar Film & Anime (Admin)</h1>

{{-- Tombol tambah film --}}
<a href="{{ route('admin.films.create') }}" class="btn btn-success mb-3">+ Tambah Film</a>

{{-- Form filter --}}
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
        <a href="{{ route('admin.films.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
    </div>
</form>

{{-- Daftar film --}}
<div class="row">
    @forelse ($films as $film)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($film->poster)
                    <img src="{{ asset('storage/' . $film->poster) }}" class="card-img-top object-fit-cover" style="height: 300px;" alt="{{ $film->judul }}">
                @else
                    <img src="https://via.placeholder.com/300x400?text=No+Poster" class="card-img-top object-fit-cover" style="height: 300px;" alt="No Poster">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $film->judul }}</h5>
                    <p class="card-text"><strong>Genre:</strong> {{ $film->genre }}</p>
                    <p class="card-text"><strong>Rating:</strong> {{ $film->rating }}/10</p>

                    <a href="{{ route('films.show', $film->id) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                    <a href="{{ route('admin.films.edit', $film->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.films.destroy', $film->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Belum ada film ditemukan.</p>
    @endforelse
</div>

<div class="mt-4">
    {{ $films->links() }}
</div>
@endsection
