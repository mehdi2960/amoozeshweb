<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\ProductCreateRequest;
use App\Http\Requests\AdminRequest\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::withTrashed()->get();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.index', compact('products', 'categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $path = $request->file('image')->storeAs('public/image-products', $request->file('image')->getClientOriginalName());
        Product::query()->create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'image' => $path,
        ]);

        return redirect(route('product.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $path = $product->image;
        if ($request->hasFile('image')) {
            unlink(str_replace('public', 'storage', $product->image));
            $path = $request->file('image')
                ->storeAs('public/image-products', $request->file('image')
                    ->getClientOriginalName());
        }

        $slugUnique=Product::query()->where('slug',$request->get('slug'))
            ->where('id','!=',$product->id)
            ->exists();
        if ($slugUnique){
            return back()->withErrors(['اسلاگ انتخابی تکراری است']);
        }

        $product->update([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'image' => $path,
        ]);

        return redirect(route('product.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return back();
    }
}
