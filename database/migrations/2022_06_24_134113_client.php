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
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('No_tel');
            $table->integer('pending');
            $table->bigInteger('id_cible')->unsigned();
            $table->foreign('id_cible')->references('id_cible')->on('format_cibles')->onDelete('cascade');
            $table->bigInteger('id_coach')->unsigned();
            $table->foreign('id_coach')->references('id')->on('coaches')->onDelete('cascade');
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
        Schema::dropIfExists('client');
    }
};
