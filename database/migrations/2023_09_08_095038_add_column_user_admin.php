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
            //
            $table->enum('deleted_ua',['true','false'])->default('false');
            $table->dateTime('deleted_ua_at')->nullable();
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
            //
        });
    }
};
