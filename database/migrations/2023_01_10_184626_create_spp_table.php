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
        Schema::create('spp', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_spp', true);
            $table->integer('id_rumah')->nullable();
            $table->integer('id_formulir')->nullable();
            $table->integer('id_pelanggan')->nullable();
            $table->string('ket_spp', 100)->nullable();
            $table->enum('status_staf_acc', ['validated']);
            $table->enum('status_head_acc', ['validated', 'nonvalidated']);
            $table->date('tgl_accept_acc')->nullable();
            $table->enum('status_ceo', ['validated', 'nonvalidated']);
            $table->enum('stats_spk', ['spp', 'spk', 'request'])->nullable();
            $table->date('tgl_accept_ceo')->nullable();
            $table->timestamp('tgl_input_spp')->useCurrent();
            $table->string('no_spp', 20)->nullable();
            $table->string('pem_spp', 100)->nullable();
            $table->string('thn_spp', 20)->nullable();
            $table->date('pem_akhir_spp')->nullable();
            $table->date('tgl_max_bangun')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spp');
    }
};
