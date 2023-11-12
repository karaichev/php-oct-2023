<?php

namespace App\Models;

use App\Enums\BookStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property-read Author $author
 * @property-read Image[] $images
 * @property-read Review[] $reviews
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'page_number', 'annotation', 'author_id', 'status',
    ];

    protected $casts = [
        'status' => BookStatus::class,
    ];

    public function author(): belongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
