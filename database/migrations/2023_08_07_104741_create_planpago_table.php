<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planpago', function (Blueprint $table) {
            $table->id();
            $table ->string('plazo_pago')->nullable();
            $table ->double('cuota', 10, 2)->nullable();
            $table->unsignedBigInteger('prestamoID');
            $table->foreign('prestamoID')->references('id')->on('prestamos') ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planpago');
    }
};
