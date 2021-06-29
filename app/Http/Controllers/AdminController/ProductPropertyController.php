<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{
    public function create(Product $product)
    {
        $propertyGroups = $product->category->propertyGroups;
        return view('admin.productProperty.create', compact('product', 'propertyGroups'));
    }

    public function store(Request $request, Product $product)
    {
        $product->properties()->sync($request->get('properties'));
        return back();
    }
}
