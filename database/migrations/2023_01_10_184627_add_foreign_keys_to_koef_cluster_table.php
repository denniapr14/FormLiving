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
        Schema::table('koef_cluster', function (Blueprint $table) {
            $table->foreign(['codecluster'], 'koef_cluster_ibfk_1')->references(['codecluster'])->on('cluster');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('koef_cluster', function (Blueprint $table) {
            $table->dropForeign('koef_cluster_ibfk_1');
        });
    }
};
