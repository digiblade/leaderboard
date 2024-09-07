<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{user}/points', [UserController::class, 'updatePoints']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/users/grouped-by-score', [UserController::class, 'groupByScore']);
Route::post('/users/grouped-by-score', [UserController::class, 'getUsersGroupedByScore']);
