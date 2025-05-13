<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4">Edit Film / Anime</h1>

    {{-- Menampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $film->judul) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control" value="{{ old('genre', $film->genre) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $film->kategori) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rating</label>
            <input type="number" step="0.1" max="10" name="rating" class="form-control" value="{{ old('rating', $film->rating) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ulasan</label>
            <textarea name="ulasan" rows="4" class="form-control" required>{{ old('ulasan', $film->ulasan) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Poster (opsional)</label>
            <input type="file" name="poster" class="form-control">
            <div class="mt-2">
                @if($film->poster)
                    <small>Poster saat ini:</small><br>
                    <img src="{{ asset('storage/' . $film->poster) }}" height="80">
                @else
                    <small><img src="{{ asset('images/no-image.jpg') }}" height="80"></small>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.films.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
