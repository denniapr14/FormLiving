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
        Schema::create('mediator', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_med', true);
            $table->string('nama_med', 200);
            $table->string('email_med', 200);
            $table->text('no_hp_med');
            $table->string('alamat_med', 200);
            $table->string('ktp_med', 250)->nullable();
            $table->timestamp('tgl_input_med')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mediator');
    }
};
