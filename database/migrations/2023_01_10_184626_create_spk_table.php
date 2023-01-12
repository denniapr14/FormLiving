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
        Schema::create('spk', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_spk', true);
            $table->integer('id_spp')->nullable();
            $table->integer('id_formulir')->nullable();
            $table->integer('id_req_pengawas')->nullable();
            $table->integer('id_pelanggan')->nullable();
            $table->string('no_surat_spk', 150)->nullable();
            $table->integer('id_rumah')->nullable();
            $table->integer('id_subkon')->nullable();
            $table->string('file_spk', 250)->nullable();
            $table->string('file_hasil_spk', 200);
            $table->string('denah_spk', 100)->nullable();
            $table->bigInteger('harga_tipe_spk')->nullable();
            $table->bigInteger('ppn_spk')->nullable();
            $table->bigInteger('total_spk')->nullable();
            $table->enum('status_spk', ['Teknik', 'Arsitek', 'progress', 'pengajuan teknik', 'pembayaran', 'selesai'])->nullable();
            $table->integer('sisa_spk')->nullable();
            $table->integer('cicilan_spk')->nullable();
            $table->enum('tambah_bangunan_spk', ['ada', 'tidak ada']);
            $table->text('ket_tambah_bangunan')->nullable();
            $table->string('bukti_tambah_spk', 500)->nullable();
            $table->dateTime('tgl_input_spk')->useCurrent();
            $table->enum('stat_pengawas_spk', ['nonvalidated', 'validated']);
            $table->text('ket_pengawas_spk')->nullable();
            $table->enum('stat_pendamping_spk', ['nonvalidated', 'validated']);
            $table->text('ket_pendamping_spk')->nullable();
            $table->enum('stat_teknik_spk', ['nonvalidated', 'validated']);
            $table->text('ket_teknik_spk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spk');
    }
};
