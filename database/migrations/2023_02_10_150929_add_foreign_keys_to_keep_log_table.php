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
        Schema::table('keep_log', function (Blueprint $table) {
            $table->foreign(['id_rumah'], 'keep_log_ibfk_1')->references(['id_rumah'])->on('rumah');
            $table->foreign(['id_pelanggan'], 'keep_log_ibfk_3')->references(['id_pelanggan'])->on('user_pelanggan');
            $table->foreign(['id_user_admin'], 'keep_log_ibfk_2')->references(['id_user_admin'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keep_log', function (Blueprint $table) {
            $table->dropForeign('keep_log_ibfk_1');
            $table->dropForeign('keep_log_ibfk_3');
            $table->dropForeign('keep_log_ibfk_2');
        });
    }
};
