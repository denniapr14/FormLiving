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
        Schema::table('rincian_pembayaran', function (Blueprint $table) {
            $table->foreign(['id_pem_rumah'], 'rincian_pembayaran_ibfk_1')->references(['id_pem_rumah'])->on('pembayaran_rumah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rincian_pembayaran', function (Blueprint $table) {
            $table->dropForeign('rincian_pembayaran_ibfk_1');
        });
    }
};
