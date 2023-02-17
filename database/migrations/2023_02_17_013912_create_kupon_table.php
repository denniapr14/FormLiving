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
        Schema::create('kupon', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_kupon', true);
            $table->string('kode_kupon', 200)->nullable();
            $table->date('tgl_mulai_kupon');
            $table->date('tgl_berakhir_kupon');
            $table->integer('diskon_kupon')->nullable();
            $table->text('keterangan_kupon')->nullable();
            $table->string('status_kupon', 50);
            $table->integer('kuota_kupon')->nullable();
            $table->string('qr_kupon', 200)->nullable();
            $table->timestamp('tgl_input_kupon')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kupon');
    }
};
