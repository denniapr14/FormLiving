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
        Schema::create('rumah', function (Blueprint $table) {
            $table->integer('id_rumah', true);
            $table->integer('id_projek')->nullable();
            $table->string('blok', 40)->nullable();
            $table->string('nomor', 40)->nullable();
            $table->integer('codecluster')->nullable()->index('codecluster');
            $table->integer('id_user_admin')->nullable()->index('id_user_admin');
            $table->integer('tipe')->nullable();
            $table->integer('luas_tanah')->nullable();
            $table->enum('status', ['Undeveloped', 'Available', 'Keep', 'Hold', 'onProgress', 'Sold', 'keepRefundable']);
            $table->enum('status_stock', ['Ready', 'Inden', 'OldData'])->nullable()->default('OldData');
            $table->string('va_rumah', 50)->nullable();
            $table->string('img_rumah', 200)->nullable();
            $table->enum('status_pembangunan', ['No', 'Yes', 'Finish'])->default('No');
            $table->timestamp('waktu_update_status')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rumah');
    }
};
