<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'release_date',
        'duration',
        'genre',
        'poster',
        'director_id',
    ];


    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class)
            ->withPivot('role')
            ->withTimestamps();
    }
}
