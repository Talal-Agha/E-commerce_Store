<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('name');
            $table->string('thumbnail');
            $table->text('description');
            $table->text('features');
            $table->integer('price');
            $table->integer('sale_status');
            $table->integer('sale_price');
            $table->integer('sku');
            $table->integer('upc');
            $table->integer('category');
            $table->string('author')->default("NULL");;
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
        Schema::dropIfExists('products');
    }
}
