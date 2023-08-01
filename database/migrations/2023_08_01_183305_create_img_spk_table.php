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
        Schema::create('img_spk', function (Blueprint $table) {
            $table->integer('id_img_spk', true);
            $table->integer('id_spk')->nullable();
            $table->string('img_spk', 250)->nullable();
            $table->enum('status_ipk', ['Aktif', 'Nonaktif'])->nullable();
            $table->dateTime('tgl_input_ispk')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('img_spk');
    }
};
