<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idFournisseur');
            $table->string('libelleCommande');
            $table->string('referenceCommande');
            $table->string('etatCommande');
            $table->string('bonDeCommande');
            $table->string('typeCommande');
            $table->integer('prixTotal');
            $table->integer('montantPaye');
            $table->integer('monnaieRecu');
            $table->integer('validate');
            $table->integer('montantCharge');
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
        Schema::dropIfExists('commandes');
    }
}
