<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_return;
use App\Models\Borrowed_book;
use App\Models\Course;
use App\Models\Student;
use App\Models\Traffic_ticket;
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

    public function all(Borrowed_book $borrowed_book, Student $student, Book $book, User $user,Traffic_ticket $traffic_ticket, Book_return $book_return, Request $request){
//Titulo do livro
        $book_title = $request->input('book_title');
        //Nome do estudante
        $student_name = $request->input('student_name');
        //Pesquisa os livros emprestados por um estudante usando o nome dele e o nome do livro
        if (!empty($book_title) || !empty($student_name)) {

            $borrowed_book = $borrowed_book->query()
            ->with('book', 'student')  // Eager load book and student data
            ->whereHas('book', function ($query) use ($book_title) {
                $query->where('title', 'like', "%{$book_title}%");
            })
            ->whereHas('student', function ($query) use ($student_name) {
                $query->where('name', 'like', "%{$student_name}%");
            })
            ->orderBy('return_date', 'desc')
            ->get();
            session()->flash('sucess', 'Resultado da pesquisa:');
        } else {
            //Traz todos os livros emprestados que ainda estão cadastrados na tabela de multas
               $borrowed_book = $borrowed_book->query()
              ->with('traffic_ticket')  // Carregamento antecipado de modelos relacionados
               ->whereDoesntHave('traffic_ticket', function ($query) use ($book_title) {
                 $query->orderBy('borrowed_book_id', 'desc');
           })
            ->orderBy('return_date', 'asc')
              ->get();


        }
        $traffic_ticket = $traffic_ticket->get();
        $book_return = $book_return->get();

        $student = $student->orderBy('name', 'asc')->get();
        $book = $book->orderBy('title', 'asc')->get();
        $user = $user->orderBy('name', 'asc')->get();

        return view('book/all_books_borrowed', compact('borrowed_book', 'student', 'book', 'user','traffic_ticket','book_return'));
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
