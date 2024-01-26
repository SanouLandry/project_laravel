<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturations', function (Blueprint $table) {
            $table->id();
            $table->integer('idFacturation');
            $table->double('montantTotal');
            $table->longblob('facturePdf');
            $table->integer('etat');
            $table->string('token_paiement');
            $table->string('nomClient');
            $table->string('prenomClient');
            $table->string('numeroTelephone');
            $table->date('datePaiement');
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
        Schema::dropIfExists('facturations');
    }
}
