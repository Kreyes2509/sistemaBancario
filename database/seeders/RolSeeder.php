<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol = new Rol();
        $rol->rol = "Administrativo";
        $rol->save();

        $rol1 = new Rol();
        $rol1->rol = "Empleado";
        $rol1->save();

        $rol = new Rol();
        $rol->rol = "Cobrador";
        $rol->save();
    }
}
