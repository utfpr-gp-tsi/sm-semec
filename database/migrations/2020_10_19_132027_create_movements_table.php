<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->enum('period', ['morning', 'evening']);
            $table->string('occupation');
            $table->date('started_at');
            $table->date('ended_at')->nullable();
            $table->unsignedBigInteger('unit_id')->index();
            $table->foreign('unit_id')
                    ->references('id')
                    ->on('units')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('servant_completary_data_id');
            $table->foreign('servant_completary_data_id')
                    ->references('id')
                    ->on('servant_completary_datas')
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
        Schema::dropIfExists('movements');
    }
}
