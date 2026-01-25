@extends('admin.layouts.dashboard') 

@section('title', 'Kelola Materi')

@section('admin.content')
<p></p>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Materi Baru</h1>
        <a href="{{ route('admin.lessons') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.lessons.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="title">Judul Materi</label>
                    <input type="text" name="title" class="form-control" placeholder="Contoh: Basic Grammar" required>
                </div>

                <div class="form-group mb-3">
                    <label for="icon">Icon Class (FontAwesome)</label>
                    <input type="text" name="icon" class="form-control" placeholder="Contoh: fas fa-book">
                    <small class="text-muted">Masukkan class icon. Contoh: <code>fas fa-book</code>, <code>fas fa-plane</code></small>
                </div>

                <div class="form-group mb-3">
                    <label for="description">Deskripsi Singkat</label>
                    <textarea name="description" rows="4" class="form-control" placeholder="Deskripsi tentang materi ini..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Materi</button>
            </form>
        </div>
    </div>

</div>
@endsection