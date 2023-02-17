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
        Schema::create('ktgr_admin', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_kategori', true);
            $table->string('kategori', 200);
            $table->integer('id_departemen')->nullable()->index('id_departemen');
            $table->timestamp('tgl_input')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ktgr_admin');
    }
};
