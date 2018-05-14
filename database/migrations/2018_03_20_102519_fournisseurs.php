<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fournisseurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname');
            $table->string('name');
            $table->string('adress');
            $table->integer('postcode');
            $table->string('city');
            $table->string('email');
            $table->string('phone');
            $table->integer('typefournisseur_id')->unsigned();
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('typefournisseur_id')->references('id')->on('miaou_typesfournisseurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fournisseurs');
    }
}
