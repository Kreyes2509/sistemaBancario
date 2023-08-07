<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aval extends Model
{
    use HasFactory;
    protected $table = 'avales';

    protected $fillable = [
        'nombre_completo',
        'direccion',
        'telefono',
        'email',
        'rfc',
        'relacion_cliente',
        'monto_avalado',
        'fecha_inicio',
        'fecha_finalizacion',
        'estado',
        'clienteID',
    ];

}
