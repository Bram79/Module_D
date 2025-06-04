<div class="popup" id="popup-signin">
    <h1>Sign In</h1>

    @if ($errors->has('email') || $errors->has('password'))
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="modern-input" required
            autofocus>
        <input type="password" name="password" placeholder="Password" required class="modern-input">
        {{-- <a href="{{ route('password.request') }}">Forgot your password?</a> --}}
        <a class="inputA" href="#" onclick="openPopup('popup-forgotpassword')">Forgot your password?</a>
        <a class="inputA" href="#" onclick="openPopup('popup-signup')">Sign up</a>
        <button class="modern-button" type="submit">Sign in</button>
    </form>
</div>