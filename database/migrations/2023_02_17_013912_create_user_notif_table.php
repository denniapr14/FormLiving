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
        Schema::create('user_notif', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_notif')->primary();
            $table->integer('id_user_admin');
            $table->integer('id_kategori')->index('id_kategori');
            $table->integer('id_departemen')->index('id_departemen');
            $table->string('function', 50);
            $table->integer('msg_code');
            $table->text('msg_notif');
            $table->timestamp('tgl_notif')->useCurrent();
            $table->enum('status_notif', ['aktif', 'read', '']);
            $table->string('url_notif', 200);

            $table->index(['id_user_admin', 'id_kategori', 'id_departemen'], 'id_user_admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_notif');
    }
};
