<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraPresentacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_presentacion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('compra_id');
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');
            $table->unsignedInteger('presentacion_id');
            $table->foreign('presentacion_id')->references('id')->on('presentacions')->onDelete('cascade');
            $table->integer('cantidad')->default('1');
            $table->float('descuento', 8, 2)->default('0');
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
        Schema::dropIfExists('compra_presentacion');
    }
}
