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
            $table->integer('id_lsb', true);
            $table->integer('id_rumah');
            $table->integer('id_bunga');

            $table->index(['id_lsb'], 'id_lsb');
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
