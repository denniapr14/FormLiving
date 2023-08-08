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
        Schema::table('list_sk_bunga', function (Blueprint $table) {
            $table->foreign(['id_rumah'], 'list_sk_bunga_ibfk_1')->references(['id_rumah'])->on('rumah');
            $table->foreign(['id_bunga'], 'list_sk_bunga_ibfk_2')->references(['id_bunga'])->on('sk_bunga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_sk_bunga', function (Blueprint $table) {
            $table->dropForeign('list_sk_bunga_ibfk_1');
            $table->dropForeign('list_sk_bunga_ibfk_2');
        });
    }
};
