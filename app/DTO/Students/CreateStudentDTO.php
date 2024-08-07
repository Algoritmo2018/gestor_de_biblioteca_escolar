<?php

namespace App\DTO\Students;

class CreateStudentDTO
{
    public function __construct(
        readonly public string $name,
        readonly public string $type,
        readonly public string $course_id,
        readonly public string $bi,
        readonly public string $residence,
        readonly public string $contact,
        readonly public string $email,
    ) {
        //
    }
}
