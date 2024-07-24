<?php

namespace App\Http\Controllers;
 
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create(Course $course)
    {
        $course = $course->orderBy('course', 'asc')->get();

        return view('student/create', compact('course'));
    }

    public function store(Student $student, Request $request)
    {

        $data = $request->all();
        $student = $student->create($data);

        session()->flash('sucess', 'Estudante cadastrada com sucesso');
        return redirect()->route('create.student');
    }

    public function edit(Student $student, string|int $id, Course $course)
    {
        if (!$student = $student->where('id', $id)->first()) {
            return back();
        }

        $course = $course->orderBy('course', 'asc')->get();

        return view('student/edit', compact('student', 'course'));
    }

    public function update(Request $request, Student $student, string $id)
    {

        //Verifica si o id do estudante existe
        if (!$student = $student->find($id)) {
            return back();
        }
        //Si existir nome ele atualiza
        if ($request->input('name')) {
            $student->name = $request->input('name');
        }
        //Si existir tipo ele atualiza
        if ($request->input('type')) {
            $student->type = $request->input('type');
        }
        //Si existir curso ele atualiza
        if ($request->input('course_id')) {
            $student->course_id = $request->input('course_id');
        }
        //Si existir bi ele atualiza
        if ($request->input('bi')) {
            $student->bi = $request->input('bi');
        }
        //Si existir residencia ele atualiza
        if ($request->input('residence')) {
            $student->residence = $request->input('residence');
        }
        //Si existir contacto ele atualiza
        if ($request->input('contact')) {
            $student->contact = $request->input('contact');
        }
        //Si existir email ele atualiza
        if ($request->input('email')) {
            $student->email = $request->input('email');
        }
        $student->save();

        session()->flash('sucess', 'Os dados do ' . $request->input('name') . ' foram atualizados com sucesso');

        return redirect()->route('all.student');
    }

    public function all(Student $student, Course $course, Request $request)
    {
        //Si não existir valor a ser pesquisado traz todos as salas cadastradas
        $valor = $request->input('name');
        if (!empty($valor)) {
            $student = $student->where('name', 'like', "%{$valor}%")->orderBy('name', 'asc')->get();
            session()->flash('sucess', 'Resultado da pesquisa:');
        } else {
            $student = $student->orderBy('name', 'asc')->get();
        }

        $course = $course->orderBy('course', 'asc')->get();
        return view('student/all', compact('student', 'course'));
    }

    public function destroy(Student $student, string|int $id)
    {
        if (!$student = $student->find($id)) {
            return back();
        }

        $student->delete();
        session()->flash('sucess', 'Estudante deletado com sucesso');
        return redirect()->route('all.student');
    }
}
