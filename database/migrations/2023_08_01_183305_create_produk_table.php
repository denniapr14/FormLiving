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
        Schema::create('produk', function (Blueprint $table) {
            $table->integer('id_produk', true);
            $table->integer('codecluster')->index('codecluster');
            $table->string('tipe_produk', 200)->nullable();
            $table->string('img_produk', 500)->nullable();
            $table->string('img_denah', 500)->nullable();
            $table->string('luas_bangunan', 200)->nullable();
            $table->integer('jml_kamar')->nullable();
            $table->integer('jml_wc')->nullable();
            $table->text('spesifikasi_produk')->nullable();
            $table->enum('status_produk', ['Aktif', 'Nonaktif']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
