<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class PropertyController extends Controller
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
        $properties = Property::all();
        $propertyGroup = PropertyGroup::all();
        return view('admin.properties.index', compact('properties', 'propertyGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>"required",
            'property_group_id'=>'required|exists:property_groups,id'
        ]);

        Property::query()->create([
            'title'=>$request->get('title'),
            'property_group_id'=>$request->get('property_group_id')
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $propertyGroup=PropertyGroup::all();
        return view('admin.properties.edit',compact('property','propertyGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title'=>"required",
            'property_group_id'=>'required|exists:property_groups,id'
        ]);

        $property->update($request->all());

        return redirect(route('properties.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
