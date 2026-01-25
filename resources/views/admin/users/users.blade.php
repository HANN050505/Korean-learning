@extends('admin.layouts.dashboard') 

@section('title', 'Kelola User')

@section('admin.content')

<div class="container-fluid p-0">
    {{-- Header Halaman --}}
    <div class="home-header" style="display: flex; justify-content: space-between; align-items: center;">
        {{-- Bagian Kiri: Teks Judul --}}
        <div>
            <h2 class="fw-bold text-dark">Manajemen Pengguna</h2>
            <p class="text-muted mb-0">Kelola user aplikasi K-Class.</p>
            <p></p>
            <span class="badge bg-primary">{{ date('d M Y') }}</span>
        </div>
        {{-- Bagian Kanan: Logo --}}
        <img src="{{ asset('images/icons/korea.png') }}" alt="Korea Logo" style="width: 70px; height: auto;">
        
    </div>


    {{-- Alert Pesan Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3">No</th>
                            <th class="py-3">Nama Lengkap</th>
                            <th class="py-3">Email</th>
                            <th class="py-3">Status</th>
                            <th class="py-3">Bergabung</th>
                            <th class="text-end pe-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                        <tr>
                            <td class="ps-4 fw-bold">{{ $users->firstItem() + $index }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-2" style="width: 35px; height: 35px; font-weight: bold;">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->is_premium)
                                    <span class="badge bg-warning text-dark">Premium</span>
                                @else
                                    <span class="badge bg-secondary">Free</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td class="text-end pe-4">
                                <div class="d-flex gap-2 justify-content-end">
                                    {{-- Tombol Ganti Status --}}
                                    <form action="{{ route('admin.users.premium', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm {{ $user->is_premium ? 'btn-outline-secondary' : 'btn-outline-warning text-dark' }}">
                                            {{ $user->is_premium ? '⬇️ Free' : '⬆️ Premium' }}
                                        </button>
                                    </form>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">Belum ada user.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination --}}
            <div class="p-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

@endsection