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
        Schema::create('laporan_rem', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_LREM', true);
            $table->date('tgl_input_LREM')->useCurrent();
            $table->enum('on_check_rem', ['yes', 'no'])->default('no');
            $table->enum('tipe_laporan', ['HTR', 'HPKR', 'LHR', 'LPU'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_rem');
    }
};
