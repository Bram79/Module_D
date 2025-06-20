@php
    $revenueInEuros = $totalRevenue / 100;
    $revenueDisplay = $revenueInEuros >= 1000
        ? number_format($revenueInEuros / 1000, 1, ',', '.') . 'K'
        : number_format($revenueInEuros, 2, ',', '.');
@endphp

<div class="admin-boxes">
    <div class="adminBox">
        <div>
            <p>{{ $userCount }}</p>
            <h5>Users</h5>
        </div>
        <i class="fa fa-male"></i>
    </div>
    <div class="adminBox">
        <div>
            <p>{{ $productCount }}</p>
            <h5>Products</h5>
        </div>
        <i class="fa-solid fa-cart-shopping"></i>
    </div>
    <div class="adminBox">
        <div>
            <p>{{ $orderCount }}</p>
            <h5>Orders</h5>
        </div>
        <i class='fas fa-money-check-alt'></i>
    </div>
    <div class="adminBox">
        <div>
            <p>€{{ $revenueDisplay }}</p>
            <h5>Income</h5>
        </div>
        <i class="fas fa-university"></i>
    </div>
</div>