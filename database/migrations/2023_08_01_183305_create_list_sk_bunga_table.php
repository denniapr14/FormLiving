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
        Schema::create('list_sk_bunga', function (Blueprint $table) {
            $table->integer('id_rumah');
            $table->integer('id_bunga')->index('id_bunga');

            $table->index(['id_rumah', 'id_bunga'], 'id_rumah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_sk_bunga');
    }
};
