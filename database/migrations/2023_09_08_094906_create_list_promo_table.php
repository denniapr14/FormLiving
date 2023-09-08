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
        Schema::create('list_promo', function (Blueprint $table) {
            $table->integer('id_lp', true);
            $table->integer('id_promo');
            $table->integer('codecluster')->nullable();
            $table->integer('id_rumah')->nullable();

            $table->index(['id_promo', 'id_rumah'], 'id_promo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_promo');
    }
};
