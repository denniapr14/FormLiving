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
        Schema::create('session_admin', function (Blueprint $table) {
            $table->integer('id_sess', true);
            $table->string('token_id', 100);
            $table->integer('id_user_admin');
            $table->dateTime('tgl_login_sess');
            $table->enum('status_sess', ['login', 'logout']);
            $table->dateTime('tgl_logout_sess')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_admin');
    }
};
