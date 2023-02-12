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
        Schema::create('tempat_event', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_tempat', true);
            $table->string('nama_tempat', 200);
            $table->integer('biaya_sewa')->nullable();
            $table->string('status_tempat', 30);
            $table->timestamp('tgl_input_tempat')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempat_event');
    }
};
