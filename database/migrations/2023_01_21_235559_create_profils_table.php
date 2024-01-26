<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            
            $table->id();
            $table->string("groupeProfil");
            $table->integer('jres');
            $table->integer('get');
            $table->integer('gbda');
            $table->integer('gpai');
            $table->integer('gfac');
            $table->integer('gpaie');
            $table->integer('gfour');
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
        Schema::dropIfExists('profils');
    }
}
