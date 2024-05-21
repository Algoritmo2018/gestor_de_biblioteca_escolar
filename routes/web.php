<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublishingCompanyController;
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

Route::get('/', function () {
    return view('index');
});



Route::get('/index', [HomeController::class, 'index'])->name('show.home');
Route::get('/show/book/{id}', [BookController::class, 'show'])->name('show.book');

Route::get('/create/category', [CategoryController::class, 'create'])->name('create.category');
Route::post('/store/category', [CategoryController::class, 'store'])->name('store.category');


Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('edit.category');


Route::put('/{id}/update/category/', [CategoryController::class, 'update'])->name('update.category');

Route::delete('/{id}/destroy/category/', [CategoryController::class, 'destroy'])->name('destroy.category');

Route::get('/all/category', [CategoryController::class, 'all'])->name('all.category');

Route::get('/admin', [AdminController::class, 'index'])->name('show.admin');


Route::get('/create/author', [AuthorController::class, 'create'])->name('create.author');
Route::post('/store/author', [AuthorController::class, 'store'])->name('store.author');


Route::get('/edit/author/{id}', [AuthorController::class, 'edit'])->name('edit.author');


Route::put('/{id}/update/author/', [AuthorController::class, 'update'])->name('update.author');

Route::delete('/{id}/destroy/author/', [AuthorController::class, 'destroy'])->name('destroy.author');

Route::get('/all/author', [AuthorController::class, 'all'])->name('all.author');


Route::get('/create/book', [BookController::class, 'create'])->name('create.book');
Route::post('/store/book', [BookController::class, 'store'])->name('store.book');


Route::get('/edit/book/{id}', [BookController::class, 'edit'])->name('edit.book');


Route::put('/{id}/update/book/', [BookController::class, 'update'])->name('update.book');

Route::delete('/{id}/destroy/book/', [BookController::class, 'destroy'])->name('destroy.book');

Route::get('/all/book', [BookController::class, 'all'])->name('all.book');



Route::get('/create/publishing_company', [PublishingCompanyController::class, 'create'])->name('create.publishing_company');
Route::post('/store/publishing_company', [PublishingCompanyController::class, 'store'])->name('store.publishing_company');


Route::get('/edit/publishing_company/{id}', [PublishingCompanyController::class, 'edit'])->name('edit.publishing_company');


Route::put('/{id}/update/publishing_company/', [PublishingCompanyController::class, 'update'])->name('update.publishing_company');

Route::delete('/{id}/destroy/publishing_company/', [PublishingCompanyController::class, 'destroy'])->name('destroy.publishing_company');

Route::get('/all/publishing_company', [PublishingCompanyController::class, 'all'])->name('all.publishing_company');
