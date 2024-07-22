<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowed_book;
use App\Models\borrowed_book_rating;
use Illuminate\Http\Request;

class BorrowedBookRatingController extends Controller
{
    public function statistic(Borrowed_book $borrowed_book, Book $book,)
    {
        //Traz o total de emprestimos de cada livro com os seus respectivos dados
        $book = $book->withCount('Borrowed_book')->orderBy('borrowed_book_count', 'desc')->get();
        $borrowed_book = $borrowed_book->orderBy('return_date', 'asc')->get();

        return view('book/statistic', compact('book', 'borrowed_book'));
    }

public function graphic( Book $book,)
    {
        //Traz o total de emprestimos de cada livro com os seus respectivos dados
        $book = $book->withCount('Borrowed_book')->orderBy('borrowed_book_count', 'desc')->get();

        foreach ($book as $book1) {
            $title[] = $book1->title;
            $borrowed_book_count[] = $book1->borrowed_book_count;
        }

        return view('book/statistic_borrowed_books_graphic', compact('book',  'title', 'borrowed_book_count'));
    }
    public function graphic2(Borrowed_book $borrowed_book)
    {

        $borrowed_book = $borrowed_book->orderBy('return_date', 'asc')->get();

        return view('book/number_books_mouth_graphic', compact('borrowed_book'));
    }
}
