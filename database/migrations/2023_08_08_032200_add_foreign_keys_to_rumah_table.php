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
        Schema::table('rumah', function (Blueprint $table) {
            $table->foreign(['codecluster'], 'rumah_ibfk_1')->references(['codecluster'])->on('cluster');
            $table->foreign(['id_user_admin'], 'rumah_ibfk_2')->references(['id_user_admin'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rumah', function (Blueprint $table) {
            $table->dropForeign('rumah_ibfk_1');
            $table->dropForeign('rumah_ibfk_2');
        });
    }
};
