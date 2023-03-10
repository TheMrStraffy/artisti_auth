<?php

use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\ArtworkController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MuseumController;
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

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth','verified'])
        ->name('admin.')
        ->prefix('admin')
        ->group(function(){
            Route::get('/', [DashboardController::class, 'index'])->name('home');
            Route::resource('artist', ArtistController::class);
            Route::resource('museums', MuseumController::class);
            Route::resource('artwork', ArtworkController::class);
        });

require __DIR__.'/auth.php';
