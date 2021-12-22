<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Main route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect('/home');
});

// Login/Out routes
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);


// Auth protected routes
Route::middleware('auth')->group(function () {

    // Products routes
    Route::get('products', [\App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');

    // Tags routes
    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', [\App\Http\Controllers\TagsController::class, 'index'])->name('tags.index');
        Route::get('search', [\App\Http\Controllers\TagsController::class, 'search'])->name('tags.search');
        Route::get('edit/{tag?}', [\App\Http\Controllers\TagsController::class, 'form'])->name('tags.form');
        Route::post('store/{tag?}', [\App\Http\Controllers\TagsController::class, 'store'])->name('tags.store');
        Route::delete('destroy/{tag}', [\App\Http\Controllers\TagsController::class, 'destroy'])->name('tags.destroy');
    });

    // Reports routes
    Route::get('reports/relevance', [\App\Http\Controllers\ReportsController::class, 'relevance'])->name('reports.relevance');

    // Users and Profile Routes
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
