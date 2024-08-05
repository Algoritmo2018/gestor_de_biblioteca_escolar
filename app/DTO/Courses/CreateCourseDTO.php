<?php

namespace App\DTO\Courses;

class CreateCourseDTO
{
    public function __construct(
        readonly public string $course,
    ) {
        //
    }
}
