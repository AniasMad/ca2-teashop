<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tea;


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
}
