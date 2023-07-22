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
        Schema::create('agent_pelanggan', function (Blueprint $table) {
            $table->integer('id_keep', true);
            $table->integer('id_user_admin')->nullable()->index('id_user_admin');
            $table->string('nama_keep', 150);
            $table->text('alamat_keep')->nullable();
            $table->string('email_keep', 150)->nullable();
            $table->string('no_telp_keep', 50)->nullable();
            $table->string('no_wa_keep', 20)->nullable();
            $table->string('id_line_keep', 150)->nullable();
            $table->string('id_ig_keep', 150)->nullable();
            $table->string('qr_code_keep', 100);
            $table->timestamp('tgl_input_keep')->useCurrent();
            $table->date('tgl_update_keep')->nullable();
            $table->text('keterangan_keep')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_pelanggan');
    }
};
