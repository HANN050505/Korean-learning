@extends('admin.layouts.dashboard')

@section('title', 'Kelola Keuangan')

@section('admin.content')
<div class="container-fluid p-0">

    <div class="home-header" style="display: flex; justify-content: space-between; align-items: center;">
        {{-- Bagian Kiri: Teks Judul --}}
        <div>
            <h2 class="fw-bold text-dark">Manajemen Keuangan</h2>
            <p class="text-muted mb-0">Daftar Pembayaran Masuk.</p>
            <p></p>
            <span class="badge bg-primary">{{ date('d M Y') }}</span>
        </div>
        {{-- Bagian Kanan: Logo --}}
        <img src="{{ asset('images/icons/korea.png') }}" alt="Korea Logo" style="width: 70px; height: auto;">
        
    </div>

    {{-- Header Halaman --}}

    <h1 class="h3 mb-4 text-gray-800">Riwayat Transaksi</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pembayaran Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>User (Pembayar)</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $key => $payment)
                        <tr>
                            <td>{{ $payments->firstItem() + $key }}</td>
                            <td>
                                {{-- Menampilkan Nama User --}}
                                <div><strong>{{ $payment->user->name ?? 'User Terhapus' }}</strong></div>
                                <small class="text-muted">{{ $payment->user->email ?? '-' }}</small>
                            </td>
                            <td>
                                {{-- Format Rupiah --}}
                                Rp {{ number_format($payment->amount, 0, ',', '.') }}
                            </td>
                            <td>
                                {{-- Badge Status Warna-warni --}}
                                @if($payment->status == 'success' || $payment->status == 'paid')
                                    <span class="badge badge-success">Berhasil</span>
                                @elseif($payment->status == 'pending')
                                    <span class="badge badge-warning">Menunggu</span>
                                @elseif($payment->status == 'failed')
                                    <span class="badge badge-danger">Gagal</span>
                                @else
                                    <span class="badge badge-secondary">{{ $payment->status }}</span>
                                @endif
                            </td>
                            <td>
                                {{-- Format Tanggal Indonesia --}}
                                {{ $payment->created_at->format('d M Y, H:i') }} WIB
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center p-4">
                                <img src="https://img.icons8.com/ios/50/000000/empty-box.png" width="50" class="mb-2 opacity-50">
                                <p class="text-muted mb-0">Belum ada data transaksi.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $payments->links() }}
            </div>
        </div>
    </div>

</div>
@endsection