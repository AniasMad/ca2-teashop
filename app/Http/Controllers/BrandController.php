<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->paginate(8);

        return view('brands.index', [
            'brands' => $brands 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation rules
        $rules = [
            'name' => "required|string|unique:brands,name|min:2|max:50",
            'address' => 'required|string|min:5|max:100',
            'phone' => 'required|string|min:7|max:15',
            'country' => 'required|string|min:2|max:20'
        ];

        $messages = [
            'name.unique' => 'Brand name should be unique'
        ];

        $request->validate($rules, $messages);

        $brand = new Brand;
        $brand->name = $request->name;
        $brand->address = $request->address;
        $brand->phone = $request->phone;
        $brand->country = $request->country;
        $brand->save();

        return redirect()->route('brands.index')->with('status', 'Created a new Brand!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.show', [
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validation rules
        $brand = Brand::findOrFail($id);
        $rules = [
            'name' => "required|string|unique:brands,name,$brand->id|min:2|max:50", // TO not give a false error
            'address' => 'required|string|min:5|max:100',
            'phone' => 'required|string|min:7|max:15',
            'country' => 'required|string|min:2|max:20'
        ];

        $messages = [
            'name.unique' => 'Brand name should be unique'
        ];

        $request->validate($rules, $messages);

        
        $brand->name = $request->name;
        $brand->address = $request->address;
        $brand->phone = $request->phone;
        $brand->country = $request->country;
        $brand->save();

        return redirect()->route('brands.index')->with('status', 'Brand updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('status', 'Brand deleted successfully.');
    }
}
