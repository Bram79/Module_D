<div class="popup" id="popup-forgotpassword">
    <h1>Forgot Password</h1>

    <p class="text-description">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset
        link that will allow you to choose a new one.
    </p>

    @if (session('status'))
        <div class="success-message">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->has('email'))
        <div class="error-message">
            <ul>
                @foreach ($errors->get('email') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input class="modern-input" type="email" name="email" placeholder="Email" value="{{ old('email') }}"
            class="modern-input" required autofocus>
        <button class="modern-button" type="submit" class="modern-button">Send Reset Link</button>
    </form>
</div>