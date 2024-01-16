<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\LineupController;

Route::get('/', [ScheduleController::class, 'index']);

Route::get('/player', [PlayerController::class, 'index'])->name('players.list');
Route::match(['get', 'post'], '/player/add', [PlayerController::class, 'add'])->name('players.add');
Route::match(['get', 'post'], '/player/edit/{id}', [PlayerController::class, 'edit'])->name('players.edit');

Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedules.list');
Route::match(['get', 'post'], '/schedule/add', [ScheduleController::class, 'add'])->name('schedules.add');
Route::match(['get', 'post'], '/schedule/edit/{id}', [ScheduleController::class, 'edit'])->name('schedules.edit');
Route::match(['get', 'post'], '/schedule/confirmed', [ScheduleController::class, 'confirmed'])->name('schedules.confirmed');

Route::get('/lineup', [LineupController::class, 'index'])->name('lineups.list');
