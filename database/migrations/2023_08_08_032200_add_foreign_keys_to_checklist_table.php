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
        Schema::table('checklist', function (Blueprint $table) {
            $table->foreign(['id_joblist'], 'checklist_ibfk_1')->references(['id_joblist'])->on('joblist');
            $table->foreign(['id_pengawas2'], 'checklist_ibfk_3')->references(['id_user_admin'])->on('users');
            $table->foreign(['id_pengawas1'], 'checklist_ibfk_2')->references(['id_user_admin'])->on('users');
            $table->foreign(['id_rumah'], 'checklist_ibfk_4')->references(['id_rumah'])->on('rumah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checklist', function (Blueprint $table) {
            $table->dropForeign('checklist_ibfk_1');
            $table->dropForeign('checklist_ibfk_3');
            $table->dropForeign('checklist_ibfk_2');
            $table->dropForeign('checklist_ibfk_4');
        });
    }
};
