<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefices', function (Blueprint $table) {
            $table->id();
            $table->integer('idCommande');
            $table->integer('idArticle');
            $table->integer('nombreArticleVendue');
            $table->integer('differencePrice');
            $table->integer('benefice');
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
        Schema::dropIfExists('benefices');
    }
}
