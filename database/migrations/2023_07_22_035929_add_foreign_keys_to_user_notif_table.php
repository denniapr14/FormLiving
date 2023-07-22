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
        Schema::table('user_notif', function (Blueprint $table) {
            $table->foreign(['id_departemen'], 'user_notif_ibfk_3')->references(['id_departemen'])->on('departemen');
            $table->foreign(['id_kategori'], 'user_notif_ibfk_2')->references(['id_kategori'])->on('ktgr_admin');
            $table->foreign(['id_user_admin'], 'user_notif_ibfk_1')->references(['id_user_admin'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_notif', function (Blueprint $table) {
            $table->dropForeign('user_notif_ibfk_3');
            $table->dropForeign('user_notif_ibfk_2');
            $table->dropForeign('user_notif_ibfk_1');
        });
    }
};
