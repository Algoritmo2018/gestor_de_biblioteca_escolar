<?php

namespace App\DTO\Students;

class EditStudentDTO
{
    public function __construct(
        readonly public string $id,
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
