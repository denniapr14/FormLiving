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
        Schema::create('tipe_rumah', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_tipe_rumah', true);
            $table->string('jenis_tr', 50);
            $table->integer('kmr_mandi_tr');
            $table->integer('kmr_tidur_tr');
            $table->string('img_tr', 200)->nullable();
            $table->bigInteger('harga_tr')->nullable();
            $table->string('harga_text_tr', 200)->nullable();
            $table->dateTime('tgl_input_tr')->useCurrent();
            $table->timestamp('tgl_update_tr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipe_rumah');
    }
};
