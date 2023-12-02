<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('user.brands.index')->with('brands', $brands);
    }

    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);

        return view('user.brands.show')->with('brand', $brand);
    }

}
