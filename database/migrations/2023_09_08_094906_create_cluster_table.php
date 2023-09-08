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
        Schema::create('cluster', function (Blueprint $table) {
            $table->integer('codecluster', true);
            $table->integer('id_projek')->nullable();
            $table->string('nama_cluster', 40);
            $table->string('nama_img', 200);
            $table->string('logo_img', 200)->nullable();
            $table->string('Description', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cluster');
    }
};
