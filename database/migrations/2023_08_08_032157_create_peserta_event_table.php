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
        Schema::create('peserta_event', function (Blueprint $table) {
            $table->integer('id_peserta', true);
            $table->string('nama_peserta', 200);
            $table->string('email_peserta', 300);
            $table->string('no_hp_peserta', 30);
            $table->string('status_peserta', 30);
            $table->timestamp('tgl_input')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_event');
    }
};
