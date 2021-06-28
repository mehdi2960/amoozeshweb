<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $categories=Category::query()->where('parent_id',null)->get();
        $brands=Brand::all();
        return view('client.products.show',compact('product','categories','brands'));
    }
}
