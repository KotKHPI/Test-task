<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['first_name', 'second_name', 'surname'];

    public function books() : BelongsToMany {
        return $this->belongsToMany(Book::class);
    }

    public function scopeSortBySecondName(Builder $query) : Builder {
        return $query->orderBy('second_name');
    }

    public function scopeSearchByName(Builder $query, string $name) : Builder {
        return $query->where('first_name', 'LIKE', '%' . $name . '%')
            ->orWhere('second_name', 'LIKE', '%' . $name . '%')
            ->orWhere('surname', 'LIKE', '%' . $name . '%');
    }

}
