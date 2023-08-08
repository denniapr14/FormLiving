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
        Schema::create('joblist', function (Blueprint $table) {
            $table->integer('id_joblist', true);
            $table->integer('id_job')->index('id_sceklist');
            $table->integer('sort_jl')->nullable();
            $table->string('nama_jl', 300);
            $table->integer('termin_jl');
            $table->enum('status_jl', ['Aktif', 'Nonaktif'])->nullable();
            $table->float('bobot_jl', 10, 0);
            $table->integer('lantai_jl')->nullable();
            $table->timestamp('tgl_input_jl')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joblist');
    }
};
