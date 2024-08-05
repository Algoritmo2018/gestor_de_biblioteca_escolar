<?php

namespace App\DTO\Categories;

class EditCategoryDTO
{
    public function __construct(
        readonly public string $id,
        readonly public string $category,
    ) {
        //
    }
}
