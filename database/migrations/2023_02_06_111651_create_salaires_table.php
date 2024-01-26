<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaires', function (Blueprint $table) {
            $table->id();
            $table->integer('idSalaire');
            $table->integer('idUser');
            $table->double('salaireBase');
            $table->double('indemnites');
            $table->double('avanceSurSalaire');
            $table->double('salairePercu');
            $table->datetime('datePaiement');
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
        Schema::dropIfExists('salaires');
    }
}
