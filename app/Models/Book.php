<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
        'title',
        'author_id',
        'category_id',
        'publishing_company_id',
        'number_of_copies',
        'year_of_publication',
        'image_path',
    ];

    public function author(): BelongsTo
    {
       return $this->belongsTo(author::class);
    }
    public function category(): BelongsTo
    {
       return $this->belongsTo(category::class);
    }
    public function publishing_company(): BelongsTo
    {
       return $this->belongsTo(Publishing_company::class);
    }
    public function borrowed_book(): HasMany{
        return $this->hasMany(Borrowed_book::class);
     }

     public function book_return(): HasMany{
        return $this->hasMany(Book_return::class);
     }

 //Para eliminar os dados em cascata tabela borrowed_book,traffic_ticket,book_return e tabela book
  public static function booted()
  {
      static::deleting(function (Book $book) {
          $book->borrowed_book()->delete();
      });
  }
}
