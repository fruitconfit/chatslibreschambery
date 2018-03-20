<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miaou_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_raccourci', 16);
            $table->string('nom_complet');
            $table->string('adresse_postale');
            $table->string('code_postal', 5);
            $table->string('ville');
            $table->string('adresse_mail');
            $table->string('numero_telephone');
            $table->string('type_fournisseur');
            $table->text('commentaire')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
