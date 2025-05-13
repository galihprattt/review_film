@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Daftar Komentar</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>User</th>
                <th>Film</th>
                <th>Komentar</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($komentars as $komentar)
                <tr>
                    <td>{{ $komentar->user->name ?? '-' }}</td>
                    <td>{{ $komentar->film->judul ?? '-' }}</td>
                    <td>{{ $komentar->isi }}</td>
                    <td>{{ $komentar->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <form action="{{ route('admin.komentar.destroy', $komentar->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada komentar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
