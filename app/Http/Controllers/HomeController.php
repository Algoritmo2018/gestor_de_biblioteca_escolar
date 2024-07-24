<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Book $book, Request $request, category $category){
          //Armazena o titulo do livro
           $valor = $request->input('book_title');
           $category_id =  $request->input('category');
           if (!empty($valor)) {
            $book = $book->where('title', 'like', "%{$valor}%")->orderBy('title', 'asc')->simplepaginate(50);
               session()->flash('sucess', 'Resultado da pesquisa:');
           }
           elseif($category_id){

            $book = $book->where('category_id', 'like', "%{$category_id}%")->orderBy('title', 'asc')->simplepaginate(50);
               session()->flash('sucess', 'Resultado da pesquisa:');
           }
           else {
        $book = $book->simplepaginate(50);}

        $category = $category->orderBy('category', 'asc')->get();

        return view('index', compact('book', 'category'));
    }
}
