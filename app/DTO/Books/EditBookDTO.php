<?php

namespace App\DTO\Books;

class EditBookDTO
{
    public function __construct(
        readonly public string $id,
        readonly public string $title,
        readonly public string $author_id,
        readonly public string $category_id,
        readonly public string $publishing_company_id,
        readonly public int $number_of_copies,
        readonly public int $year_of_publication,
        readonly public string $image_path,
    ) {
        //
    }
}
