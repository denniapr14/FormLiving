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
        Schema::create('brosur', function (Blueprint $table) {
            $table->integer('id_brosur', true);
            $table->integer('codecluster')->nullable()->index('codecluster');
            $table->string('nama_brosur', 200)->nullable();
            $table->string('brosur_file', 300);
            $table->enum('status_brosur', ['Aktif', 'Nonaktif']);
            $table->timestamp('tgl_input_brosur')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brosur');
    }
};
