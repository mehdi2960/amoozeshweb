<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\CategoryUpdateRequest;
use App\Http\Requests\AdminRequest\CreateRequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::query()->paginate(6); //for categoryList
        $selectCategory = Category::all(); //for selectCategory
        return view('admin.categories.index',compact('categories','selectCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequestCategory $request)
    {
        Category::query()->create([
            'parent_id'=>$request->get('parent_id'),
            'title_fa'=>$request->get('title_fa'),
            'title_en'=>$request->get('title_en')
        ]);
        return back()->with('success', 'دسته با موفقیت افزوده شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories=Category::all();
        return view('admin.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $categoryUnique = Category::query()
            ->where('title_fa', $request->get('title_fa'))
            ->where('id', '!=', $category->id)
            ->exists();

        if ($categoryUnique) {
            return back()->withErrors(['عنوان فارسی دسته بندی تکراری است!']);
        }
        $category->update([
            'parent_id' => $request->get('parent_id'),
            'title_fa' => $request->get('title_fa'),
            'title_en' => $request->get('title_en'),
        ]);
        return redirect(route('category.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
