<?php

use App\Http\Controllers\BikesController;
use App\Http\Controllers\RentsController;
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
    return view('welcome');
});

Route::get('/profile', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




Route::prefix('bikes')->group(function () {
    Route::get('/', [BikesController::class, 'index'])->name('blog.index');
    Route::get('/booking_confirmation', [RentsController::class, 'index'])->name('blog.booking');
    Route::get('/returning_confirmation', [RentsController::class, 'return'])->name('blog.return');
    Route::get('/{id}', [BikesController::class, 'show'])->name('blog.show');
    Route::post('/{id}', [RentsController::class, 'store'])->name('blog.store');
    Route::delete('/{id}', [RentsController::class, 'destroy'])->name('blog.destroy');
});

