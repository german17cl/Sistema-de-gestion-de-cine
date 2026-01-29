<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    //id, name, surname, birth_date, nationality, biography, photo,
    //timestamps

    protected $fillable = [
        'id',
        'name',
        'surname',
        'birth_date',
        'biography',
        'photo',
        'timestamps',
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
