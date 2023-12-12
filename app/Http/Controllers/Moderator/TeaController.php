<?php

namespace App\Http\Controllers\Moderator;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // uses storage

use App\Models\Tea;
use App\Models\Brand;
use App\Models\Favourite;

use Auth;

class TeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()->hasRole('moderator'))
        {
            return to_route('user.teas.index');
        }
        $teas = Tea::orderBy('created_at', 'desc')->paginate(8);

        return view('moderator.teas.index', [
            'teas' => $teas 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tea = Tea::findOrFail($id);
        return view('moderator.teas.show', [
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
        return view('moderator.teas.edit', [
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
            'description' => 'required|string|min:5|max:200',
            'image' => 'file|image'
        ];

        $messages = [
            'name.unique' => 'Tea name should be unique'
        ];

        $request->validate($rules, $messages);

        $tea->name = $request->name;
        $tea->brand_id = $request->brand_id;
        $tea->price = $request->price;
        $tea->description = $request->description;

        if ($request->hasFile('image')) { // Update the image!
            // Upload new image
            $newImage = $request->file('image');
            $filename = date('Y-m-d-His') . '_' . $request->name . '.' . $newImage->getClientOriginalExtension();
            $newImage->storeAs('public/images/', $filename);
          
            if ($tea->image) { // Delete old image
                Storage::delete('public/images/' . $tea->image);
            }

            $tea->image = $filename;
        }

        $tea->save();

        return redirect()->route('moderator.teas.index')->with('status', 'Tea updated!');
    }


    public function favourite(Request $request) // add to favourites
    {
        $tea_id = $request->input('tea_id');

        $user = auth()->user();
    
        if (!$user->favourites()->where('tea_id', $tea_id)->exists()) { // Check if the tea is already in favorites
        $user->favourites()->attach($tea_id);
            return redirect()->back()->with('status', 'Tea added to favorites!');
        } else {
            return redirect()->back()->with('status', 'Tea is already in favorites.');
        }
    }

    public function removeFavorite(Request $request) // remove from favourites
    {
        $tea_id = $request->input('tea_id');

        $user = auth()->user();
        $favorite = $user->favourites()->find($tea_id);

        if ($favorite) { // if statement checking if exists and can be favourited
            $user->favourites()->detach($favorite);
            return redirect()->back()->with('status', 'Tea removed from favorites!');
        } else {
            return redirect()->back()->with('status', 'Error removing tea from favorites.');
        }
    }
}
