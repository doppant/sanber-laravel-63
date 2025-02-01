<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Film;

class FilmReview extends Model
{
    use HasFactory;

    protected $table = 'films_review'; // Table name

    protected $fillable = [
        'user_id',
        'film_id',
        'content',
        'point',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }
}
