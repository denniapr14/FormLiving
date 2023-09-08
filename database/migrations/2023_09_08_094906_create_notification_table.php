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
        Schema::create('notification', function (Blueprint $table) {
            $table->integer('id_notif', true);
            $table->integer('id_kategori')->index('id_kategori');
            $table->integer('id_user_admin')->index('id_user');
            $table->string('jdl_notif', 300);
            $table->text('isi_notif');
            $table->string('status_notif', 200);
            $table->timestamp('tgl_notif')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification');
    }
};
