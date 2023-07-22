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
        Schema::create('projek', function (Blueprint $table) {
            $table->integer('id_projek', true);
            $table->string('nama_projek', 200)->nullable();
            $table->enum('jenis_projek', ['perumahan'])->default('perumahan');
            $table->string('logo_projek', 200)->nullable();
            $table->dateTime('tgl_input_projek')->useCurrent();
            $table->dateTime('tgl_update_projek')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projek');
    }
};
