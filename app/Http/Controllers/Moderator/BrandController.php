<?php

namespace App\Http\Controllers\Moderator;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()->hasRole('moderator'))
        {
            return to_route('user.books.index');
        }
        $brands = Brand::orderBy('created_at', 'desc')->paginate(8);

        return view('moderator.brands.index', [
            'brands' => $brands 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('moderator.brands.show', [
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('moderator.brands.edit', [
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

        return redirect()->route('moderator.brands.index')->with('status', 'Brand updated!');
    }

}
