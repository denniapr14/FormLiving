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
        Schema::create('detail_fp', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_dtl_fp', true);
            $table->integer('id_formulir');
            $table->integer('id_dfp');
            $table->text('ket_dfp');
            $table->string('harga_dfp', 150);
            $table->date('date_dfp')->nullable();
            $table->enum('status_dfp', ['aktif', 'nonaktif']);
            $table->timestamp('tgl_input_dfp')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_fp');
    }
};
