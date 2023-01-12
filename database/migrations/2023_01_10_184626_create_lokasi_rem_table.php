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
        Schema::create('lokasi_rem', function (Blueprint $table) {
            $table->comment('');
            $table->string('id_LOKREM', 5)->primary();
            $table->integer('urutan');
            $table->string('nama_lokasi_rem', 100);
            $table->text('titik_lampu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokasi_rem');
    }
};
