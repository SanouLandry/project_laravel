<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->increments('idPaiement');
            $table->integer('idClient');
            $table->integer('idArticle');
            $table->integer('quantite');
            $table->double('prixTotal');
            $table->integer('idUser');
            $table->date('datePaiement');
            $table->integer('idFacturation');
            $table->string('idValidate');
            $table->integer('caisse');
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
        Schema::dropIfExists('paiements');
    }
}
