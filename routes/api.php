<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/v1/users', [UserController::class, 'index'])->name('users.index');
Route::get('/v1/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::put('/v1/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::post('/v1/users', [UserController::class, 'store'])->name('users.store');

Route::get('/v1', fn () => response()->json(['message' => 'ok']));
