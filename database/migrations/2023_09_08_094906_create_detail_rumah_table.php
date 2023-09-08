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
        Schema::create('detail_rumah', function (Blueprint $table) {
            $table->integer('id_rumah');
            $table->integer('id_detail_rumah');
            $table->string('SPK', 30);
            $table->string('denah_teknik', 200)->nullable();
            $table->string('denah_teknik_2', 200)->nullable();
            $table->enum('status_bangun', ['progress', 'belum', 'selesai']);
            $table->date('tgl_pembangunan');
            $table->integer('lantai_rumah')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_rumah');
    }
};
