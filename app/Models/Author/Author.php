<?php

namespace App\Models\Author;

use App\Models\Book\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    // Un author puede tener muchos libros asociados
    public function libros(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
