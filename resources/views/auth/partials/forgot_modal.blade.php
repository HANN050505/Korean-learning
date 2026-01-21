<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="small text-muted mb-3">Enter your email to receive a reset link.</p>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <label>Email Address</label>
                    <input type="email" name="email" required class="form-control mb-3">
                    
                    <button type="submit" class="btn btn-dark w-100">Send Link</button>
                </form>
            </div>
        </div>
    </div>
</div>