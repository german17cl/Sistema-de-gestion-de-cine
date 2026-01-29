<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    //id, name, surname, birth_date, nationality, biography, photo,
    //timestamps
    protected $fillable = [
        'id',
        'name',
        'surname',
        'birth_date',
        'nationality',
        'biography',
        'photo',
        'timestamps',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class)
                    ->withPivot('role')
                    ->withTimestamps();
    }
}
