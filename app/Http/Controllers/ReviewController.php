<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class ReviewController extends Controller
{



    public function store(Request $request, Product $product)
    {
        $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $product->reviews()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()->route('products.show', $product)->with('success', 'Review geplaatst!');
    }


}
