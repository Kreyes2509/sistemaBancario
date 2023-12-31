<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobrador extends Model
{
    use HasFactory;

    protected $table = 'cobradores';

    protected $fillable = [
        'sueldo',
        'telefono',
        'email_empresa',
        'userID',
    ];
}
