<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Traffic_ticket extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
        'borrowed_book_id',
        'student_id',
        'debt',
        'state',
    ];

    public function borrowed_book(): BelongsTo
    {
       return $this->belongsTo(Borrowed_book::class);
    }


    public function student(): BelongsTo
    {
       return $this->belongsTo(Student::class);
    }
}
