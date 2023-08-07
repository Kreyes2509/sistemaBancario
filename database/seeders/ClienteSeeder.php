<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cliente = new Cliente();
        $cliente -> apellido_paterno = "De la Cruz";
        $cliente -> apellido_materno = "Hernandez";
        $cliente -> nombres = "Jaime Alonso";
        $cliente -> direccion = "sierra del Rosario";
        $cliente -> numero_exterior = "665";
        $cliente -> codigo_postal = "27790";
        $cliente -> ciudad = "Torreón";
        $cliente -> estado = "Coahuila";
        $cliente -> telefono = "8715678909";
        $cliente -> email = "alonso@gmail.com";
        $cliente -> empleo_actual = "encargado del área de informática";
        $cliente -> sueldo = 15000;
        $cliente -> nombre_empresa = "Conalep";
        $cliente -> antiguedad = "2 años";
        $cliente -> telefono_empresa = "8715408908";
        $cliente -> direccion_empresa = "calzada Vasconcelos";
        $cliente -> situacion_buro = "Deudad impagas";
        $cliente -> save();

        $cliente2 = new Cliente();
        $cliente2 -> apellido_paterno = "Diaz";
        $cliente2 -> apellido_materno = "Guerrero";
        $cliente2 -> nombres = "Patricia";
        $cliente2 -> direccion = "calle Lerdo";
        $cliente2 -> numero_exterior = "417";
        $cliente2 -> codigo_postal = "27440";
        $cliente2 -> ciudad = "Matamoros";
        $cliente2 -> estado = "Coahuila";
        $cliente2 -> telefono = "8711116089";
        $cliente2 -> email = "patydg@gmail.com";
        $cliente2 -> empleo_actual = "Operadora";
        $cliente2 -> sueldo = 100000;
        $cliente2 -> nombre_empresa = "Master";
        $cliente2 -> antiguedad = "20 años";
        $cliente2 -> telefono_empresa = "8712809078";
        $cliente2 -> direccion_empresa = "carretera Mieleras";
        $cliente2 -> situacion_buro = "Uso excesivo de crédito";
        $cliente2 -> save();

        $cliente3 = new Cliente();
        $cliente3 -> apellido_paterno = "Reyes";
        $cliente3 -> apellido_materno = "Rubio";
        $cliente3 -> nombres = "Kenneth Efrem";
        $cliente3 -> direccion = "cerrada san miguel";
        $cliente3 -> numero_exterior = "1907";
        $cliente3 -> codigo_postal = "27054";
        $cliente3 -> ciudad = "Torreón";
        $cliente3 -> estado = "Coahuila";
        $cliente3 -> telefono = "8714579081";
        $cliente3 -> email = "kenneth@gmail.com";
        $cliente3 -> empleo_actual = "Desarrollador";
        $cliente3 -> sueldo = 50000;
        $cliente3 -> nombre_empresa = "Zaro trasnportation";
        $cliente3 -> antiguedad = "2 años";
        $cliente3 -> telefono_empresa = "8712809078";
        $cliente3 -> direccion_empresa = "Independecia comonfort #123";
        $cliente3 -> situacion_buro = "bueno";
        $cliente3 -> save();

    }
}
