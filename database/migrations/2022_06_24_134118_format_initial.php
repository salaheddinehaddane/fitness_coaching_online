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
        Schema::create('format_initials', function (Blueprint $table) {
            $table->bigIncrements('id_initial');
            $table->integer('poid_initial');
            $table->integer('taille_initial');
            $table->integer('poitrine_initial');
            $table->integer('bras_initial');
            $table->integer('cuisse_initial');
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
