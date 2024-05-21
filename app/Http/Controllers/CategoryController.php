<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category/create');
    }

    public function store(category $category, Request $request)
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

public function update(Request $request, Category $category, string $id){

    if (!$category = $category->find($id)) {
        return back();
    }

    $category = $category->update($request->only([
        'category'
    ]));
    session()->flash('sucess', 'Categoria editada com sucesso');

    return redirect()->route('all.category');
}

    public function all(category $category){
$category = $category->orderBy('category', 'asc')->get();


return view('category/all', compact('category'));
    }

    public function destroy(Category $category, string|int $id)
    {
        if (!$category = $category->find($id)) {
            return back();
        }

        $category->delete();
        session()->flash('sucess', 'Categoria deletada com sucesso');
        return redirect()->route('all.category');
    }
}
