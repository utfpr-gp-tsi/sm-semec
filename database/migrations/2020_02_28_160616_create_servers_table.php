<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('server');
            $table->integer('registration');
            $table->date('birth');
            $table->string('natural from');
            $table->string('marital status');
            $table->string('mother name');
            $table->string('father name');
            $table->integer('CPF');
            $table->integer('RG');
            $table->integer('PIS');
            $table->integer('CTPS');
            $table->string('title');
            $table->string('address');
            $table->integer('phone');
            $table->string('email');
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
        Schema::dropIfExists('servers');
    }
}
