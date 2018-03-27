<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miaou_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_ajout');
            $table->integer('provider_id')->unsigned();
            $table->string('numero_facture');
            $table->date('date_facture');
            $table->decimal('montant', 8, 2);
            $table->date('date_reglement')->nullable();
            $table->text('commentaire')->nullable();
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('miaou_providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
