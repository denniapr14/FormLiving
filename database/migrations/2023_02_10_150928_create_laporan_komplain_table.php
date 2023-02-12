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
        Schema::create('laporan_komplain', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_lapkomplain', true);
            $table->integer('id_user_rem')->nullable()->index('id_kuser');
            $table->string('judul_komplain', 200)->nullable();
            $table->text('deskripsi_komplain');
            $table->string('gambarKomplain1', 150)->nullable();
            $table->string('gambarKomplain2', 150)->nullable();
            $table->string('gambarKomplain3', 150)->nullable();
            $table->string('gambarKomplain4', 150)->nullable();
            $table->string('gambarKomplain5', 150)->nullable();
            $table->string('tiket_komplain', 10);
            $table->enum('status_komplain', ['report', 'progress', 'finish']);
            $table->timestamp('tgl_input_komplain')->nullable()->useCurrent();
            $table->date('tgl_update_komplain')->nullable();

            $table->index(['id_user_rem'], 'id_user_rem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_komplain');
    }
};
