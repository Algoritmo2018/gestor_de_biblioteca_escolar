<?php

namespace App\DTO\Authors;

class CreateAuthorDTO
{
    public function __construct(
        readonly public string $author,
    ) {
        //
    }
}
