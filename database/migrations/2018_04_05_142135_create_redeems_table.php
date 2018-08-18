<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedeemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('redeemName')->unique();
            $table->string('redeemType');
            $table->string('redeemDiscountType');
            $table->float('redeemDiscount',11,2);
            $table->float('minimumAmountRequire',11,2);
            $table->dateTime('redeemValidFrom');
            $table->dateTime('redeemValidTo');
            $table->integer('usageAllow')->nullable();
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
        Schema::dropIfExists('redeems');
    }
}
