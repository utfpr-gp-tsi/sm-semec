<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reason');
            $table->timestamps();
            $table->unsignedBigInteger('servant_id')->index();
            $table->foreign('servant_id')
                    ->references('id')
                    ->on('servants')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('contract_id')->index();
            $table->foreign('contract_id')
                    ->references('id')
                    ->on('contracts')
                    ->onDelete('cascade');
                    $table->unsignedBigInteger('unit_id')->index();
            $table->foreign('unit_id')
                    ->references('id')
                    ->on('units')
                    ->onDelete('cascade');
                    $table->unsignedBigInteger('edict_id')->index();
            $table->foreign('edict_id')
                    ->references('id')
                    ->on('edicts')
                    ->onDelete('cascade');
                    $table->unsignedBigInteger('removal_id')->index();
            $table->foreign('removal_id')
                    ->references('id')
                    ->on('removals')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
