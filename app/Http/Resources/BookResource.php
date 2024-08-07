<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id' => $this->id,
        'title' => $this->title,
        'author_id' => $this->author->author,
        'category_id' => $this->category->category,
        'publishing_company_id' => $this->publishing_company->publishing_company,
        'number_of_copies' => $this->number_of_copies,
        'image_path' => $this->image_path,
    ];
    }
}
