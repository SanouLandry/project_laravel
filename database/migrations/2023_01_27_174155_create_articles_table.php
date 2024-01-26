<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idReferencePrix');
            $table->integer('idStock');
            $table->integer('idCategorieArticle');
            $table->string('libelleArticle');
            $table->string('referenceArticle');
            $table->integer('quantiteMax');
            $table->integer('quantiteMin');
            $table->string('codeArticle');
            $table->text('codeBarre');
            $table->integer('totalEntree');
            $table->integer('totalSortie');
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
        Schema::dropIfExists('articles');
    }
}
