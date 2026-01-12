<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'nacionalidad',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class)
                    ->withPivot('rol')
                    ->withTimestamps();
    }
}
