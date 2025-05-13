@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1>Manajemen Film</h1>
    <a href="{{ route('admin.films.create') }}" class="btn btn-primary mb-3">+ Tambah Film</a>

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Genre</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($films as $film)
                <tr>
                    <td>{{ $film->judul }}</td>
                    <td>{{ $film->genre }}</td>
                    <td>{{ $film->rating }}</td>
                    <td>
                        <a href="{{ route('admin.films.edit', $film->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.films.destroy', $film->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $films->links() }}
</div>
@endsection
