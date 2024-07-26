<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryInformation extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'bi',
        'residence',
        'contact',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
