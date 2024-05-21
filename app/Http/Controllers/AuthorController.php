<?php

namespace App\Http\Controllers;

use App\Models\author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create()
    {
        
        return view('author/create');
    }

    public function store(author $author, Request $request)
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

public function update(Request $request, author $author, string $id){

    if (!$author = $author->find($id)) {
        return back();
    }

    $author = $author->update($request->only([
        'author'
    ]));
    session()->flash('sucess', 'Autor editado com sucesso');

    return redirect()->route('all.author');
}

    public function all(author $author){
$author = $author->orderBy('author', 'asc')->get();


return view('author/all', compact('author'));
    }

    public function destroy(author $author, string|int $id)
    {
        if (!$author = $author->find($id)) {
            return back();
        }

        $author->delete();
        session()->flash('sucess', 'Autor deletado com sucesso');
        return redirect()->route('all.author');
    }
}
