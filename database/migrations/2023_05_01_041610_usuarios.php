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
        //creando la migración
        Schema::create('Usuarios',function (Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email',250);
            $table->string('password');
            $table->unsignedBigInteger('role');
            $table->integer('estado')->nullable();
            $table->rememberToken();
            $table->unique('email');
            $table->foreign('role')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('clientes');
    }
};
