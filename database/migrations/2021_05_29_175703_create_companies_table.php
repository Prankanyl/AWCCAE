<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users');
            $table->string('title');
            $table->string('abbreviated_name');
            $table->string('iban');
            $table->string('bank_name');
            $table->string('address');
            $table->string('bic');
            $table->string('ynp');
            $table->string('legal_address');
            $table->string('number_phone');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
