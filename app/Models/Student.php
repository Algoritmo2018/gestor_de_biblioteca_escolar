<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
        'name',
        'type',
        'course_id',
        'bi',
        'residence',
        'contact',
        'email',
    ];

    public function course(): BelongsTo
    {
       return $this->belongsTo(Course::class);
    }
}
