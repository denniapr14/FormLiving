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
        Schema::table('joblist', function (Blueprint $table) {
            $table->foreign(['id_job'], 'joblist_ibfk_1')->references(['id_job'])->on('job');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('joblist', function (Blueprint $table) {
            $table->dropForeign('joblist_ibfk_1');
        });
    }
};
