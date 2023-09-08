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
        Schema::table('user_admin', function (Blueprint $table) {
            $table->foreign(['id_kategori'], 'user_admin_ibfk_1')->references(['id_kategori'])->on('ktgr_admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_admin', function (Blueprint $table) {
            $table->dropForeign('user_admin_ibfk_1');
        });
    }
};
