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
        Schema::create('menu', function (Blueprint $table) {
            $table->integer('id_menu', true);
            $table->string('menu', 200)->nullable();
            $table->string('nama_menu', 200)->nullable();
            $table->enum('status_menu', ['menu', 'optional'])->nullable();
            $table->string('url_menu', 200)->nullable();
            $table->string('icon_menu', 100)->nullable();
            $table->dateTime('tgl_input_menu')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
};
