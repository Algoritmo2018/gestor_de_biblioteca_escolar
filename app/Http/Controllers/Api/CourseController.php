<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\DTO\Courses\EditCourseDTO;
use App\DTO\Courses\CreateCourseDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepository;
use App\Http\Requests\Api\Course\StoreUpdateCourseRequest;

class CourseController extends Controller
{

    public function __construct(private CourseRepository $courseRepository)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $courses = $this->courseRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->get('filter', ''),
        );
        return CourseResource::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCourseRequest $request)
    {
        $course = $this->courseRepository->createNew(new CreateCourseDTO(... $request->validated()));
        return new CourseResource($course);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$course = $this->courseRepository->findById($id)){
            return response()->json(['message' => 'course not found'], Response::HTTP_NOT_FOUND);
        }
        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCourseRequest $request, string $id)
    {
       $response =$this->courseRepository->update(new EditCourseDTO(...[$id, ...$request->validated()]));
        if(!$response){
            return response()->json(['message' => 'course not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'course updated with success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(!$this->courseRepository->delete($id)){
            return response()->json(['message' => 'course not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
