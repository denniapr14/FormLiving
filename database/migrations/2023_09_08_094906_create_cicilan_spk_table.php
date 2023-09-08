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
        Schema::create('cicilan_spk', function (Blueprint $table) {
            $table->integer('id_cicilan_spk', true);
            $table->integer('id_spk');
            $table->integer('pembayaran_cs');
            $table->integer('sisa_cs');
            $table->string('img_cs', 300)->nullable();
            $table->date('tgl_bayar_cs');
            $table->timestamp('tgl_input_cs')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cicilan_spk');
    }
};
