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
        Schema::table('harian_lampu_taman', function (Blueprint $table) {
            $table->foreign(['id_LOKREM'], 'harian_lampu_taman_ibfk_2')->references(['id_LOKREM'])->on('lokasi_rem');
            $table->foreign(['id_LREM'], 'harian_lampu_taman_ibfk_1')->references(['id_LREM'])->on('laporan_rem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('harian_lampu_taman', function (Blueprint $table) {
            $table->dropForeign('harian_lampu_taman_ibfk_2');
            $table->dropForeign('harian_lampu_taman_ibfk_1');
        });
    }
};
