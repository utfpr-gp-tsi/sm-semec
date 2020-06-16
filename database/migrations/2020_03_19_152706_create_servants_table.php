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
            $table->string('name')->nullable()->default(null);;
            $table->date('birthed_at')->nullable()->default(null);
            $table->string('natural_from')->nullable()->default(null);
            $table->string('marital_status')->nullable()->default(null);
            $table->string('mother_name')->nullable()->default(null);
            $table->string('father_name')->nullable()->default(null);
            $table->string('CPF')->nullable()->default(null);
            $table->string('RG')->nullable()->default(null);
            $table->string('PIS')->nullable()->default(null);
            $table->string('CTPS')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->default(null);;
            $table->rememberToken();
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
