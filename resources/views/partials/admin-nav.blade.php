@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
@endpush

<nav class="admin-nav">
    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/Logo.png') }}" alt="Logo"></a>
    <div class="AdminheadLinks">
        <a href="{{ route('admin.users.index') }}">Users</a>
        <a href="{{ route('admin.products.index') }}">Products List</a>
        <a href="{{ route('products.create') }}">Add Product</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button class="logout-button" type="submit">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </div>
</nav>