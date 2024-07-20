<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class borrowed_book_rating extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
              'book_id',
        'quantity_of_book_loaned',
    ];
}
