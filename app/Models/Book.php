<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'dateOfPublished'];

    protected $casts = [
        'dateOfPublished' => 'datetime'
    ];

    public function authors() : BelongsToMany {
        return $this->belongsToMany(Author::class);
    }

    public function scopeSortByName(Builder $query) {
        return $query->orderBy('name');
    }

    public function scopeSearchByNameOrAuthor(Builder $query, string $name) {
        return $query->where('name', 'LIKE', '%' . $name . '%')
            ->orWhereHas(
                'authors', function ($query) use ($name) {
                    $query->where('first_name', 'LIKE', '%' . $name . '%')
                    ->orWhere('second_name', 'LIKE', '%' . $name . '%')
                    ->orWhere('surname', 'LIKE', '%' . $name . '%');
                });
    }
}
