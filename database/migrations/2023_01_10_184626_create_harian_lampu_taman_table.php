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
        Schema::create('harian_lampu_taman', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_LHR', true);
            $table->integer('id_LREM');
            $table->string('id_LOKREM', 5)->index('id_LOKREM');
            $table->enum('kondisi_LHR', ['oke', 'repair'])->nullable();
            $table->text('keterangan');

            $table->index(['id_LREM', 'id_LOKREM'], 'id_LREM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harian_lampu_taman');
    }
};
