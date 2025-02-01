<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Genre;
use App\Models\Cast;
use App\Models\FilmReview;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films'; // Table name

    protected $fillable = [
        'title',
        'summary',
        'release_year',
        'poster',
        'genre_id',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genre', 'film_id', 'genre_id');
    }

    public function actors()
    {
        return $this->belongsToMany(Cast::class, 'actors', 'film_id', 'cast_id');
    }

    public function reviews()
    {
        return $this->hasMany(FilmReview::class, 'film_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($film) {
            // Delete the poster from storage if it exists
            if ($film->poster && Storage::disk('public')->exists($film->poster)) {
                Storage::disk('public')->delete($film->poster);
            }
        });
    }
}
