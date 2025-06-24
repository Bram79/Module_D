<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::select('products.*', DB::raw('SUM(order_product.quantity) as total_sold'))
            ->join('order_product', 'products.id', '=', 'order_product.product_id')
            ->groupBy(
                'products.id',
                'products.name',
                'products.description',
                'products.overProduct',
                'products.price',
                'products.image',
                'products.created_at',
                'products.updated_at'
            )
            ->orderByDesc('total_sold')
            ->take(4)
            ->get();

        return view('home', compact('products'));
    }
}

