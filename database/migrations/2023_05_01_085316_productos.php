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
        //
        Schema::create('Productos',function (Blueprint $table){
            $table->string('codigoProducto',15)->primary();
            $table->string('nombre');
            $table->string('descripción');
            $table->string('img',250);
            $table->integer('categoria');
            $table->integer('precio');
            $table->integer('existencias');
            $table->foreign('categoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('clientes');
    }
};
