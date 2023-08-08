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
            $table->integer('id_notif', true);
            $table->integer('id_user_admin')->nullable();
            $table->integer('id_kategori')->nullable()->index('id_kategori');
            $table->integer('id_departemen')->nullable()->index('id_departemen');
            $table->string('function', 50)->nullable();
            $table->integer('msg_code')->nullable();
            $table->text('msg_notif')->nullable();
            $table->enum('status_notif', ['aktif', 'read', ''])->default('aktif');
            $table->string('url_notif', 200)->nullable();
            $table->timestamp('tgl_notif')->useCurrent();

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
