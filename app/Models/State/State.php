<?php

namespace App\Models\State;

use App\Models\Book\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    // Un estado puede tener muchos libros asociados
    public function libros(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
