<?php

namespace App\DTO\Courses;

class EditCourseDTO
{
    public function __construct(
        readonly public string $id,
        readonly public string $course,
    ) {
        //
    }
}
