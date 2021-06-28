<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\CreateDiscountRequest;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.discounts.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscountRequest $request,Product $product)
    {
        $product->addDiscount($request);
        return redirect(route('product.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @param \App\Models\Discount $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,Discount $discount)
    {
        return view('admin.discounts.edit',compact('product','discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, Request $request)
    {
        $product->updateDiscount($request);
        return redirect(route('product.create'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @param \App\Models\Discount $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,Discount $discount)
    {
        $product->deleteDiscount($discount);
        return redirect(route('product.create'));
    }
}
