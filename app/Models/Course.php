<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
        'course'
    ];
    public function student(): HasMany{
        return $this->hasMany(Student::class);
     }

      //Para eliminar os dados em cascata tabela course e tabela student
    public static function booted()
    {
        static::deleting(function (Course $course) {
            $course->student()->delete();
        });
    }
}
