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
        Schema::create('petugas_pu', function (Blueprint $table) {
            $table->integer('id_petugas', true);
            $table->string('nama_pu', 200);
            $table->enum('status_pu', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamp('tgl_input_pu')->useCurrent();

            $table->index(['id_petugas'], 'id_petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas_pu');
    }
};
