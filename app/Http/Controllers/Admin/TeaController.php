<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Tea;
use App\Models\Brand;
use Auth;

class TeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.books.index');
        }
        $teas = Tea::orderBy('created_at', 'desc')->paginate(8);

        return view('teas.index', [
            'teas' => $teas 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation rules
        $rules = [
            'name' => 'required|string|unique:teas,name|min:2|max:30',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1|max:999', // Syntax to validate float variable
            'description' => 'required|string|min:5|max:200'
        ];

        $messages = [
            'name.unique' => 'Tea name should be unique'
        ];

        $request->validate($rules, $messages);

        $tea = new Tea;
        $tea->name = $request->name;
        $tea->brand_id = $request->brand_id;
        $tea->price = $request->price;
        $tea->description = $request->description;
        $tea->save();

        return redirect()->route('teas.index')->with('status', 'Created a new Tea!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tea = Tea::findOrFail($id);
        return view('teas.show', [
            'tea' => $tea
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tea = Tea::findOrFail($id);
        $brands = Brand::all();
        return view('teas.edit', [
            'tea' => $tea,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tea = Tea::findOrFail($id);
        $rules = [
            'name' => 'required|string|min:2|max:30|unique:teas,name,' . $tea->id,
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1|max:999',
            'description' => 'required|string|min:5|max:200'
        ];

        $messages = [
            'name.unique' => 'Tea name should be unique'
        ];

        $request->validate($rules, $messages);

        $tea->name = $request->name;
        $tea->brand_id = $request->brand_id;
        $tea->price = $request->price;
        $tea->description = $request->description;
        $tea->save();

        return redirect()->route('teas.index')->with('status', 'Tea updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tea = Tea::findOrFail($id);
        $tea->delete();

        return redirect()->route('teas.index')->with('status', 'Tea deleted successfully.');
    }

    public function favourite(Request $request)
    {
        $tea_id = $request->input('tea_id');

        auth()->user()->favourites()->attach($tea_id); //get user

        return redirect()->back()->with('status', 'Tea added to favourites!');
    }
}
