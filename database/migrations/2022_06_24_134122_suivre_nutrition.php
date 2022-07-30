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
        Schema::create('suivre_nutritions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->integer('repas');
            $table->integer('quantite');
            $table->integer('duppliquer');
            $table->bigInteger('id_nutrition')->unsigned();
            $table->bigInteger('id_client')->unsigned();
            $table->foreign('id_nutrition')->references('id')->on('nutrition')->onDelete('cascade');
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
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
    }
};
