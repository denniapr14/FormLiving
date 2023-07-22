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
        Schema::create('user_pelanggan', function (Blueprint $table) {
            $table->integer('id_pelanggan', true);
            $table->integer('id_user_admin')->nullable();
            $table->string('nama_plgn', 150);
            $table->string('username_plgn', 100)->nullable();
            $table->string('password_plgn', 100)->nullable();
            $table->text('alamat_plgn')->nullable();
            $table->string('email_plgn', 150)->nullable();
            $table->string('no_ktp_plgn', 100)->nullable();
            $table->string('no_telp_plgn', 50);
            $table->string('no_wa_plgn', 20)->nullable();
            $table->string('id_line_plgn', 150)->nullable();
            $table->string('id_ig_plgn', 150)->nullable();
            $table->string('npwp_plgn', 50)->nullable();
            $table->string('pekerjaan_plgn', 100)->nullable();
            $table->string('jenis_kelamin_status', 100)->nullable();
            $table->text('status_pernikahan_plgn')->nullable();
            $table->string('tempat_lahir_plgn', 200)->nullable();
            $table->date('tgl_lahir_plgn')->nullable();
            $table->string('qr_code_plgn', 100)->nullable();
            $table->string('foto_ktp', 200)->nullable();
            $table->string('kategori_plgn', 10);
            $table->string('sales_plgn', 200)->nullable();
            $table->enum('status_plgn', ['Follow Up', 'No Deal', 'Hot', 'Closing'])->nullable();
            $table->string('sumber_dana_plgn', 200)->nullable();
            $table->timestamp('tgl_input_plgn')->useCurrent();
            $table->date('tgl_update_plgn')->nullable();
            $table->text('keterangan_plgn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_pelanggan');
    }
};
