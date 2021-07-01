<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Product $product)
    {
        auth()->user()->likeProduct($product);
        return back();
    }
}
