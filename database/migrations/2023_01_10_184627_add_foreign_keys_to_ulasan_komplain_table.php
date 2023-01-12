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
        Schema::table('ulasan_komplain', function (Blueprint $table) {
            $table->foreign(['id_lapkomplain'], 'ulasan_komplain_ibfk_1')->references(['id_lapkomplain'])->on('laporan_komplain');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ulasan_komplain', function (Blueprint $table) {
            $table->dropForeign('ulasan_komplain_ibfk_1');
        });
    }
};
