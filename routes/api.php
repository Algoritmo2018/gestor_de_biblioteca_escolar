<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\PublishingCompanyController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

//Routes PublishingCompany
Route::apiResource('/PublishingCompanies', PublishingCompanyController::class);
//Routes courses
Route::apiResource('/courses', CourseController::class);

//Routes categorie
Route::apiResource('/categories', CategoryController::class);

//Routes author
Route::apiResource('/authors', AuthorController::class);

// Routes user
Route::get('/v1/users', [UserController::class, 'index'])->name('users.index');
Route::get('/v1/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::put('/v1/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/v1/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::post('/v1/users', [UserController::class, 'store'])->name('users.store');

Route::get('/v1', fn () => response()->json(['message' => 'ok']));
