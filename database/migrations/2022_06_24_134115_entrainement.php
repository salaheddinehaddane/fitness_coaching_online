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
        Schema::create('entrainements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cible');
            $table->string('type');
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
        //
    }
};
