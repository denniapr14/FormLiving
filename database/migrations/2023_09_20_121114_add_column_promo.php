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
        Schema::table('promo', function (Blueprint $table) {
            //
            $table->enum('jenis_promo',['KPR','Cicilan','All'])->default('All')->after('promo');
            $table->enum('status_diskon',['persen','rupiah'])->default('rupiah')->after('kuota_promo');
            $table->enum('status_max_diskon',['persen','rupiah'])->default('rupiah')->after('diskon_promo');
            $table->number('max_diskon')->nullable(true)->after('status_max_diskon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promo', function (Blueprint $table) {
            //


        });
    }
};
