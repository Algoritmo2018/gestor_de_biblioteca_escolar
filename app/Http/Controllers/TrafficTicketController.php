<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowed_book;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Traffic_ticket;

class TrafficTicketController extends Controller
{
    public function store(string $id, Traffic_ticket $traffic_ticket, Request $request){

            $traffic_ticket = $traffic_ticket->create([
                'borrowed_book_id' => $id,
                'student_id' => $request->input('student_id'),
                'debt' => 10000,
                'state'  => 'on',
            ]);

            session()->flash('sucess', 'Multa gerada com sucesso');
            return redirect()->route('all.loan.book');
            }


    public function all(Borrowed_book $borrowed_book, Student $student, Book $book, Traffic_ticket $traffic_ticket, Request $request){
 //Si não existir valor a ser pesquisado traz todos as salas cadastradas
 $valor = $request->input('student_id');
 if (!empty($valor)) {

     $student = $student->where('name', 'like', "%{$valor}%")->orderBy('name', 'asc')->first();
     $traffic_ticket = $student->traffic_ticket;
     session()->flash('sucess', 'Resultado da pesquisa:');
 } else {
        $traffic_ticket = $traffic_ticket->orderBy('state', 'desc')->get();
 }
        $borrowed_book = $borrowed_book->orderBy('return_date', 'asc')->get();
        $student = $student->orderBy('name', 'asc')->get();
        $book = $book->orderBy('title', 'asc')->get();

        return view('book/all_traffic_ticket', compact('borrowed_book', 'student', 'book', 'traffic_ticket'));
            }


public function buy(Traffic_ticket $traffic_ticket, string $id){

    if (!$traffic_ticket = $traffic_ticket->find($id)) {
        return back();
    }

    $traffic_ticket->state = "off";
$traffic_ticket->save();

session()->flash('sucess', 'Multa liquidada com sucesso');

    return redirect()->route('all.traffic_ticket');
}
}
