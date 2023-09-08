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
        Schema::create('user_menu', function (Blueprint $table) {
            $table->integer('id_user_menu', true);
            $table->integer('id_menu')->nullable();
            $table->integer('id_user_admin')->nullable();
            $table->enum('status_um', ['aktif', 'nonaktif']);
            $table->dateTime('tgl_input_um')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_menu');
    }
};
