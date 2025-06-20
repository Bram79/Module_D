<nav class="headMain">
    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/Logo.png') }}" alt="Logo"></a>
    <ul class="headLinks">
        <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i>Home</a>
        <a href="{{ route('products.index') }}"><i class="fa-solid fa-industry"></i>Products</a>
        <a href="{{ route('contact') }}"><i class="fa-solid fa-phone"></i>Contact</a>

        @auth
            <div class="dropdown">
                <button class="dropbtn"><i class='fas fa-user-alt' style="color: #ffffff"></i></button>
                <div class="dropdown-content">
                    <a href="{{ route('dashboard') }}">Account</a>
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.products.index') }}">
                            Admin<i class="fa-solid fa-gauge-high"></i>
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button class="logout-button" type="submit">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                </div>
            </div>


        @else
            <div class="dropdown">
                <button class="dropbtn"><i class='fas fa-user-alt' style="color: #ffffff"></i></button>
                <div class="dropdown-content">
                    <a href="#" onclick="openPopup('popup-signin')"><i class="fa-solid fa-arrow-right-to-bracket"></i>Sign
                        in</a>
                    <a href="#" onclick="openPopup('popup-signup')"><i class="fa-solid fa-address-card"></i>Sign up</a>
                </div>
            </div>

        @endauth

        <a href="{{ route('shoppingcart') }}"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a>
    </ul>
</nav>