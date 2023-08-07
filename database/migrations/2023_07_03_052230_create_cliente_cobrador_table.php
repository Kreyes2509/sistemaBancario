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
        Schema::create('cliente_cobrador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clienteID');
            $table->unsignedBigInteger('cobradorID');
            $table->foreign('clienteID')->references('id')->on('clientes') ->onDelete('cascade');
            $table->foreign('cobradorID')->references('id')->on('users') ->onDelete('cascade');
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
        Schema::dropIfExists('cliente_cobrador');
    }
};
