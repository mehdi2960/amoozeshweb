<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.productProperty.index',compact('product'));
    }

    public function create(Product $product)
    {
        $propertyGroups = $product->category->propertyGroups;
        return view('admin.productProperty.create', compact('product', 'propertyGroups'));
    }

    public function store(Request $request, Product $product)
    {
        $properties = collect($request->get('properties'))->filter(function ($item) {
            if (!empty($item['value'])) {
                return $item;
            }
        });
        $product->properties()->sync($properties);
        return back();
    }
}
