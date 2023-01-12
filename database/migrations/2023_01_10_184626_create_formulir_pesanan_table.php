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
        Schema::create('formulir_pesanan', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_formulir', true);
            $table->integer('id_user_admin')->nullable()->index('id_user_admin');
            $table->integer('id_kkpr')->nullable();
            $table->integer('id_pelanggan')->nullable();
            $table->integer('id_rumah');
            $table->integer('id_sales')->nullable();
            $table->integer('id_med')->nullable();
            $table->string('no_fp', 20)->nullable();
            $table->string('sdh_termasuk_fp', 150)->nullable();
            $table->string('blm_termasuk_fp', 150)->nullable();
            $table->string('catatan_khusus', 300)->nullable();
            $table->text('promo_fp')->nullable();
            $table->string('bank_pilihan_fp', 150)->nullable();
            $table->string('spek_fp', 200)->nullable();
            $table->enum('status_fp', ['validated', 'unvalidated', 'nonactive'])->nullable();
            $table->enum('status_market_fp', ['unconfirmed', 'accept', 'denied'])->nullable()->default('unconfirmed');
            $table->dateTime('tgl_market_fp')->nullable();
            $table->enum('status_staf_acc_fp', ['unconfirmed', 'accept', 'denied'])->nullable()->default('unconfirmed');
            $table->dateTime('tgl_staff_acc_fp')->nullable();
            $table->enum('status_acc_fp', ['unconfirmed', 'accept', 'denied'])->nullable()->default('unconfirmed');
            $table->dateTime('tgl_acc_fp')->nullable();
            $table->enum('status_legal_fp', ['unconfirmed', 'accept', 'denied'])->nullable()->default('unconfirmed');
            $table->dateTime('tgl_legal_fp')->nullable();
            $table->enum('status_ceo', ['uncomfirmed', 'accept', 'denied'])->nullable();
            $table->string('ttd_marketing', 200)->nullable();
            $table->string('ttd_staff_acc', 200)->nullable();
            $table->string('ttd_acc', 200)->nullable();
            $table->string('ttd_legal', 200)->nullable();
            $table->string('ttd_ceo', 200)->nullable();
            $table->dateTime('tgl_acc_ceo')->nullable();
            $table->timestamp('tgl_input_fp')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulir_pesanan');
    }
};
