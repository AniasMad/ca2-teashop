<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teashop; 
use App\Models\Tea; 

class MainmenuController extends Controller
{
    public function index()
    {
        $teashops = Teashop::all();
        return view('mainmenu.index', [
            'teashops' => $teashops,
        ]);
    }

    public function show(string $id)
    {
        $teashop = Teashop::findOrFail($id);
        return view('mainmenu.show', [
            'teashop' => $teashop
        ]);
    }
}
