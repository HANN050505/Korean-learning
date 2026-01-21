<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <label>Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="form-control mb-2">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror

                    <label>Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="form-control mb-2">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror

                    <label>Password</label>
                    <input type="password" name="password" required class="form-control mb-2">
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror

                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" required class="form-control mb-3">

                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>