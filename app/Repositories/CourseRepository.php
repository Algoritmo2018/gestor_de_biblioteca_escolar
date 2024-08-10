<?php

namespace App\Repositories;

use App\Models\Course;
use App\DTO\Courses\EditCourseDTO;
use App\DTO\Courses\CreateCourseDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseRepository
{
    public function __construct(protected Course $course)
    {
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = ''): LengthAwarePaginator
    {
        return $this->course->where(function ($query) use ($filter) {

            if ($filter !== '') {
                $query->where('course', 'LIKE', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);
    }

    public function createNew(CreateCourseDTO $dto): Course
    {
        $data = (array) $dto;
        return $this->course->create($data);
    }

    public function findById(string $id): ?Course
    {
        return $this->course->find($id);
    }

    public function update(EditCourseDTO $dto): bool
    {
        if (!$course = $this->findById($dto->id)) {
            return false;
        }
        $data = (array) $dto;
        return $course->update($data);
    }
    public function delete(string $id){

        if (!$course = $this->findById($id)) {
            return false;
        }   $students = $course->student;
        foreach ($students as $student) {
            $student->borrowed_book()->each(function ($borrowed_book) {
                $borrowed_book->traffic_ticket()->delete();
                $borrowed_book->book_return()->delete();
            });
            $student->delete();
        }
        return $course->delete();
    }
}
