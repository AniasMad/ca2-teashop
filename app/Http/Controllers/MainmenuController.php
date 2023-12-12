<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teashop; 
use App\Models\Tea; 
use Auth;

class MainmenuController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if($user->hasRole('admin')){
            $teashops = Teashop::all();
            return view('admin.mainmenu.index', [
            'teashops' => $teashops,
        ]);
        }
        else if($user->hasRole('moderator')) {
            $teashops = Teashop::all();
            return view('moderator.mainmenu.index', [
            'teashops' => $teashops,
        ]);}
        else if($user->hasRole('user'))
        {
            $teashops = Teashop::all();
            return view('user.mainmenu.index', [
            'teashops' => $teashops,
        ]);
        }
        
    }

    public function show(string $id)
    {
        $user = Auth::user();
        $teashop = Teashop::findOrFail($id);

        if($user->hasRole('admin')){
            return view('admin.mainmenu.show', [
                'teashop' => $teashop
            ]);
        }
        else if($user->hasRole('moderator')){
            return view('moderator.mainmenu.show', [
                'teashop' => $teashop
            ]);
        }
        else {
            return view('user.mainmenu.show', [
                'teashop' => $teashop
            ]);
        }
    }
}
