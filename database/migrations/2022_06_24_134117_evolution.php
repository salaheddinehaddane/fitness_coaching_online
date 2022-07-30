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
        Schema::create('evolutions', function (Blueprint $table) {
            $table->bigIncrements('id_evolution');
            $table->integer('poid_evolution');
            $table->integer('taille_evolution');
            $table->integer('poitrine_evolution');
            $table->integer('bras_evolution');
            $table->integer('cuisse_evolution');
            $table->date('date_evolution');
            $table->bigInteger('id_client')->unsigned();
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
        //
    }
};
