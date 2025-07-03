<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoFut extends Model
{

    protected $table = 'equipo_futs';

    protected $fillable = [
        'id',
        'nombre',
        'marca',
        'deporte',
        'talla',
        'material',
        'precio',
        'stock',
        'condicion',
        'estado'
    ];

    public $timestamps = false; // Si no se usan las marcas de tiempo
}
