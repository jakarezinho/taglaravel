<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\HabitarController;

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
    return view('front.home');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/map', function () {
        return view('front.locais');
    })->name('map');
});

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/map', function () {
    return view('front.locais');
})->name('map');
*/
Route::get('locais', [HabitarController::class, 'index'])->name('locais');
Route::post('addlocal', [HabitarController::class, 'store'])->name('addlocal');
Route::post('destroy/{habitar}', [HabitarController::class, 'destroy'])->name('destroy');

Route::get('avolta/{lat}/{lng}/{distance}', [HabitarController::class, 'avolta'])->name('avolta');
///dislikes
Route::get('dislikes/', [HabitarController::class, 'tagsdislikes'])->name('dislikes');

////vote
Route::post('like', [VoteController::class, 'store'])->name('like');
