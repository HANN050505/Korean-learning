@extends('admin.layouts.dashboard')

@section('title', 'Detail User')

@section('admin.content')
<p></p>
<div class="container-fluid p-0">
    {{-- Tombol Kembali --}}
    <div class="mb-4">
        {{-- Pastikan ini kembali ke dashboard (Home) atau daftar user --}}
        <a href="{{ route('admin.home') }}" class="btn btn-outline-secondary btn-sm">
            ← Kembali ke Dashboard
        </a>
    </div>

    <div class="row g-4">
        {{-- KARTU PROFIL --}}
        <div class="col-md-5 mx-auto">
            <div class="card border-0 shadow-sm text-center p-4">
                <div class="card-body">
                    {{-- Avatar --}}
                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center mx-auto mb-3" 
                         style="width: 100px; height: 100px; font-size: 40px; font-weight: bold;">
                        {{ substr($user->name, 0, 1) }}
                    </div>

                    <h4 class="fw-bold">{{ $user->name }}</h4>
                    <p class="text-muted">{{ $user->email }}</p>

                    <hr>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Status:</span>
                        @if($user->is_premium)
                            <span class="badge bg-warning text-dark">Premium Member</span>
                        @else
                            <span class="badge bg-secondary">Free Member</span>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <span class="text-muted">Bergabung:</span>
                        <span class="fw-bold text-dark">{{ $user->created_at->format('d M Y') }}</span>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-grid gap-2">
                        <form action="{{ route('admin.users.premium', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn {{ $user->is_premium ? 'btn-outline-danger' : 'btn-warning text-dark' }} w-100">
                                {{ $user->is_premium ? 'Cabut Premium' : 'Berikan Premium' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection