<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
        'category'
    ];

    public function book(): HasMany{
        return $this->hasMany(book::class);
     }
}
