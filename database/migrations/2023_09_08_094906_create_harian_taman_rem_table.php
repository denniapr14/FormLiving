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
            $table->integer('id_HTREM');
            $table->integer('id_LREM');
            $table->string('id_BREM', 5);
            $table->enum('status_lingkungan', ['oke', 'maintenance'])->nullable();
            $table->enum('status_berem', ['oke', 'maintenance'])->nullable();
            $table->enum('status_tanaman', ['oke', 'maintenance'])->nullable();
            $table->text('keterangan')->nullable();
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
