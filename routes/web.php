<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublishingCompanyController;
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




Route::get('/index', [HomeController::class, 'index'])->name('show.home');

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

Route::get('/show/book/{id}', [BookController::class, 'show'])->name('show.book');

Route::put('/{id}/update/book/', [BookController::class, 'update'])->name('update.book');

Route::delete('/{id}/destroy/book/', [BookController::class, 'destroy'])->name('destroy.book');

Route::get('/all/book', [BookController::class, 'all'])->name('all.book');



Route::get('/create/publishing_company', [PublishingCompanyController::class, 'create'])->name('create.publishing_company');
Route::post('/store/publishing_company', [PublishingCompanyController::class, 'store'])->name('store.publishing_company');


Route::get('/edit/publishing_company/{id}', [PublishingCompanyController::class, 'edit'])->name('edit.publishing_company');


Route::put('/{id}/update/publishing_company/', [PublishingCompanyController::class, 'update'])->name('update.publishing_company');

Route::delete('/{id}/destroy/publishing_company/', [PublishingCompanyController::class, 'destroy'])->name('destroy.publishing_company');

Route::get('/all/publishing_company', [PublishingCompanyController::class, 'all'])->name('all.publishing_company');



Route::get('/create/reader', [ReaderController::class, 'create'])->name('create.reader');
Route::post('/store/reader', [ReaderController::class, 'store'])->name('store.reader');


Route::get('/edit/reader/{id}', [ReaderController::class, 'edit'])->name('edit.reader');


Route::put('/{id}/update/reader/', [ReaderController::class, 'update'])->name('update.reader');

Route::delete('/{id}/destroy/reader/', [ReaderController::class, 'destroy'])->name('destroy.reader');

Route::get('/all/reader', [ReaderController::class, 'all'])->name('all.reader');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
