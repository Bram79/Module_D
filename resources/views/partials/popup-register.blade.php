<div class="popup" id="popup-signup">
    <h1>Sign Up</h1>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="modern-input" required
            autofocus>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="modern-input" required>
        <input type="password" name="password" placeholder="Password" class="modern-input" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="modern-input"
            required>
        <button class="modern-button" type="submit">Sign up</button>
    </form>
</div>