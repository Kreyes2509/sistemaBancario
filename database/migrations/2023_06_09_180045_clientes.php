<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {

            $table->id();
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->string('direccion');
            $table->string('numero_exterior');
            $table->string('codigo_postal');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('telefono');
            $table->string('email');
            $table->string('empleo_actual');
            $table->string('nombre_empresa');
            $table->double('sueldo', 10, 2);
            $table->string('antiguedad');
            $table->string('telefono_empresa');
            $table->string('direccion_empresa');
            $table->string('situacion_buro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
