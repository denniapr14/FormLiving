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
        Schema::table('harian_petugas_keamanan_rem', function (Blueprint $table) {
            $table->foreign(['id_LREM'], 'harian_petugas_keamanan_rem_ibfk_1')->references(['id_LREM'])->on('laporan_rem');
            $table->foreign(['id_AP'], 'harian_petugas_keamanan_rem_ibfk_2')->references(['id_AP'])->on('aspek_penilaian_rem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('harian_petugas_keamanan_rem', function (Blueprint $table) {
            $table->dropForeign('harian_petugas_keamanan_rem_ibfk_1');
            $table->dropForeign('harian_petugas_keamanan_rem_ibfk_2');
        });
    }
};
