<div class="popup" id="popup-signup">
    <span class="close" onclick="closeAllPopups()">&times;</span>
    <h1>Sign up </h1>
    <form action="{{ route('signup.form') }}" method="POST">
        @csrf
        <input name="signName" type="text" placeholder="Name..." class="modern-input">
        <input type="text" name="signEmail" placeholder="Email..." class="modern-input">
        <input type="password" name="signPassword" placeholder="Password..." class="modern-input">
        <input type="password" name="signCheckPassword" placeholder="Password check..." class="modern-input">
        <button type="submit" class="modern-button">Sign in</button>
    </form>
</div>