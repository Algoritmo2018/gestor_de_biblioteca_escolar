<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\DTO\Students\EditStudentDTO;
use App\Http\Controllers\Controller;
use App\DTO\Students\CreateStudentDTO;
use App\Http\Resources\StudentResource;
use App\Repositories\StudentRepository;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{

    public function __construct(private StudentRepository $studentRepository)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = $this->studentRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->get('filter', ''),
        );
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = $this->studentRepository->createNew(new CreateStudentDTO(... $request->validated()));
        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$student = $this->studentRepository->findById($id)){
            return response()->json(['message' => 'student not found'], Response::HTTP_NOT_FOUND);
        }
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, string $id)
    {
       $response =$this->studentRepository->update($id, $request->validated());
        if(!$response){
            return response()->json(['message' => 'student not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'student updated with success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(!$this->studentRepository->delete($id)){
            return response()->json(['message' => 'student not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
