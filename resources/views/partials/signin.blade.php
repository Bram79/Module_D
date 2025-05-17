<div class="popup" id="popup-signin">
    <span class="close" onclick="closeAllPopups()">&times;</span>
    <h1>Sign In</h1>
    <form action="{{ route('signin.form') }}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Email or Username" class="modern-input">
        <input type="password" name="password" placeholder="Password" class="modern-input">
        <button type="submit" class="modern-button">Sign in</button>
        <button class="modern-Signupbutton"><a href="#" onclick="openPopup('popup-signup')">Sign up</a></button>
    </form>
</div>