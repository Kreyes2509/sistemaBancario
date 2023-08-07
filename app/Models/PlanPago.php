<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPago extends Model
{
    use HasFactory;

    protected $table = 'planpago';

    protected $fillable = [
        'plazo_pago',
        'cuota',
        'prestamoID',
    ];
}
