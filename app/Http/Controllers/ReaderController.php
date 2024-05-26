<?php

namespace App\Http\Controllers;


use App\Models\Publishing_company;
use App\Models\author;
use App\Models\category;
use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function create()
    {
        return view('reader/create');
    }

    public function store(Request $request){

        $image = new Reader([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'residence' => $request->get('residence'),
            'contact' => $request->get('contact'),
               ]);
        $image->save();

        session()->flash('sucess', 'Leitor cadastrado com sucesso');
        return redirect()->route('create.reader');
    }

    public function all(Reader $reader){

        $reader = $reader->orderBy('name', 'asc')->get();

        return view('reader/all', compact('reader'));
    }

    public function edit(Reader $reader, string|int $id)
    {
        if (!$reader = $reader->where('id', $id)->first()) {
            return back();
        }
                return view('reader/edit', compact('reader'));
    }

    public function update(string|int $id, Request $request, Reader $reader)
    {
if (!$reader = $reader->find($id)) {
    return back();
}

$dados = $request->all();
 //Faz o update do Livro
 $reader->name = $dados['name'];
 $reader->email = $dados['email'];
 $reader->residence = $dados['residence'];
 $reader->contact = $dados['contact'];

 $reader->save();



session()->flash('sucess', 'Livro editado com sucesso');
return redirect()->route('all.reader');
}


public function destroy(Reader $reader, string|int $id)
{
    if (!$reader = $reader->find($id)) {
        return back();
    }

    $reader->delete();
    session()->flash('sucess', 'Leitor deletado com sucesso');
    return redirect()->route('all.reader');
}

}
