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
        Schema::create('closing_form', function (Blueprint $table) {
            $table->integer('id_closing', true);
            $table->integer('id_keep_log')->nullable()->index('id_keep_log');
            $table->integer('id_rumah');
            $table->integer('id_user_admin')->index('id_user_admin');
            $table->integer('id_pelanggan')->index('id_pelanggan');
            $table->integer('id_promo')->nullable()->index('id_promo');
            $table->string('agent_cf', 250)->nullable();
            $table->timestamp('tgl_closing')->useCurrent();
            $table->dateTime('tgl_approve')->nullable();
            $table->enum('on_approve', ['yes', 'no'])->nullable();

            $table->index(['id_rumah', 'id_user_admin', 'id_pelanggan', 'id_promo'], 'id_rumah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('closing_form');
    }
};
