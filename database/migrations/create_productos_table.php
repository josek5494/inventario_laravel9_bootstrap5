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
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->decimal('precio',8,2);
            $table->string('observaciones')->default('No hay observaciones.');
            $table->foreignId('id_categoria')->constrained('categorias')->onDelete('cascade');
            //$table->unsignedBigInteger('id_categoria');
            //$table->unsignedBigInteger('id_almacen');
            //$table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');
            //$table->foreign('id_almacen')->references('id')->on('almacenes')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
};
