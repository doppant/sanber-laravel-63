<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    protected $table = 'casts'; // Table name

    protected $fillable = [
        'name',
        'age',
        'bio',
    ];

    public function actors()
    {
        return $this->hasMany(Actor::class, 'cast_id');
    }
}
