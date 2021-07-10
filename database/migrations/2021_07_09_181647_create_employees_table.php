<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('username',30)->unique();
            $table->string('password',30);
            $table->string('email',30)->unique();
            $table->date('birthday');
            $table->string('tel',12)->nullable();
            $table->string('tax_num',11)->unique();
            $table->string('SSN',11)->unique();
            $table->string('bank_account_number',24);
            $table->string('role',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
