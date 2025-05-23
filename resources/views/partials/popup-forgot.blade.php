<div class="popup" id="popup-forgot-password">
    <span class="close" onclick="closeAllPopups()">&times;</span>
    <h1>Reset Password</h1>

    @if (session('status'))
        <div class="success-message">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->has('email'))
        <div class="error-message">
            {{ $errors->first('email') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" class="modern-input" required>
        <button type="submit" class="modern-button">Send Reset Link</button>
        <a href="#" onclick="openPopup('popup-signin')">Back to Sign in</a>
    </form>
</div>