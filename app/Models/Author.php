<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $surname
 */
class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname', 'name', 'patronymic',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
