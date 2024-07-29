<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoryRequest;
use App\Models\Book;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category/create');
    }

    public function store(category $category, StoreUpdateCategoryRequest $request)
    {
        $data = $request->all();
        $category = $category->create($data);

        session()->flash('sucess', 'Categoria cadastrada com sucesso');
        return redirect()->route('create.category');
    }

public function edit(Category $category, string|int $id)
{
    if (!$category = $category->where('id', $id)->first()) {
        return back();
    }
    return view('category/edit', compact('category'));
}

public function update(StoreUpdateCategoryRequest $request, Category $category, string $id){

    if (!$category = $category->find($id)) {
        return back();
    }

    $category = $category->update($request->only([
        'category'
    ]));
    session()->flash('sucess', 'Categoria editada com sucesso');

    return redirect()->route('all.category');
}

    public function all(category $category, Request $request){
            //Si não existir valor a ser pesquisado traz todos as categorias cadastradas
            $valor = $request->input('category');
            if (!empty($valor)) {
                $category = $category->where('category', 'like', "%{$valor}%")->orderBy('category', 'asc')->get();
                session()->flash('sucess', 'Resultado da pesquisa:');
            } else {
$category = $category->orderBy('category', 'asc')->get();
            }

return view('category/all', compact('category'));
    }

    public function destroy(Category $category, string|int $id)
    {

        if (!$category = $category->find($id)) {
            return back();
        }
//Elimina uma categoria todos os livros que estão associados a essa categoria e elimina todos os emprestimos referenciados a este livro
$books = $category->book;
foreach ($books as $book) {
    $book->borrowed_book()->each(function ($borrowed_book) {
        $borrowed_book->book_return()->delete();
    });
    $book->delete();
}
        $category->delete();
        session()->flash('sucess', 'Categoria deletada com sucesso');
        return redirect()->route('all.category');
    }
}
