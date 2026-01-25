@extends('admin.layouts.dashboard') 

@section('title', 'Kelola Materi')

@section('admin.content')

<div class="container-fluid p-0">

    {{-- Header Halaman --}} 

    <div class="home-header" style="display: flex; justify-content: space-between; align-items: center;">
        {{-- Bagian Kiri: Teks Judul --}}
        <div>
            <h2 class="fw-bold text-dark">Manajemen Materi</h2>
            <p class="text-muted mb-0">Daftar semua materi yang tersedia.</p>
            <p></p>
            <span class="badge bg-primary">{{ date('d M Y') }}</span>
        </div>
        {{-- Bagian Kanan: Logo --}}
        <img src="{{ asset('images/icons/korea.png') }}" alt="Korea Logo" style="width: 70px; height: auto;">
        
    </div>

    <a href="{{ route('admin.lessons.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Materi Baru
        </a>

    <p></p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Materi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Icon</th>
                            <th>Judul Materi</th>
                            <th>Total Vocab</th>
                            <th>Status Kuis</th>
                            <th style="width: 25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($lessons as $index => $lesson)
                        <tr>
                            <td>{{ $lessons->firstItem() + $index }}</td>
                            <td>
                                <i class="{{ $lesson->icon }} fa-2x text-gray-500"></i>
                            </td>
                            <td>
                                <strong>{{ $lesson->title }}</strong>
                                <br>
                                <small class="text-muted">{{ Str::limit($lesson->description, 50) }}</small>
                            </td>

                            <td>
                                <span class="badge badge-info">{{ $lesson->vocabularies_count }} Kosakata</span>
                            </td>

                            <td>
                                @if($lesson->quiz)
                                    <span class="badge badge-success">Ada Kuis</span>
                                @else
                                    <span class="badge badge-warning">Belum Ada</span>
                                @endif
                            </td>

                            <td>
                                {{-- TOMBOL VOCAB (BARU) --}}
                                <a href="{{ route('admin.lessons.vocabularies', $lesson->id) }}" class="btn btn-sm btn-info shadow-sm mb-1">
                                    <i class="fas fa-list"></i> Vocab
                                </a>

                                {{-- TOMBOL EDIT --}}
                                <a href="#" class="btn btn-sm btn-warning shadow-sm mb-1">
                                    <i class="fas fa-pen"></i> Edit
                                </a>

                                {{-- TOMBOL HAPUS --}}
                                <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus materi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger shadow-sm mb-1">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada materi yang dibuat.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $lessons->links() }}
            </div>
        </div>
    </div>

</div>
@endsection