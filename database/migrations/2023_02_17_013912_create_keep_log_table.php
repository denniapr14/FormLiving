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
        Schema::create('keep_log', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_keep_log', true);
            $table->integer('id_rumah')->index('id_rumah');
            $table->integer('id_user_admin')->index('id_user_admin');
            $table->integer('id_pelanggan')->index('id_pelanggan');
            $table->timestamp('waktu_update_keep')->useCurrent();
            $table->timestamp('admin_approval_date')->useCurrentOnUpdate()->nullable();
            $table->enum('on_approve', ['unconfirmed', 'accept', 'denied', 'closing', 'invalid'])->nullable();
            $table->enum('status_booking', ['keep', 'hold'])->default('keep');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keep_log');
    }
};
