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
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('nombreUsuario');
            $table->date('fechaCumple');
            $table->string('email')->unique();
            $table ->string('imagen')->default('https://bantolin.nyc3.digitaloceanspaces.com/fotos/fotoPerfil.png')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status_password')->default(false);
            $table->unsignedBigInteger('rolId');
            $table->foreign('rolId')->references('id')->on('roles') ->onDelete('cascade');;
            $table->boolean('userStatus')->nullable()->default(true);
            $table->rememberToken();
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
