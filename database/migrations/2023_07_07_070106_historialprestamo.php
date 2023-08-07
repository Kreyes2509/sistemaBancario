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
        Schema::create('historialPrestamo', function (Blueprint $table) {
            $table->id();
            $table->string('periodo');
            $table->integer('folio');
            $table->string('concepto')->default('PAGO MENSUAL');
            $table->double('total', 10, 2)->default(0.00);
            $table->double('pagado', 10, 2)->default(0.00)->nullable();
            $table->date('fechaVencimiento');
            $table ->string('estado_pago')->default('PENDIENTE');
            $table->unsignedBigInteger('prestamoID');
            $table->foreign('prestamoID')->references('id')->on('prestamos') ->onDelete('cascade');
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
