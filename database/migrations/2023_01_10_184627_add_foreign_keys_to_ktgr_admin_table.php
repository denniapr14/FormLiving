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
        Schema::table('ktgr_admin', function (Blueprint $table) {
            $table->foreign(['id_departemen'], 'ktgr_admin_ibfk_1')->references(['id_departemen'])->on('departemen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ktgr_admin', function (Blueprint $table) {
            $table->dropForeign('ktgr_admin_ibfk_1');
        });
    }
};
