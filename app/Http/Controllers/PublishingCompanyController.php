<?php

namespace App\Http\Controllers;

use App\Models\Publishing_company;
use Illuminate\Http\Request;

class PublishingCompanyController extends Controller
{
    public function create()
    {
        return view('publishing_company/create');
    }

    public function store(Publishing_company $publishing_company, Request $request)
    {
        $data = $request->all();
        $publishing_company = $publishing_company->create($data);

        session()->flash('sucess', 'Editora cadastrada com sucesso');
        return redirect()->route('create.publishing_company');
    }

public function edit(Publishing_company $publishing_company, string|int $id)
{
    if (!$publishing_company = $publishing_company->where('id', $id)->first()) {
        return back();
    }
    return view('publishing_company/edit', compact('publishing_company'));
}

public function update(Request $request, Publishing_company $publishing_company, string $id){

    if (!$publishing_company = $publishing_company->find($id)) {
        return back();
    }

    $publishing_company = $publishing_company->update($request->only([
        'publishing_company'
    ]));
    session()->flash('sucess', 'Editora editada com sucesso');

    return redirect()->route('all.publishing_company');
}

    public function all(Publishing_company $publishing_company){
$publishing_company = $publishing_company->orderBy('publishing_company', 'asc')->get();


return view('publishing_company/all', compact('publishing_company'));
    }

    public function destroy(Publishing_company $publishing_company, string|int $id)
    {
        if (!$publishing_company = $publishing_company->find($id)) {
            return back();
        }

        $publishing_company->delete();
        session()->flash('sucess', 'Editora deletada com sucesso');
        return redirect()->route('all.publishing_company');
    }
}
