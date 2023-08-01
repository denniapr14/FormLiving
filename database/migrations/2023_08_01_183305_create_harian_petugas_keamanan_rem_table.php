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
        Schema::create('harian_petugas_keamanan_rem', function (Blueprint $table) {
            $table->integer('id_HPKR', true);
            $table->integer('id_LREM');
            $table->integer('id_AP')->index('id_AP');
            $table->enum('kondisi_lapangan', ['yes', 'no'])->nullable();
            $table->text('keterangan');

            $table->index(['id_LREM', 'id_AP'], 'id_LREM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harian_petugas_keamanan_rem');
    }
};
