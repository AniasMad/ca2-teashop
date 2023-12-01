<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeashopController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TeaController;
use App\Http\Controllers\MainmenuController;
use App\Http\Controllers\FavouriteController;
use App\Models\Teashop;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::post('/add-to-favourites', [TeaController::class, 'favourite'])->name('addToFavourites'); //add to favourites


Route::get('/', function () {
    return view('welcome');
});


Route::get('/mainmenu', function () {
    return view('mainmenu.index');
})->middleware(['auth', 'verified'])->name('mainmenu.index');

Route::middleware('auth')->group(function () { // Not able to access withour authentication
    Route::resource('teashops', TeashopController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('teas', TeaController::class);
    Route::resource('mainmenu', MainmenuController::class);
    Route::resource('favourite', FavouriteController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
