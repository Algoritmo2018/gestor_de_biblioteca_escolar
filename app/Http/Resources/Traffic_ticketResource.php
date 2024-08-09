<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Traffic_ticketResource extends JsonResource
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
        'borrowed_book_id' => $this->borrowed_book->book->title,
        'student_id' => $this->student->name,
        'debt' => $this->debt,
        'state' => $this->state
    ];
    }
}
