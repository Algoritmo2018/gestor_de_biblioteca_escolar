<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\File;
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

    public function store(StoreUpdateBookRequest $request){
        $imagePath = $request->file('image_path')->store('public/img/book_cap');

        $image = new Book([
            'title' => $request->get('title'),
            'author_id' => $request->get('author'),
            'category_id' => $request->get('category'),
            'publishing_company_id' => $request->get('publishing_company'),
            'number_of_copies' => $request->get('number_of_copies'),
            'year_of_publication' => $request->get('year_of_publication'),
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
    public function edit(category $category, author $author, Publishing_company $publishing_company, string|int $id, Book $book)
    {
        if (!$book = $book->where('id', $id)->first()) {
            return back();
        }
        $author = $author->orderBy('author', 'asc')->get();
        $category = $category->orderBy('category', 'asc')->get();
        $publishing_company = $publishing_company->orderBy('publishing_company', 'asc')->get();

                return view('book/edit', compact('category','author', 'publishing_company', 'book'));
    }

    public function update(string|int $id, Request $request, Book $book)
    {
if (!$book = $book->find($id)) {
    return back();
}

$dados = $request->all();

if (!empty($dados['image_path_new'])) {
    //Apaga a imagem antiga
    File::delete('storage/img/book_cap/' . $dados['image_path']);

    //Faz o upload da imagem inserida na input file
    $imagePath = $request->file('image_path_new')->store('public/img/book_cap');

     //Faz o update do Livro com a nova imagem
     $book->title = $dados['title'];
     $book->author_id = $dados['author'];
     $book->category_id = $dados['category'];
     $book->publishing_company_id = $dados['publishing_company'];
     $book->number_of_copies = $dados['number_of_copies'];
     $book->year_of_publication = $dados['year_of_publication'];
     $book->image_path = $request->file('image_path_new')->hashName();
     $book->save();
} else {


     //Faz o update do Livro
     $book->title = $dados['title'];
     $book->author_id = $dados['author'];
     $book->category_id = $dados['category'];
     $book->publishing_company_id = $dados['publishing_company'];
     $book->number_of_copies = $dados['number_of_copies'];
     $book->year_of_publication = $dados['year_of_publication'];
     $book->save();
}


 session()->flash('sucess', 'Livro editado com sucesso');
 return redirect()->route('show.home');
    }

    public function destroy(Request $request, book $book, string $id)
    {
        //  verifica si o mesmo está cadastrado no banco de dados
        if (!$book = $book->find($id)) {
            return back();
        }
        //Delecta a imagem no banco de dados
        $book->delete();


        // Delecta a imagem x que esta na pasta storage/app/public/img/book_cap/
        File::delete('storage/img/book_cap/' . $request->input('image_path'));

          session()->flash('sucess', 'Livro deletado com sucesso');
         return redirect()->route('show.home');
    }
}
