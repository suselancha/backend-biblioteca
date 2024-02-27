<?php

namespace App\Models\Book;

use App\Models\Author\Author;
use App\Models\Editorial\Editorial;
use App\Models\State\State;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        "titulo",
        "portada",
        'author_id',
        'editorial_id',
        'state_id'
    ];

    public function setCreatedAtAttribute($value)
    {
        date_default_timezone_set("America/Argentina/Jujuy");
        $this->attributes["created_at"] = Carbon::now();
    }

    public function setUpdatedAtAttribute($value)
    {
        date_default_timezone_set("America/Argentina/Jujuy");
        $this->attributes["updated_at"] = Carbon::now();
    }

    function scopeFilterAdvance($query, $search, $state)
    {
        if($search){
            $query->where("titulo","like","%".$search."%");
        }

        if($state){
            $query->where("state",$state);
        }

        return $query;
    }

    // Un libro pertenece a una única editorial
    public function editorial(): BelongsTo
    {
        return $this->belongsTo(Editorial::class);
    }

    // Un libro pertenece a un único autor
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    // Un libro pertenece a un único estado
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
