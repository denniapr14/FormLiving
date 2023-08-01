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
            $table->integer('id_tipe_rumah', true);
            $table->integer('id_rumah')->nullable();
            $table->string('jenis_tr', 50);
            $table->integer('luas_bangunan_tr')->nullable();
            $table->string('pondasi_tr', 200)->nullable();
            $table->string('struktur_tr', 200)->nullable();
            $table->string('dinding_dlm_tr', 200)->nullable();
            $table->string('dinding_luar_tr', 200)->nullable();
            $table->string('dinding_kmr_mnd_tr', 200)->nullable();
            $table->string('dd_meja_dapur_tr', 200)->nullable();
            $table->string('lt_ruang_tidur_tr', 200)->nullable();
            $table->string('lt_ruang_keluarga_tr', 200)->nullable();
            $table->string('lt_kmr_mnd_utama_tr', 200)->nullable();
            $table->string('lt_teras_utama_tr', 200)->nullable();
            $table->string('rangka_atap_tr', 200)->nullable();
            $table->string('penutup_atap_tr', 200)->nullable();
            $table->string('kusen_tr', 200)->nullable();
            $table->string('daun_pintu_tr', 200)->nullable();
            $table->string('sanitary_tr', 200)->nullable();
            $table->string('plafon_dlm_tr', 200)->nullable();
            $table->string('handle_tr', 200)->nullable();
            $table->string('lighting_tr', 200)->nullable();
            $table->string('daya_listrik_tr', 200)->nullable();
            $table->string('carport_tr', 200)->nullable();
            $table->string('tangga_tr', 200)->nullable();
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
