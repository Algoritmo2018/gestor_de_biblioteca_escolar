<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibraryInformation;
use Illuminate\Support\Facades\Auth;

class LibraryInformationController extends Controller
{

public function create(){

    return view('library_information/create');
}

public function store(LibraryInformation $library_information, Request $request)
{
    $user = Auth::user();

    $library_information = LibraryInformation::create([
        'user_id' => $user->id,
        'bi' => $request->bi,
        'residence' => $request->residence,
        'contact' => $request->contact,
    ]);
    session()->flash('sucess', 'Os seus dados foram adicionados com sucesso');
    return redirect()->route('create.library_information');
}
      public function show(LibraryInformation $library_information){

        $user = Auth::user();
        $library_information = $library_information->where('user_id',$user->id)->first();
   return view('library_information/show', compact('user','library_information'));
      }

      public function edit(LibraryInformation $library_information){

        $user = Auth::user();
        $library_information = $library_information->where('user_id',$user->id)->first();
   return view('library_information/edit', compact('user','library_information'));
      }

      public function update(Request $request, LibraryInformation $library_information, string $id){

        if (!$library_information = $library_information->find($id)) {
            return back();
        }

        $library_information->bi = $request->bi;
        $library_information->residence = $request->residence;
        $library_information->contact = $request->contact;

         $library_information->save();

         session()->flash('sucess', 'Os seus dados foram editados com sucesso');

        return redirect()->route('show.library_information');
    }

    public function destroy(LibraryInformation $library_information, string|int $id)
    {
        if (!$library_information = $library_information->find($id)) {
            return back();
        }
        $library_information->delete();

        session()->flash('sucess', 'Os seus dados foram deletados com sucesso');
        return redirect()->route('create.library_information');
    }

}
