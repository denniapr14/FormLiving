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
        Schema::create('user_projek', function (Blueprint $table) {
            $table->integer('id_user_projek', true);
            $table->integer('id_projek')->nullable();
            $table->integer('id_user_admin');
            $table->dateTime('tgl_input_user_projek')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_projek');
    }
};
