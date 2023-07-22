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
        Schema::table('detail_rumah', function (Blueprint $table) {
            $table->foreign(['id_rumah'], 'detail_rumah_ibfk_1')->references(['id_rumah'])->on('rumah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_rumah', function (Blueprint $table) {
            $table->dropForeign('detail_rumah_ibfk_1');
        });
    }
};
