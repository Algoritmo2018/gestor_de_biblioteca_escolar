<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowed_book;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowedBookController extends Controller
{

    public function create(string $book_id, Course $course, Student $student){

        $student = $student->orderBy('name', 'asc')->get();

        return view('book/create_loan', compact('student','book_id'));
    }

    public function store(Request $request, Borrowed_book $borrowed_book){
//Traz os dados do usuario logado
        $user = Auth::user();

    $borrowed_book = Borrowed_book::create([
        'student_id' => $request->student_id,
        'user_id' => $user->id,
        'book_id'  => $request->book_id,
        'date_borrowed'  => $request->date_borrowed,
        'return_date'  => $request->return_date,
        'observation'  => $request->observation,
    ]);

    session()->flash('sucess', 'Emprestimo efetuado com sucesso');
    return redirect()->route('show.home');
    }

    public function all(Borrowed_book $borrowed_book, Student $student, Book $book, User $user){
        $borrowed_book = $borrowed_book->orderBy('return_date', 'asc')->get();
        $student = $student->orderBy('name', 'asc')->get();
        $book = $book->orderBy('title', 'asc')->get();
        $user = $user->orderBy('name', 'asc')->get();

        return view('book/all_books_borrowed', compact('borrowed_book', 'student', 'book', 'user'));
            }

            public function destroy(Borrowed_book $borrowed_book, string|int $id)
            {
                if (!$borrowed_book = $borrowed_book->find($id)) {
                    return back();
                }
                $borrowed_book->delete();

                session()->flash('sucess', 'Registro de livro emprestado deletado com sucesso');
                return redirect()->route('all.borrowed_book');
            }

         

}
