<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teashop;

class TeashopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teashops = Teashop::paginate(10);
        return view('user.teashops.index')->with('teashops', $teashops);
    }

    public function show(string $id)
    {
        $teashop = Teashop::findOrFail($id);

        return view('user.teashops.show')->with('teashop', $teashop);
    }
}
