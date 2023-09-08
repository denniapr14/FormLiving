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
        Schema::create('promo', function (Blueprint $table) {
            $table->integer('id_promo', true);
            $table->integer('codecluster')->nullable()->index('codecluster');
            $table->integer('id_rumah')->nullable();
            $table->string('promo', 300);
            $table->enum('tipe_promo', ['standart', 'special'])->default('standart');
            $table->string('kode_promo', 7)->nullable();
            $table->text('keterangan');
            $table->string('img_promo', 500);
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->integer('kuota_promo')->nullable();
            $table->integer('diskon_promo')->nullable();
            $table->enum('bphtb_promo', ['yes', 'no']);
            $table->enum('freekpr_promo', ['yes', 'no']);
            $table->enum('extra_cicilan', ['yes', 'no']);
            $table->integer('jumlah_extra_cicilan')->nullable();
            $table->date('tgl_aktif')->nullable();
            $table->date('tgl_berakhir')->nullable();
            $table->timestamp('tgl_input')->useCurrent();

            $table->index(['codecluster'], 'codecluster_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo');
    }
};
