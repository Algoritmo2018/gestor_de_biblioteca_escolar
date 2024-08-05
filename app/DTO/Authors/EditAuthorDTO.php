<?php

namespace App\DTO\Authors;

class EditAuthorDTO
{
    public function __construct(
        readonly public string $id,
        readonly public string $author,
    ) {
        //
    }
}
