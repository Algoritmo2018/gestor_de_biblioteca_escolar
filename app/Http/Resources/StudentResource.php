<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   return [
        'id' => $this->id,
        'name' => $this->name,
        'type' => $this->type,
        'course_id' => $this->course->course,
        'bi' => $this->bi,
        'residence' => $this->residence,
        'contact' => $this->contact,
        'email' => $this->email,
    ];
    }
}
