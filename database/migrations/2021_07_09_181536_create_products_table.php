<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('barcode')->unique();
            $table->decimal('net_price',11,2);
            $table->decimal('gross_price',11,2);
            $table->decimal('VAT',11,2);
            $table->integer('actual_stock');
            $table->string('type',25);
            $table->decimal('width',7,2);
            $table->decimal('thickness',7,2);
            $table->integer('unit');
            $table->string('description');
            $table->integer('sale')->nullable();
            $table->string('picture_path');
            $table->string('color',30);
            $table->string('name',30);
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
