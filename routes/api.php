<?php

use App\Http\Controllers\Api\Auth\AuthApiController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\Borrowed_bookController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\PublishingCompanyController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\Traffic_ticketController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

//Routes Traffic_tickets
Route::apiResource('/Traffic_tickets', Traffic_ticketController::class)->middleware('auth:sanctum');
//Routes borrowed_books
Route::apiResource('/borrowed_books', Borrowed_bookController::class)->middleware('auth:sanctum');
//Routes Students
Route::apiResource('/students', StudentController::class);
//Routes Books
Route::apiResource('/books', BookController::class);
//Routes PublishingCompany
Route::apiResource('/PublishingCompanies', PublishingCompanyController::class);
//Routes courses
Route::apiResource('/courses', CourseController::class);

//Routes categories
Route::apiResource('/categories', CategoryController::class);

//Routes author
Route::apiResource('/authors', AuthorController::class);

// Routes user
Route::get('/v1/users', [UserController::class, 'index'])->name('users.index');
Route::get('/v1/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::put('/v1/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/v1/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::post('/v1/users', [UserController::class, 'store'])->name('users.store');


Route::post('/auth', [AuthApiController::class, 'auth'])->name('auth.login');

Route::post('/me', [AuthApiController::class, 'me'])->name('auth.me')->middleware('auth:sanctum');
Route::post('/logout', [AuthApiController::class, 'logout'])->name('auth.logout')->middleware('auth:sanctum');
Route::get('/v1', fn () => response()->json(['message' => 'ok']));
