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
            $table->enum('removal_type', ['Permuta','Interesse']);
            $table->string('interest_unit');
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
