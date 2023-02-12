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
        Schema::create('sk_bunga', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_bunga', true);
            $table->string('nama_bank', 50)->nullable();
            $table->double('persentase')->nullable();
            $table->enum('status_bunga', ['Aktif', 'Non-aktif'])->default('Aktif');
            $table->timestamp('tgl_input_bunga')->nullable()->useCurrent();
            $table->timestamp('tgl_update_bunga')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sk_bunga');
    }
};
