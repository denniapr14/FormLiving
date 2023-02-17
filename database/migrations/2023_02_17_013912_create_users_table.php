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
        Schema::create('users', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_user_admin', true);
            $table->integer('id_kategori')->nullable()->index('id_kategori');
            $table->string('username', 200);
            $table->string('password', 150);
            $table->string('pin_ua', 6);
            $table->string('nama_ua', 250);
            $table->string('email_ua', 250)->nullable();
            $table->string('no_tlp_ua', 30)->nullable();
            $table->text('alamat_ua')->nullable();
            $table->enum('status_ua', ['Nonaktif', 'Aktif']);
            $table->string('foto_ua', 200)->nullable()->default('default.png');
            $table->timestamp('tgl_input_ua')->useCurrent();
            $table->date('last_login')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
