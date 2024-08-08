<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Borrowed_bookResource extends JsonResource
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
            'book_id' => $this->book->title,
            'student_id' => $this->student->name,
            'date_borrowed' => $this->date_borrowed,
            'return_date' => $this->return_date,
            'observation' => $this->observation,
        ];
    }
}
