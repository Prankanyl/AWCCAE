<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baskets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_users');
            $table->integer('id_catalogs')->nullable();
            $table->integer('id_declarations')->nullable();
            $table->integer('count');
            $table->string('status');

            // $table->id();
            // $table->timestamps();
            // $table->integer('id_users');
            // $table->integer('id_catalogs');
            // $table->integer('id_declarations');
            // $table->integer('count');
            // $table->int('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baskets');
    }
}
