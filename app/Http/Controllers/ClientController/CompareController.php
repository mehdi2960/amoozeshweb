<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function add(Product $product)
    {
        if (session()->has('compareProduct')) {
            if (in_array($product->id, session()->get('compareProduct'))) {
                alert()->warning('محصول مورد نظر به لیست علاقه مندی های شما اضافه شده است', 'دقت کنید');
                return redirect()->back();
            }
            session()->push('compareProduct', $product->id);
        } else {
            session()->put('compareProduct', [$product->id]);
        }
        alert()->success('محصول مورد نظر به لیست علاقه مندی های شما اضافه شد', 'باتشکر');
        return redirect()->back();
    }

    public function index()
    {
        if (session()->has('compareProduct')) {
            $products=Product::query()->findOrFail(session()->get('compareProduct'));
            $categories=Category::query()->where('parent_id',null)->get();
            $brands=Brand::all();
            return view('client.compare.index',compact('products','categories','brands'));
        }
        alert()->warning('در ابتدا باید محصولی برای مقایسه اضافه کنید', 'دقت کنید');
        return redirect()->back();
    }

    public function remove($productId)
    {
        if (session()->has('compareProduct')) {
            foreach (session()->get('compareProduct') as $key=>$item){
                if ($item == $productId){
                    session()->pull('compareProduct.'.$key);
                }
            }
            if (session()->has('compareProduct') == []){
                session()->forget('compareProduct');
                return redirect()->route('client.home');
            }
            return redirect()->route('client.compare.index');
        }
        return redirect()->back();
    }
}
