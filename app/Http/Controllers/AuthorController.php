<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAuthorRequest;
use App\Models\author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create()
    {

        return view('author/create');
    }

    public function store(author $author, StoreUpdateAuthorRequest $request)
    {
        $data = $request->all();
        $author = $author->create($data);

        session()->flash('sucess', 'Autor cadastrado com sucesso');
        return redirect()->route('create.author');
    }

    public function edit(author $author, string|int $id)
    {
        if (!$author = $author->where('id', $id)->first()) {
            return back();
        }
        return view('author/edit', compact('author'));
    }

    public function update(StoreUpdateAuthorRequest $request, author $author, string $id)
    {

        if (!$author = $author->find($id)) {
            return back();
        }

        $author = $author->update($request->only([
            'author'
        ]));
        session()->flash('sucess', 'Autor editado com sucesso');

        return redirect()->route('all.author');
    }

    public function all(author $author, Request $request)
    {

        //Si não existir valor a ser pesquisado traz todos as salas cadastradas
        $valor = $request->input('author');
        if (!empty($valor)) {
            $author = $author->where('author', 'like', "%{$valor}%")->orderBy('author', 'asc')->get();
            session()->flash('sucess', 'Resultado da pesquisa:');
        } else {
            $author = $author->orderBy('author', 'asc')->get();
        }

        return view('author/all', compact('author'));
    }

    public function destroy(author $author, string|int $id)
    {
        if (!$author = $author->find($id)) {
            return back();
        }
        //Elimina um autor todos os livros que estão associados a esse autor e elimina todos os emprestimos referenciados a este livro
        $books = $author->book;
        foreach ($books as $book) {
            $book->borrowed_book()->delete();
            $book->delete();
        }
        $author->delete();
        session()->flash('sucess', 'Autor deletado com sucesso');
        return redirect()->route('all.author');
    }
}
