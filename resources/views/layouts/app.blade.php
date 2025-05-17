<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/moduleD.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="{{ asset('assets/js/modalpopup.js') }}" defer></script>
</head>

<body>

    @include('partials.navbar')

    <main class="mainContent">
        @yield('content')
    </main>

    <div id="overlay" onclick="closeAllPopups()"></div>
    @include('partials.signin')
    @include('partials.signup')

    @include('partials.footer')
</body>

</html>