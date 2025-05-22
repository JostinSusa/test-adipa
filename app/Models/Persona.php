<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'nombre',
        'apellido',
        'rut',
        'fecha_nacimiento',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date'
    ];
}
