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
        Schema::create('user_rem', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_user_rem', true);
            $table->integer('id_rumah')->nullable()->index('id_rumah');
            $table->string('nama_userrem', 150);
            $table->string('email_userrem', 200)->nullable();
            $table->string('username_userrem', 150);
            $table->string('password_userrem', 100);
            $table->enum('status_userrem', ['aktif', 'nonaktif']);
            $table->string('foto_userrem', 200)->nullable();
            $table->string('no_telp_userrem', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_rem');
    }
};
