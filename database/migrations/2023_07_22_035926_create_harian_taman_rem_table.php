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
        Schema::create('harian_taman_rem', function (Blueprint $table) {
            $table->integer('id_HTREM', true);
            $table->integer('id_LREM');
            $table->string('id_BREM', 5)->index('id_BREM');
            $table->enum('status_lingkungan', ['oke', 'maintenance'])->nullable();
            $table->enum('status_berem', ['oke', 'maintenance'])->nullable();
            $table->enum('status_tanaman', ['oke', 'maintenance'])->nullable();
            $table->text('keterangan')->nullable();

            $table->unique(['id_LREM', 'id_BREM'], 'id_LREM');
            $table->index(['id_LREM', 'id_BREM'], 'id_LREM_3');
            $table->index(['id_LREM', 'id_BREM'], 'id_LREM_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harian_taman_rem');
    }
};
