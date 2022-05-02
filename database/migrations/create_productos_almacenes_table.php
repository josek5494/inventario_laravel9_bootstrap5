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
        Schema::create('productos_almacenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto')->constrained('productos')->onDelete('cascade');;
            $table->foreignId('id_almacen')->constrained('almacenes')->onDelete('cascade');;
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
        Schema::dropIfExists('productos_almacenes');
    }
};
