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
        Schema::table('user_rem', function (Blueprint $table) {
            $table->foreign(['id_rumah'], 'user_rem_ibfk_1')->references(['id_rumah'])->on('rumah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_rem', function (Blueprint $table) {
            $table->dropForeign('user_rem_ibfk_1');
        });
    }
};
