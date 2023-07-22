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
        Schema::create('laporan_pu', function (Blueprint $table) {
            $table->integer('id_lpu', true);
            $table->integer('id_petugas')->index('id_petugas');
            $table->integer('id_LREM')->nullable();
            $table->timestamp('tgl_input_lpu')->useCurrentOnUpdate()->useCurrent();
            $table->text('jobdesk_lpu');
            $table->string('foto_lpu', 300);
            $table->enum('status_pekerjaan_lpu', ['idle', 'proses', 'done'])->default('idle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_pu');
    }
};
