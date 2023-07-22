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
        Schema::create('kalkulator_kpr', function (Blueprint $table) {
            $table->integer('id_kkpr', true);
            $table->integer('id_koef')->nullable();
            $table->integer('id_bunga')->nullable();
            $table->integer('bunga')->nullable();
            $table->integer('luas_tanah_kkpr')->nullable();
            $table->integer('luas_bangunan_kkpr')->nullable();
            $table->integer('tipe_kkpr')->nullable();
            $table->double('harga_awal')->nullable();
            $table->double('total_diskon')->nullable();
            $table->double('total_harga')->nullable();
            $table->string('terbilang', 300)->nullable();
            $table->double('uang_muka')->nullable();
            $table->integer('cicilan_um')->default(4);
            $table->string('cicilan', 10)->nullable();
            $table->double('kpr')->nullable();
            $table->double('bulat_cluster_kkpr')->nullable();
            $table->string('bulat_kpr_kkpr', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kalkulator_kpr');
    }
};
