<?php

namespace App\DTO\Book_returns;

class CreateBook_returnDTO
{
    public function __construct(
        readonly public string $borrowed_book_id,
        readonly public string $student_id,
        readonly public ?string $user_id ='',
        readonly public string $book_id,
        readonly public ?string $return_date = '',
        readonly public string $observation,
    ) {
        //
    }
}
