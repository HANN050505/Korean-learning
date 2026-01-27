@extends('admin.layouts.dashboard')

@section('title', 'Kelola Materi')

@section('admin.content')
<p></p>
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Kelola Kosakata</h1>
            <p class="mb-0 text-gray-600">Materi: <strong>{{ $lesson->title }}</strong></p>
        </div>
        <a href="{{ route('admin.lessons') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        {{-- FORM TAMBAH (KIRI) --}}
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Kosakata</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.lessons.vocabularies.store', $lesson->id) }}" method="POST">
                        @csrf
                        
                        {{-- SESUAIKAN NAME DENGAN MODEL (korean) --}}
                        <div class="form-group mb-3">
                            <label>Kata (Korea)</label>
                            <input type="text" name="korean" class="form-control" placeholder="Contoh: 사과" required>
                        </div>

                        {{-- SESUAIKAN NAME DENGAN MODEL (meaning) --}}
                        <div class="form-group mb-3">
                            <label>Arti (Indonesia)</label>
                            <input type="text" name="meaning" class="form-control" placeholder="Contoh: Apel" required>
                        </div>

                        {{-- SESUAIKAN NAME DENGAN MODEL (latin) --}}
                        <div class="form-group mb-3">
                            <label>Cara Baca (Romanization)</label>
                            <input type="text" name="latin" class="form-control" placeholder="Contoh: Sagwa" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block w-100">
                            <i class="fas fa-plus"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- TABEL DATA (KANAN) --}}
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kosakata ({{ $lesson->vocabularies->count() }})</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>Korea</th>
                                    <th>Arti</th>
                                    <th>Cara Baca</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lesson->vocabularies as $vocab)
                                <tr>
                                    {{-- PANGGIL VARIABEL SESUAI MODEL ($vocab->korean) --}}
                                    <td class="h5 text-gray-800 font-weight-bold">
                                        {{ $vocab->korean }}
                                    </td>

                                    <td>{{ $vocab->meaning }}</td>

                                    {{-- PANGGIL VARIABEL SESUAI MODEL ($vocab->latin) --}}
                                    <td class="text-muted font-italic">
                                        {{ $vocab->latin }}
                                    </td>

                                    <td>
                                        <form action="{{ route('admin.vocabularies.delete', $vocab->id) }}" method="POST" onsubmit="return confirm('Hapus kosakata ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-circle btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i class="fas fa-book-open fa-2x mb-3 text-gray-300"></i>
                                        <p class="mb-0">Belum ada kosakata.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection