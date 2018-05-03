<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typeDiscount');
            $table->string('nameBank');
            $table->string('nameSender');
            $table->string('dateDiscount');
            $table->string('priceDiscount');
            $table->string('recipeType');
            $table->string('recu')->nullable();
            $table->string('edite')->nullable();
            $table->string('cat')->nullable();
            $table->text('description')->nullable();
            $table->integer('id_liasse')->unsigned();
            $table->timestamps();

            $table->foreign('id_liasse')
                ->references('id')
                ->on('liasses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
