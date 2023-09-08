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
        Schema::create('koef_cluster', function (Blueprint $table) {
            $table->integer('id_koef', true);
            $table->integer('codecluster')->nullable()->index('codecluster');
            $table->string('nama', 100);
            $table->double('koef_A');
            $table->timestamp('tgl_input')->useCurrent();
            $table->string('status', 20)->nullable();
            $table->double('koef_B');
            $table->double('koef_D');
            $table->double('koef_F');
            $table->double('koef_G');
            $table->double('koef_H');
            $table->timestamp('tgl_input_cluster')->useCurrent();
            $table->timestamp('tgl_update_cluster')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koef_cluster');
    }
};
