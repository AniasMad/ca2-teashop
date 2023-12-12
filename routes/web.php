<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TeashopController; -- old teashop route

use App\Http\Controllers\Admin\TeashopController as AdminTeashopController; // admin view
use App\Http\Controllers\User\TeashopController as UserTeashopController; // user view
use App\Http\Controllers\Moderator\TeashopController as ModeratorTeashopController; // moderator view

use App\Http\Controllers\Admin\BrandController as AdminBrandController; // admin view
use App\Http\Controllers\User\BrandController as UserBrandController; // user view
use App\Http\Controllers\Moderator\BrandController as ModeratorBrandController; // moderator view


use App\Http\Controllers\Admin\TeaController as AdminTeaController; // admin view
use App\Http\Controllers\User\TeaController as UserTeaController; // user view
use App\Http\Controllers\Moderator\TeaController as ModeratorTeaController; // moderator view


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


    
Route::middleware('auth')->group(function () { // Not able to access withour authentication

    Route::resource('/admin/mainmenu', MainmenuController::class)->middleware(['auth', 'role:admin'])->names('admin.mainmenu'); 
    Route::resource('/mainmenu', MainmenuController::class)->middleware(['auth', 'role:user,admin,moderator'])->names('user.mainmenu');
    Route::resource('/moderator/mainmenu', MainmenuController::class)->middleware(['auth', 'role:moderator'])->names('moderator.mainmenu');
    
    // teashops for users/admins

    Route::resource('/teashops', UserTeashopController::class)->middleware(['auth', 'role:user,admin,moderator'])->names('user.teashops')->only(['index', 'show']);
    Route::resource('/admin/teashops', AdminTeashopController::class)->middleware(['auth', 'role:admin'])->names('admin.teashops');
    Route::resource('/moderator/teashops', ModeratorTeashopController::class)->middleware(['auth', 'role:moderator'])->names('moderator.teashops');
    
    // brands for users/admins

    Route::resource('/brands', UserBrandController::class)->middleware(['auth', 'role:user,admin,moderator'])->names('user.brands')->only(['index', 'show']);
    Route::resource('/admin/brands', AdminBrandController::class)->middleware(['auth', 'role:admin'])->names('admin.brands');
    Route::resource('/moderator/brands', ModeratorBrandController::class)->middleware(['auth', 'role:moderator'])->names('moderator.brands');

    // teas for users/admins

    Route::resource('/teas', UserTeaController::class)->middleware(['auth', 'role:user,admin,moderator'])->names('user.teas')->only(['index', 'show']);
    Route::resource('/admin/teas', AdminTeaController::class)->middleware(['auth', 'role:admin'])->names('admin.teas');
    Route::resource('/moderator/teas', ModeratorTeaController::class)->middleware(['auth', 'role:moderator'])->names('moderator.teas');

    // favourites

    Route::resource('/favourites', FavouriteController::class)->middleware(['auth', 'role:user,admin,moderator'])->names('user.favourite');
    Route::resource('/admin/favourites', FavouriteController::class)->middleware(['auth', 'role:admin'])->names('admin.favourite');
    Route::resource('/moderator/favourites', FavouriteController::class)->middleware(['auth', 'role:moderator'])->names('moderator.favourite');
    Route::post('/add-to-favourites', [UserTeaController::class, 'favourite'])->name('addToFavourites');
    Route::delete('/remove-from-favourites', [UserTeaController::class, 'removeFavorite'])->name('removeFromFavourites');
    Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourite.index');

    // standard profile code

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    

require __DIR__.'/auth.php';
