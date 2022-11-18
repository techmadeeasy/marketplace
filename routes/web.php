<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\ListingController::class, 'index'])->name('index');
Route::get('/category/{category:slug}', [\App\Http\Controllers\ListingController::class, 'showByCategory'])->name('listing-by-category');
Route::get('/listing/{category_slug}/{listing:slug}', [\App\Http\Controllers\ListingController::class, 'show'])->name('view-listing');


Route::middleware('auth')->group(function () {
    Route::resource('/dashboard/listings', \App\Http\Controllers\UserListingController::class, ['as' => 'dashboard'])->middleware(['verified']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
