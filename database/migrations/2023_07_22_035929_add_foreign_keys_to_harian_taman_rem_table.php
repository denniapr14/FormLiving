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
        Schema::table('harian_taman_rem', function (Blueprint $table) {
            $table->foreign(['id_LREM'], 'harian_taman_rem_ibfk_2')->references(['id_LREM'])->on('laporan_rem');
            $table->foreign(['id_BREM'], 'harian_taman_rem_ibfk_1')->references(['id_BREM'])->on('blok_rem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('harian_taman_rem', function (Blueprint $table) {
            $table->dropForeign('harian_taman_rem_ibfk_2');
            $table->dropForeign('harian_taman_rem_ibfk_1');
        });
    }
};
