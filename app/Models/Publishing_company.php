<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publishing_company extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
        'publishing_company'
    ];

    public function book(): HasMany{
        return $this->hasMany(Book::class);
     }


     //Para eliminar os dados em cascata tabela Publishing_company e book
    public static function booted()
    {
        static::deleting(function (Publishing_company $publishing_company) {
            $publishing_company->book()->delete();
        });
    }
}
