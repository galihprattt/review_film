<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4">Tambah Film / Anime</h1>

    <form action="{{ route('admin.films.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Genre</label>
            <input type="text" name="genre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Rating</label>
            <input type="number" step="0.1" max="10" name="rating" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Ulasan</label>
            <textarea name="ulasan" rows="4" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Poster (opsional)</label>
            <input type="file" name="poster" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.films.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
