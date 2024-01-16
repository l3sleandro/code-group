<?php

use Illuminate\Support\Facades\Route;

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



use App\Http\Controllers\PlayerController;

Route::get('/', function () { return view('welcome'); });

Route::get('/player', [PlayerController::class, 'index'])->name('players.list');
Route::match(['get', 'post'], '/player/add', [PlayerController::class, 'add'])->name('players.add');
Route::match(['get', 'post'], '/player/edit/{id}', [PlayerController::class, 'edit'])->name('players.edit');


