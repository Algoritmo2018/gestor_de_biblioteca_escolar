<?php

namespace App\Repositories;

use App\Models\Student;
use App\DTO\Students\EditStudentDTO;
use App\DTO\Students\CreateStudentDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentRepository
{
    public function __construct(protected Student $student)
    {
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = ''): LengthAwarePaginator
    {
        return $this->student->with('course')
        ->where(function ($query) use ($filter) {

            if ($filter !== '') {
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);
    }

    public function createNew(CreateStudentDTO $dto): Student
    {
        $data = (array) $dto;
        return $this->student->create($data);
    }

    public function findById(string $id): ?Student
    {
        return $this->student->find($id);
    }

    public function update(string $id, $request): bool
    {
        if (!$student = $this->findById($id)) {
            return false;
        }
        if(!empty($request['name'])){
            $student->name = $request['name'];
        }
        if(!empty($request['type'])){
            $student->type = $request['type'];
        }
        if(!empty($request['course_id'])){
            $student->course_id = $request['course_id'];
        }
        if(!empty($request['bi'])){
            $student->bi = $request['bi'];
        }
        if(!empty($request['residence'])){
            $student->residence = $request['residence'];
        }
        if(!empty($request['contact'])){
            $student->contact = $request['contact'];
        }
        if(!empty($request['email'])){
            $student->email = $request['email'];
        }

        return $student->save();
    }
    public function delete(string $id){

        if (!$student = $this->findById($id)) {
            return false;
        }
        return $student->delete();
    }
}
