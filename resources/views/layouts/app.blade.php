<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/moduleD.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="{{ asset('assets/js/modalpopup.js') }}" defer></script>
</head>

<body>

    @include('partials.navbar')

    <main class="mainContent">
        @yield('content')
    </main>

    <div id="overlay" onclick="closeAllPopups()"></div>
    @include('partials.popup-login')
    @include('partials.popup-register')
    @include('auth.forgot-password')
    @include('partials.footer')
</body>

</html>