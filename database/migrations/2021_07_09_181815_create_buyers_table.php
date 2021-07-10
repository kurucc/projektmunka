<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string('username',30)->unique();
            $table->string('password',30);
            $table->string('email',30)->unique();
            $table->date('birthday');
            $table->string('tel',12)->nullable();
            $table->string('delivery_zip',4);
            $table->string('delivery_address',50);
            $table->string('delivery_city',30);
            $table->string('invoice_zip',4);
            $table->string('invoice_city',30);
            $table->string('invoice_address',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyers');
    }
}
