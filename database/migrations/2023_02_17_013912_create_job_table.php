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
        Schema::create('job', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_job', true);
            $table->string('nama_job', 100);
            $table->integer('lantai_job')->nullable();
            $table->string('termin_job', 10)->nullable();
            $table->enum('status_job', ['Aktif', 'Nonaktif']);
            $table->timestamp('tgl_input_job')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job');
    }
};
