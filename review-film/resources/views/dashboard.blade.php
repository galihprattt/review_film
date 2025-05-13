@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">
        {{ Auth::user()->is_admin ? 'Admin Panel' : 'Dashboard' }}
    </h1>

    <div class="alert alert-success">
        Anda berhasil login sebagai <strong>
            {{ Auth::user()->is_admin ? 'Admin' : Auth::user()->name }}
        </strong>.
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Lihat Film</h5>
                    <p class="card-text">Jelajahi dan baca ulasan film.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary">Beranda</a>
                </div>
            </div>
        </div>

        @if(Auth::user()->is_admin)
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Kelola Film</h5>
                    <p class="card-text">Tambah, edit, dan hapus data film.</p>
                    <a href="{{ route('admin.films.index') }}" class="btn btn-warning">Admin Film</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
