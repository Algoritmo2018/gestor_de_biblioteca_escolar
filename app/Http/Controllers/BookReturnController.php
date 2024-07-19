<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Student;
use App\Models\Book_return;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookReturnController extends Controller
{
    public function store(Request $request, Book_return $book_return, string $borrowed_book_id){
        //Traz os dados do usuario logado
                $user = Auth::user();
                $data_actual = date('Y-m-d H:i:s');
            $book_return = $book_return->create([ 'borrowed_book_id'  => $borrowed_book_id,
                'student_id' => $request->student_id,
                'user_id' => $user->id,
                'book_id'  => $request->book_id,
                'return_date'  => $data_actual,
                'observation'  => "Livro devolvido",
            ]);

            session()->flash('sucess', 'Livro devolvido com sucesso');
            return redirect()->route('all.loan.book');
            }


    public function all(Book_return $book_return, Student $student, Book $book, User $user){
        $book_return = $book_return->orderBy('return_date', 'asc')->get();
        $student = $student->orderBy('name', 'asc')->get();
        $book = $book->orderBy('title', 'asc')->get();
        $user = $user->orderBy('name', 'asc')->get();

        return view('book/all_book_return', compact('book_return', 'student', 'book', 'user'));
            }
}
