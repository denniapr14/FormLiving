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
        Schema::create('ulasan_komplain', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_ulasan', true);
            $table->integer('id_lapkomplain')->index('id_lapkomplain');
            $table->timestamp('tgl_ulasan')->useCurrentOnUpdate()->useCurrent();
            $table->integer('nilai_ulasan');
            $table->text('keterangan_ulasan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ulasan_komplain');
    }
};
