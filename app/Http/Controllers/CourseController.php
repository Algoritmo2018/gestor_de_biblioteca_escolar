<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create()
    {
        return view('course/create');
    }

    public function store(Course $course, Request $request)
    {
        $data = $request->all();
        $course = $course->create($data);

        session()->flash('sucess', 'Curso cadastrada com sucesso');
        return redirect()->route('create.course');
    }

public function edit(Course $course, string|int $id)
{
    if (!$course = $course->where('id', $id)->first()) {
        return back();
    }
    return view('course/edit', compact('course'));
}

public function update(Request $request, Course $course, string $id){

    if (!$course = $course->find($id)) {
        return back();
    }

    $course = $course->update($request->only([
        'course'
    ]));
    session()->flash('sucess', 'Curso editada com sucesso');

    return redirect()->route('all.course');
}

    public function all(Course $course){
$course = $course->orderBy('course', 'asc')->get();


return view('course/all', compact('course'));
    }

    public function destroy(Course $course, string|int $id)
    {
        if (!$course = $course->find($id)) {
            return back();
        }

        $course->delete();
        session()->flash('sucess', 'Curso deletada com sucesso');
        return redirect()->route('all.course');
    }
}
