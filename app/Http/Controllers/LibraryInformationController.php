<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateLibraryinformationRequest;
use Illuminate\Http\Request;
use App\Models\LibraryInformation;
use Illuminate\Support\Facades\Auth;

class LibraryInformationController extends Controller
{

public function create(){

    return view('library_information/create');
}

public function store(LibraryInformation $library_information, StoreUpdateLibraryinformationRequest $request)
{
    $user = Auth::user();
//Verifica si este usuario já foi registrado na bd, si já, então não vai permitir o registro
    $library_information = $library_information->where('user_id',$user->id)->count();
    if($library_information > 0){

    session()->flash('error', 'Os seus dados já foram registrados no nosso banco de dados');
        return back();
    }
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

      public function update(StoreUpdateLibraryinformationRequest $request, LibraryInformation $library_information, string $id){
 

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
