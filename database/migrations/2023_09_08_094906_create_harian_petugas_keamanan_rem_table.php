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
            $table->integer('id_HPKR');
            $table->integer('id_LREM');
            $table->integer('id_AP');
            $table->enum('kondisi_lapangan', ['yes', 'no'])->nullable();
            $table->text('keterangan');
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
