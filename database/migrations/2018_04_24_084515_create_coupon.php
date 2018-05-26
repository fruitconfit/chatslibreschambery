<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoupon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (blueprint $table)
        {
          $table->increments('id');
          $table->string('refCoupon')->nullable();
          $table->string('referentName');
          $table->string('referentPhone');
          $table->string('benevoleName');
          $table->string('benevolePhone');
          $table->date('dateExpiration');
          $table->string('commentaire')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
