<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book_return extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
        'borrowed_book_id',
        'student_id',
        'user_id',
        'book_id',
        'return_date',
        'observation',
    ];

    public function student(): BelongsTo
    {
       return $this->belongsTo(Student::class);
    }
    public function book(): BelongsTo
    {
       return $this->belongsTo(Book::class);
    }
    public function user(): BelongsTo
    {
       return $this->belongsTo(User::class);
    }

    public function borrowed_book(): BelongsTo
    {
       return $this->belongsTo(Borrowed_book::class);
    }

}
