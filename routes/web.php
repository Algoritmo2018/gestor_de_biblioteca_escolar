<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookReturnController;
use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\BorrowedBookRatingController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LibraryInformationController;
use App\Http\Controllers\PublishingCompanyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrafficTicketController;
use App\Http\Controllers\UserinformationController;
use App\Models\Book_return;
use App\Models\borrowed_book_rating;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

//Pagina admin
Route::get('/admin', [AdminController::class, 'index'])->name('show.admin');

//Pagina inicial
Route::get('/', [HomeController::class, 'index'])->name('show.home');

    Route::group(['middleware' => 'library_user'], function () {

//Rotas do leitor
Route::get('/create/reader', [ReaderController::class, 'create'])->name('create.reader');
Route::post('/store/reader', [ReaderController::class, 'store'])->name('store.reader');


Route::get('/edit/reader/{id}', [ReaderController::class, 'edit'])->name('edit.reader');


Route::put('/{id}/update/reader/', [ReaderController::class, 'update'])->name('update.reader');

Route::delete('/{id}/destroy/reader/', [ReaderController::class, 'destroy'])->name('destroy.reader');

Route::get('/all/reader', [ReaderController::class, 'all'])->name('all.reader');

// Routes of borrowed_book_rating

Route::get('/borrowed_book_rating', [BorrowedBookRatingController::class, 'statistic'])->name('statistic');
Route::get('/borrowed_book_rating/graphic', [BorrowedBookRatingController::class, 'graphic'])->name('graphic');
Route::get('/borrowed_book_rating/graphic2', [BorrowedBookRatingController::class, 'graphic2'])->name('graphic2');
// Routes of book_returns

Route::post('/{id}/store/book_return', [BookReturnController::class, 'store'])->name('store.book_return');


Route::get('/all/book_return', [BookReturnController::class, 'all'])->name('all.book_return');
//Routes of traffic ticket

Route::post('/{id}/store/traffic_ticket', [TrafficTicketController::class, 'store'])->name('store.traffic_ticket');

Route::put('/{id}/buy/traffic_ticket', [TrafficTicketController::class, 'buy'])->name('buy.traffic_ticket');

Route::get('/all/traffic_ticket', [TrafficTicketController::class, 'all'])->name('all.traffic_ticket');

//Routes of borrowed books

Route::get('/{id}/create/loan/book/student', [BorrowedBookController::class, 'create'])->name('create.loan.book');

Route::post('/store/loan/book/student/', [BorrowedBookController::class, 'store'])->name('store.loan.book');

Route::get('/all/loan/book/student/', [BorrowedBookController::class, 'all'])->name('all.loan.book');

Route::delete('/{id}/destroy/loan/book/student/', [LibraryInformationController::class, 'destroy'])->name('destroy.loan.book');

//Routes of library

Route::get('/create/library_information', [LibraryInformationController::class, 'create'])->name('create.library_information');
Route::post('/store/library_information', [LibraryInformationController::class, 'store'])->name('store.library_information');

Route::put('/{id}/update/library_information/', [LibraryInformationController::class, 'update'])->name('update.library_information');

Route::delete('/{id}/destroy/library_information/', [LibraryInformationController::class, 'destroy'])->name('destroy.library_information');

Route::get('/show/library_information', [LibraryInformationController::class, 'show'])->name('show.library_information');
Route::get('/edit/library_information', [LibraryInformationController::class, 'edit'])->name('edit.library_information');

//Rotas da categoria
Route::get('/create/category', [CategoryController::class, 'create'])->name('create.category');
Route::post('/store/category', [CategoryController::class, 'store'])->name('store.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('edit.category');


Route::put('/{id}/update/category/', [CategoryController::class, 'update'])->name('update.category');

Route::delete('/{id}/destroy/category/', [CategoryController::class, 'destroy'])->name('destroy.category');

Route::get('/all/category', [CategoryController::class, 'all'])->name('all.category');

// Rotas do course
Route::get('/create/course', [CourseController::class, 'create'])->name('create.course');
Route::post('/store/course', [CourseController::class, 'store'])->name('store.course');

Route::get('/edit/course/{id}', [CourseController::class, 'edit'])->name('edit.course');
Route::put('/{id}/update/course/', [CourseController::class, 'update'])->name('update.course');
Route::delete('/{id}/destroy/course/', [CourseController::class, 'destroy'])->name('destroy.course');
Route::get('/all/course', [CourseController::class, 'all'])->name('all.course');


// Rotas do student
Route::get('/create/student', [StudentController::class, 'create'])->name('create.student');
Route::post('/store/student', [StudentController::class, 'store'])->name('store.student');

Route::get('/edit/student/{id}', [StudentController::class, 'edit'])->name('edit.student');

Route::put('/{id}/update/student/', [StudentController::class, 'update'])->name('update.student');

Route::delete('/{id}/destroy/student/', [StudentController::class, 'destroy'])->name('destroy.student');

Route::get('/all/student', [StudentController::class, 'all'])->name('all.student');

//Rotas actores livros
Route::get('/create/author', [AuthorController::class, 'create'])->name('create.author');
Route::post('/store/author', [AuthorController::class, 'store'])->name('store.author');
Route::get('/edit/author/{id}', [AuthorController::class, 'edit'])->name('edit.author');

Route::put('/{id}/update/author/', [AuthorController::class, 'update'])->name('update.author');

Route::delete('/{id}/destroy/author/', [AuthorController::class, 'destroy'])->name('destroy.author');

Route::get('/all/author', [AuthorController::class, 'all'])->name('all.author');

Route::get('/search/author', [AuthorController::class, 'all'])->name('search.author');

//Rotas dos livros
Route::get('/create/book', [BookController::class, 'create'])->name('create.book');
Route::post('/store/book', [BookController::class, 'store'])->name('store.book');
Route::get('/edit/book/{id}', [BookController::class, 'edit'])->name('edit.book');
Route::get('/show/book/{id}', [BookController::class, 'show'])->name('show.book');
Route::put('/{id}/update/book/', [BookController::class, 'update'])->name('update.book');
Route::delete('/{id}/destroy/book/', [BookController::class, 'destroy'])->name('destroy.book');
Route::get('/all/book', [BookController::class, 'all'])->name('all.book');


//Rotas da editora
Route::get('/create/publishing_company', [PublishingCompanyController::class, 'create'])->name('create.publishing_company');
Route::post('/store/publishing_company', [PublishingCompanyController::class, 'store'])->name('store.publishing_company');

Route::get('/edit/publishing_company/{id}', [PublishingCompanyController::class, 'edit'])->name('edit.publishing_company');


Route::put('/{id}/update/publishing_company/', [PublishingCompanyController::class, 'update'])->name('update.publishing_company');

Route::delete('/{id}/destroy/publishing_company/', [PublishingCompanyController::class, 'destroy'])->name('destroy.publishing_company');

Route::get('/all/publishing_company', [PublishingCompanyController::class, 'all'])->name('all.publishing_company');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
});
require __DIR__.'/auth.php';
