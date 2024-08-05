<?php

namespace App\DTO\Categories;

class CreateCategoryDTO
{
    public function __construct(
        readonly public string $category,
    ) {
        //
    }
}
