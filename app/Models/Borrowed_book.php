<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrowed_book extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
        'student_id',
        'user_id',
        'book_id',
        'date_borrowed',
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

    public function traffic_ticket(): HasMany{
        return $this->hasMany(Traffic_ticket::class);
     }
     public function book_return(): HasMany{
        return $this->hasMany(Book_return::class);
     }
}
