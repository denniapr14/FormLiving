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
        Schema::create('event', function (Blueprint $table) {
            $table->integer('id_event');
            $table->string('nama_event', 200);
            $table->string('img_event', 300)->nullable();
            $table->text('deskripsi_event');
            $table->string('link_video_event', 400)->nullable();
            $table->integer('jml_peserta_event');
            $table->integer('id_tempat')->nullable();
            $table->date('tgl_mulai_event');
            $table->date('tgl_berakhir_event');
            $table->string('jam_mulai_event', 30);
            $table->string('jam_berakhir_event', 30);
            $table->string('status_event', 20);
            $table->integer('harga_tiket');
            $table->timestamp('tgl_input_event')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
};
