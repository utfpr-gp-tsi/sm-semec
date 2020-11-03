<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServantCompletaryDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servant_completary_datas', function (Blueprint $table) {
            $table->id();
            $table->enum('period', ['morning', 'evening']);
            $table->string('occupation');
            $table->unsignedBigInteger('contract_id')->index();
            $table->foreign('contract_id')
                    ->references('id')
                    ->on('contracts')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('workload_id')->index();
            $table->foreign('workload_id')
                    ->references('id')
                    ->on('workloads')
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
        Schema::dropIfExists('servant_completary_datas');
    }
}
