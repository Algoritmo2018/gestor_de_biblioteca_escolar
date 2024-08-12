<?php

use App\Http\Controllers\Api\Auth\AuthApiController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\Book_returnController;
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


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::group(['middleware' => 'library_user_api'], function () {
        //Routes Book_returns
        Route::apiResource('/Book_returns', Book_returnController::class);
        //Routes Traffic_tickets
        Route::apiResource('/Traffic_tickets', Traffic_ticketController::class);
        //Routes borrowed_books
        Route::apiResource('/borrowed_books', Borrowed_bookController::class);
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
        Route::delete('/v1/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::post('/logout', [AuthApiController::class, 'logout'])->name('auth.logout');
    Route::put('/v1/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('/me', [AuthApiController::class, 'me'])->name('auth.me');
    Route::post('/v1/users', [UserController::class, 'store'])->name('users.store')->middleware('super_user_api');
});

Route::post('/auth', [AuthApiController::class, 'auth'])->name('auth.login');

Route::get('/v1', fn() => response()->json(['message' => 'ok']));
