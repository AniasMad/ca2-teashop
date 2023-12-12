<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tea;
use App\Models\Favourite;


class TeaController extends Controller
{
    public function index()
    {
        $teas = Tea::paginate(10);
        return view('user.teas.index')->with('teas', $teas);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tea = Tea::findOrFail($id);

        return view('user.teas.show')->with('tea', $tea);
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
