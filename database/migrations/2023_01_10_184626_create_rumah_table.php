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
            $table->comment('');
            $table->integer('id_rumah', true);
            $table->string('blok', 40);
            $table->string('nomor', 40);
            $table->integer('codecluster')->index('codecluster');
            $table->integer('id_user_admin')->nullable()->index('id_user_admin');
            $table->integer('tipe')->nullable();
            $table->integer('luas_tanah')->nullable();
            $table->enum('status', ['Available', 'Sold', 'Keep', 'onProgress', 'Undeveloped', 'Hold']);
            $table->enum('status_pembangunan', ['No', 'Yes', 'Finish']);
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
