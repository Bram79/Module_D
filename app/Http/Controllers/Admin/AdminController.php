<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminController extends Controller
{
    public function adminOrders()
    {
        $orders = Order::with(['user', 'products'])->latest()->get();
        return view('admin.payments', compact('orders'));
    }
}
