<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MachineController;

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

Route::get('/machines', [MachineController::class, 'index'])->name('machines.index');
Route::get('/machines/create', [MachineController::class, 'create'])->name('machines.create');
Route::get('/machines/{id}', [MachineController::class, 'show'])->name('machines.show');
Route::post('/machines', [MachineController::class, 'store'])->name('machines.store');
Route::get('/machines/{id}/edit', [MachineController::class, 'edit'])->name('machines.edit');
Route::put('/machines/{id}', [MachineController::class, 'update'])->name('machines.update');
