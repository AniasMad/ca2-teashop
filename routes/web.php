<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TeashopController; -- old teashop route

use App\Http\Controllers\Admin\TeashopController as AdminTeashopController; // admin view
use App\Http\Controllers\User\TeashopController as UserTeashopController; // user view

use App\Http\Controllers\Admin\BrandController as AdminBrandController; // admin view
use App\Http\Controllers\User\BrandController as UserBrandController; // user view

use App\Http\Controllers\Admin\TeaController as AdminTeaController; // admin view
use App\Http\Controllers\User\TeaController as UserTeaController; // user view

use App\Http\Controllers\MainmenuController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/mainmenu', function () {
    return view('mainmenu.index');
})->middleware(['auth', 'verified'])->name('mainmenu.index');

Route::middleware('auth')->group(function () { // Not able to access withour authentication
    // Route::resource('teashops', TeashopController::class);
    // Route::resource('brands', BrandController::class);
    // Route::resource('teas', TeaController::class);

    Route::resource('mainmenu', MainmenuController::class); // home page to redirect to

    // teashops for users/admins

    Route::resource('/teashops', UserTeashopController::class)->middleware(['auth', 'role:user,admin'])->names('user.teashops')->only(['index', 'show']);
    Route::resource('/admin/teashops', AdminTeashopController::class)->middleware(['auth', 'role:admin'])->names('admin.teashops');
    
    // brands for users/admins

    Route::resource('/brands', UserBrandController::class)->middleware(['auth', 'role:user,admin'])->names('user.brands')->only(['index', 'show']);
    Route::resource('/admin/brands', AdminBrandController::class)->middleware(['auth', 'role:admin'])->names('admin.brands');

    // teas for users/admins

    Route::resource('/teas', UserTeaController::class)->middleware(['auth', 'role:user,admin'])->names('user.teas')->only(['index', 'show']);
    Route::resource('/admin/teas', AdminTeaController::class)->middleware(['auth', 'role:admin'])->names('admin.teas');

    // favourites

    Route::resource('favourites', FavouriteController::class);
    Route::post('/add-to-favourites', [TeaController::class, 'favourite'])->name('addToFavourites');
    Route::delete('/favourites/{id}', [FavouriteController::class, 'destroy'])->name('favourite.destroy');
    Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourite.index');

    // standard profile code

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    

require __DIR__.'/auth.php';
