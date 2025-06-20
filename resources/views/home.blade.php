@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <header class="headerMain">
        <img src="{{ asset('assets/images/Header.png') }}" alt="Header">
    </header>
    <p>Best Pre-orderderd</p>
    <div class="homeProducts">
        <div class="productsBox">

        </div>
        <div class="productsBox">

        </div>
        <div class="productsBox">

        </div>
    </div>
    @if (session('showPopup'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                openPopup('{{ session('showPopup') }}');
            });
        </script>
    @endif

@endsection