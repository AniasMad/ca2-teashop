<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tea;
use App\Models\Favourite;

class FavouriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $teas = $user->favourites()->get();

        return view('favourite.index', [
            'teas' => $teas
        ]);
    }
    public function destroy(string $id)
    {
        $favourite = Favourite::findOrFail($id);
        $favourite->delete();

        return redirect()->route('favourite.index')->with('status', 'Favourite deleted successfully.');
    }
}
