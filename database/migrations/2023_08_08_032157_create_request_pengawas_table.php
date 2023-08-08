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
        Schema::create('request_pengawas', function (Blueprint $table) {
            $table->integer('id_req_pengawas', true);
            $table->integer('id_subkon')->nullable();
            $table->integer('id_spp')->nullable();
            $table->integer('id_pengawas1')->nullable();
            $table->enum('status_req_pengawas', ['pengajuan', 'progress', 'selesai'])->nullable();
            $table->enum('status_ceo_req_pengawas', ['belum', 'sudah']);
            $table->dateTime('tgl_input_req_pengawas')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_pengawas');
    }
};
