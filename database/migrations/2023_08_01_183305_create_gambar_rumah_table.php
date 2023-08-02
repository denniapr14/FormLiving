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
        Schema::create('gambar_rumah', function (Blueprint $table) {
            $table->integer('id_gambar_rumah', true);
            $table->integer('id_rumah')->nullable();
            $table->integer('id_tipe')->nullable();
            $table->string('img_rumah', 200)->nullable();
            $table->enum('status_gr', ['aktif', 'nonaktif'])->default('aktif');
            $table->enum('jenis_img', ['denah', 'gambar'])->default('gambar');
            $table->date('tgl_input')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gambar_rumah');
    }
};
