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
        Schema::create('pembayaran_rumah', function (Blueprint $table) {
            $table->integer('id_pem_rumah', true)->unique('id_pem_rumah');
            $table->integer('id_rumah')->nullable();
            $table->integer('id_formulir')->nullable();
            $table->integer('id_pelanggan')->nullable();
            $table->string('detail_pr', 200)->nullable();
            $table->double('harga_pr')->nullable();
            $table->double('sisa_pr');
            $table->date('tgl_pr')->nullable();
            $table->enum('status_pr', ['belum', 'sudah', 'kurang'])->nullable();
            $table->timestamp('tgl_input_pr')->useCurrent();

            $table->primary(['id_pem_rumah']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_rumah');
    }
};
