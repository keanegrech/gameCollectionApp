<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ScreenshotController;

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
})->name('root.index');

//
/* -- Machine Routes -- */
//

// View routes
Route::get('/machines', [MachineController::class, 'index'])->name('machines.index');
Route::get('/machines/create', [MachineController::class, 'create'])->name('machines.create');
Route::get('/machines/{id}', [MachineController::class, 'show'])->name('machines.show');
Route::get('/machines/{id}/edit', [MachineController::class, 'edit'])->name('machines.edit');

// State changing routes
Route::post('/machines', [MachineController::class, 'store'])->name('machines.store');
Route::put('/machines/{id}', [MachineController::class, 'update'])->name('machines.update');
Route::delete('/machines/{id}', [MachineController::class, 'destroy'])->name('machines.destroy');

//
/* -- Game routes -- */
//

// View routes
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');

// State changing routes
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::put('/games/{id}', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');

/* -- Screenshot routes -- */

// State changing routes
Route::post('/screenshots/{id}', [ScreenshotController::class, 'store'])->name('screenshots.store');