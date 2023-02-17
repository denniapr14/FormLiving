<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_kupon', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_temp_kupon', true);
            $table->integer('id_kupon');
            $table->string('sess_code', 200)->nullable();
            $table->date('tgl_expired');
            $table->timestamp('tgl_input')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_kupon');
    }
};
