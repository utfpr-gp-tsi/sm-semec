    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('servant');
            $table->integer('registration');
            $table->date('birth');
            $table->string('natural_from');
            $table->string('marital_status');
            $table->string('mother_name');
            $table->string('father_name');
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
        Schema::dropIfExists('servants');
    }
}
