<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class PropertyGroupController extends Controller
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
        $propertyGroup=PropertyGroup::all();
       return view('admin.PropertyGroup.index',compact('propertyGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>"required"
        ]);

        PropertyGroup::query()->create([
            'title'=>$request->get('title')
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PropertyGroup $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyGroup $propertyGroup)
    {
        return view('admin.PropertyGroup.edit',compact('propertyGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param PropertyGroup $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyGroup $propertyGroup)
    {
        $request->validate([
            'title'=>"required"
        ]);

        $propertyGroup->update([
            'title'=>$request->get('title',$propertyGroup->title)
        ]);

        return redirect(route('propertyGroup.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyGroup $propertyGroup)
    {
        //
    }
}
