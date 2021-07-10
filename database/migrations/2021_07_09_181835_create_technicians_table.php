<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechniciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->string('name',60);
            $table->string('tel',12);
            $table->string('email',30)->unique();
            $table->string('webpage',60)->nullable();
            $table->string('zip_code',4);
            $table->foreign('zip_code')->references('zip_code')->on('cities')->onDelete('cascade');
            $table->string('county',50);
            $table->string('address');
            $table->integer('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technicians');
    }
}
