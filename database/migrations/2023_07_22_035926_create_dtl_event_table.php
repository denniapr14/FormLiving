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
        Schema::create('dtl_event', function (Blueprint $table) {
            $table->integer('id_dtl_event', true);
            $table->integer('id_event')->nullable();
            $table->integer('id_peserta')->nullable();
            $table->string('img_bukti', 300)->nullable();
            $table->string('status_pembayaran', 30);
            $table->integer('nomor_peserta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dtl_event');
    }
};
