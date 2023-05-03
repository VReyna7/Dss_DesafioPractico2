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
        Schema::create('ventas',function (Blueprint $table){
        $table->id();
        $table->string('idProducto',15);
        $table->float('precio');
        $table->integer('cantidad');
        $table->string('pdf');
        $table->date('fechaVenta');
        $table->foreign('idProducto')->references('codigoProducto')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('ventas');
    }
};
