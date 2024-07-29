<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    public function borrowed_book(): HasMany{
        return $this->hasMany(Borrowed_book::class);
     }
     public function traffic_ticket(): HasMany{
        return $this->hasMany(Traffic_ticket::class);
     }

     public function book_return(): HasMany{
        return $this->hasMany(Book_return::class);
     }


 //Para eliminar os dados em cascata tabela borrowed_book,traffic_ticket,book_return e tabela student
  public static function booted()
  {
    static::deleting(function (Student $student) {

        $student->book_return()->delete();
        $student->borrowed_book()->delete();

    });
  }
}
