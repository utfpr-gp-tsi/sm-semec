<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('started_at');
            $table->date('ended_at');
            $table->integer('number');
            $table->string('time');
            $table->bigInteger('contract_id')->unsigned()->index()->default(1);
            $table->foreign('contract_id')
                    ->references('id')
                    ->on('contracts')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('acts');
    }
}
