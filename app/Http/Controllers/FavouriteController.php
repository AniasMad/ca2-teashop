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

        if($user->hasRole('admin')){
            $teas = $user->favourites()->get();
            return view('admin.favourite.index', [
            'teas' => $teas
        ]);
        }
        else if($user->hasRole('moderator')) {
            $teas = $user->favourites()->get();
            return view('moderator.favourite.index', [
            'teas' => $teas
        ]);
        }
        else
        {
            $teas = $user->favourites()->get();
            return view('user.favourite.index', [
            'teas' => $teas
        ]);
        }
    }
}
