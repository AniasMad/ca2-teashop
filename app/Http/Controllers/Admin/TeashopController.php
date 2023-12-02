<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Teashop;
use App\Models\Tea;
use Auth;

class TeashopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.teashops.index');
        } 

        $teashops = Teashop::orderBy('created_at', 'desc')->paginate(8);

        return view('admin.teashops.index', [
            'teashops' => $teashops 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teashops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation rules
        $rules = [
            'name' => 'required|string|unique:teashops,name|min:2|max:30',
            'address' => 'required|string|min:5|max:100',
            'phone' => 'required|string|min:7|max:15'
        ];

        $messages = [
            'name.unique' => 'Teashop name should be unique'
        ];

        $request->validate($rules, $messages);

        $teashop = new Teashop;
        $teashop->name = $request->name;
        $teashop->address = $request->address;
        $teashop->phone = $request->phone;
        $teashop->save();

        return redirect()->route('admin.teashops.index')->with('status', 'Created a new Teashop!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.teashops.show');
        } 
        $teashop = Teashop::findOrFail($id);
        return view('admin.teashops.show', [
            'teashop' => $teashop
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.teashops.index');
        } 
        $teashop = Teashop::findOrFail($id);
        $teas = Tea::all();

        return view('admin.teashops.edit', [
            'teashop' => $teashop,
            'teas' => $teas 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teashop = Teashop::findOrFail($id);

        // dd($request);

        $rules = [
            'name' => "required|string|unique:teashops,name,$teashop->id|min:2|max:30",
            'address' => 'required|string|min:5|max:100',
            'phone' => 'required|string|min:7|max:15'
        ];

        $messages = [
            'name.unique' => 'Teashop name should be unique'
        ];

        $request->validate($rules, $messages);

        
        $teashop->name = $request->name;
        $teashop->address = $request->address;
        $teashop->phone = $request->phone;
        $teashop->save();

        $teashop->teas()->sync($request->teas);

        return redirect()->route('admin.teashops.index')->with('status', 'Teashop updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teashop = Teashop::findOrFail($id);
        $teashop->delete();

        return redirect()->route('admin.teashops.index')->with('status', 'Teashop deleted successfully.');
    }
}
