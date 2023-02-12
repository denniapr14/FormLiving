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
            $table->comment('');
            $table->integer('id_promo', true);
            $table->integer('codecluster')->index('codecluster');
            $table->string('promo', 300);
            $table->text('keterangan');
            $table->string('img_promo', 500);
            $table->string('status', 50);
            $table->integer('kuota_promo')->nullable();
            $table->integer('diskon_promo')->nullable();
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
