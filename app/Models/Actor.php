<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $table = 'actors'; // Table name

    protected $fillable = [
        'cast_id',
        'film_id',
        'name',
    ];

    public function cast()
    {
        return $this->belongsTo(Cast::class, 'cast_id');
    }

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }
}
