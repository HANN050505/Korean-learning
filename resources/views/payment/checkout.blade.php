@extends('layouts.dashboard')

@section('title', 'Pembayaran Premium')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center p-5">
                    <h3 class="fw-bold mb-2">Upgrade Premium</h3>
                    <p class="text-muted mb-4">Akses semua materi tanpa batas!</p>
                    <h2 class="text-primary fw-bold mb-4">Rp 50.000</h2>

                    <div class="d-grid gap-2">
                        <button id="pay-button" class="btn btn-success btn-lg rounded-pill shadow-lg">
                            Bayar Sekarang
                        </button>
                        <a href="{{ url()->previous() }}" class="btn btn-link text-muted">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT MIDTRANS --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    
    payButton.addEventListener('click', function () {
        // Panggil Snap dengan Token
        window.snap.pay('{{ $snapToken }}', {
            
            // =============================================
            // BAGIAN INI YANG MENCEGAH KE EXAMPLE.COM
            // =============================================
            onSuccess: function(result){
                // Kita oper ke Controller "success" bawa ID Payment
                window.location.href = "{{ route('payment.success', $payment->id) }}";
            },
            
            onPending: function(result){
                alert("Menunggu pembayaran...");
                location.reload();
            },
            
            onError: function(result){
                alert("Pembayaran Gagal!");
                location.reload();
            },

            onClose: function(){
                alert('Anda menutup popup tanpa menyelesaikan pembayaran');
            }
        });
    });
</script>
@endsection