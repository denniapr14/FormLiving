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
        Schema::table('closing_form', function (Blueprint $table) {
            $table->foreign(['id_promo'], 'closing_form_ibfk_1')->references(['id_promo'])->on('promo');
            $table->foreign(['id_pelanggan'], 'closing_form_ibfk_3')->references(['id_pelanggan'])->on('userpelanggan');
            $table->foreign(['id_keep_log'], 'closing_form_ibfk_5')->references(['id_keep_log'])->on('keep_log');
            $table->foreign(['id_user_admin'], 'closing_form_ibfk_2')->references(['id_user_admin'])->on('users');
            $table->foreign(['id_rumah'], 'closing_form_ibfk_4')->references(['id_rumah'])->on('rumah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('closing_form', function (Blueprint $table) {
            $table->dropForeign('closing_form_ibfk_1');
            $table->dropForeign('closing_form_ibfk_3');
            $table->dropForeign('closing_form_ibfk_5');
            $table->dropForeign('closing_form_ibfk_2');
            $table->dropForeign('closing_form_ibfk_4');
        });
    }
};
