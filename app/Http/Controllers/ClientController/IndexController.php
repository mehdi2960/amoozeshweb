<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories=Category::query()->where('parent_id',null)->get();
        $brands=Brand::all();
        return view('client.index',compact('categories','brands'));
    }
}
