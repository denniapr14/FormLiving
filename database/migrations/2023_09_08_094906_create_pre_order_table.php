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
        Schema::create('pre_order', function (Blueprint $table) {
            $table->integer('id_pre_order', true);
            $table->integer('id_user_admin')->nullable();
            $table->integer('id_rumah')->nullable();
            $table->integer('id_pelanggan')->nullable();
            $table->integer('index_po');
            $table->enum('status_po', ['pending', 'rejected', 'userconfirmed', 'overtaken', 'accepted', 'refunded'])->default('pending');
            $table->enum('tipe_booking_po', ['refundable', 'non-refundable'])->nullable();
            $table->dateTime('tgl_input_po')->useCurrent();
            $table->dateTime('tgl_update_po')->nullable();
            $table->dateTime('expire_date')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_order');
    }
};
