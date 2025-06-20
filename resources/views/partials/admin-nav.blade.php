@stack('styles')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
@endpush

<nav class="admin-nav">
    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/Logo.png') }}" alt="Logo"></a>
    <div class="AdminheadLinks">
        <a href="{{ route('admin.users.index') }}">Users admin</a>
        <a href="{{ route('admin.products.index') }}">Product admin</a>
        <a href="{{ route('admin.payments') }}">Orders admin</a>
        <div class="logout-push-botom">
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button class="logout-button2" type="submit">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>