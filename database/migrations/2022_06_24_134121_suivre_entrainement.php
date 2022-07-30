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
        Schema::create('suivre_entrainements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serie');
            $table->string('temps_repos');
            $table->date('date');
            $table->integer('duppliquer');
            $table->bigInteger('id_entrainement')->unsigned();
            $table->bigInteger('id_client')->unsigned();
            $table->foreign('id_entrainement')->references('id')->on('entrainements')->onDelete('cascade');
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
