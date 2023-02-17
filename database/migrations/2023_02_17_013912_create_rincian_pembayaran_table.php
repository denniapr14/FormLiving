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
        Schema::create('rincian_pembayaran', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_rp', true);
            $table->integer('id_pem_rumah')->index('id_pem_rumah');
            $table->date('tgl_bayar_rp');
            $table->float('nominal_rp', 10, 0);
            $table->float('sisa_rp', 10, 0)->nullable();
            $table->string('bukti_rp', 100)->nullable();
            $table->string('keterangan_rp', 100);
            $table->enum('status_rp', ['belum', 'sudah', 'kurang']);
            $table->timestamp('tgl_input_rp')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rincian_pembayaran');
    }
};
