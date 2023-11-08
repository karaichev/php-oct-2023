<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property-read Author $author
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'page_number', 'annotation', 'author_id',
    ];

    public function author(): HasOne
    {
        return $this->hasOne(Author::class);
    }
}
