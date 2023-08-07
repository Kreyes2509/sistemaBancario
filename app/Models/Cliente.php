<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'direccion',
        'numero_exterior',
        'codigo_postal',
        'ciudad',
        'estado',
        'telefono',
        'email',
        'empleo_actual',
        'sueldo',
        'nombre_empresa',
        'antiguedad',
        'telefono_empresa',
        'direccion_empresa',
        'situacion_buro',
    ];
}
