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
        Schema::create('payement_clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date("date_debut");
            $table->date("date_fin");
            $table->bigInteger('id_abonnement')->unsigned();
            $table->bigInteger('id_client')->unsigned();
            $table->foreign('id_abonnement')->references('id')->on('abonnements')->onDelete('cascade');
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
        Schema::dropIfExists('payement_clients');
    }
};
