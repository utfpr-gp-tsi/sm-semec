<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscription_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inscription_id')->index();
            $table->foreign('inscription_id')
            ->references('id')
            ->on('inscriptions')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('unit_id')->index();
            $table->foreign('unit_id')
            ->references('id')
            ->on('units')
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
        Schema::dropIfExists('inscription_units');
    }
}
