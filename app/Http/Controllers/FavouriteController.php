<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
}
