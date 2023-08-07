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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->double('monto_prestamo', 10, 2)->nullable();
            $table ->string('tasa_interes')->nullable();
            $table ->string('plazo_pago')->nullable();
            $table ->date('fecha_solicitud');
            $table ->date('fecha_aprobacion')->nullable();
            $table ->string('metodo_pago')->nullable();
            $table ->double('cuota', 10, 2)->nullable();
            $table ->string('estado_prestamo')->default('PENDIENTE')->nullable();
            $table ->string('tipo_prestamo')->nullable();
            $table ->string('garantia')->nullable();
            $table->unsignedBigInteger('clienteID');
            $table->foreign('clienteID')->references('id')->on('clientes') ->onDelete('cascade');
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
