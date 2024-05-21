<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\Book;
use App\Models\category;
use App\Models\Publishing_company;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create(category $category, author $author, Publishing_company $publishing_company)
    {

$author = $author->orderBy('author', 'asc')->get();
$category = $category->orderBy('category', 'asc')->get();
$publishing_company = $publishing_company->orderBy('publishing_company', 'asc')->get();

        return view('book/create', compact('category','author', 'publishing_company'));
    }

    public function store(Request $request){
        $imagePath = $request->file('image_path')->store('public/img/book_cap');

        $image = new Book([
            'title' => $request->get('title'),
            'author_id' => $request->get('author'),
            'category_id' => $request->get('category'),
            'publishing_company_id' => $request->get('publishing_company'),
            'content' => $request->get('content'),
            'image_path' => $request->file('image_path')->hashName(),
        ]);
        $image->save();
        session()->flash('sucess', 'Livro cadastrado com sucesso');
        return redirect()->route('create.book');
    }

    public function show(string|int $id, author $author, category $category, Publishing_company $publishing_company, Book $book){
 // Para trazer todos os livros do banco de dados com as suas categorias
 $book = $book->with('category');
  // Para trazer todos os livros do banco de dados com os seus autores
  $book = $book->with('author');
   // Para trazer todos os livros do banco de dados e as editoras
 $book = $book->with('publishing_company');
 //Livros por id
$book = $book->where('id',$id)->first();
return view('show_book', compact('book'));

    }
}
