<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="{{ asset('assets/js/modalpopup.js') }}" defer></script>
    @stack('styles')
</head>

<body>

    <div class="admin-layout">
        @include('partials.admin-nav')

        <div class="admin-content">
            @include('admin.dashboard')

            <main>
                @yield('content')
            </main>
        </div>
    </div>


</body>

</html>