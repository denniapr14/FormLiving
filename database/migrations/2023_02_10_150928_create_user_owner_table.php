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
        Schema::create('user_owner', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_user_owner', true);
            $table->string('username_owner', 100);
            $table->string('nama_owner', 150);
            $table->string('email_owner', 200)->nullable();
            $table->string('no_tlp_owner', 30);
            $table->string('password_owner', 150);
            $table->string('foto_owner', 300)->nullable();
            $table->timestamp('tgl_input_owner')->useCurrent();
            $table->enum('status_owner', ['Aktif', 'Nonaktif'])->nullable();
            $table->string('jabatan_owner', 200)->nullable();
            $table->enum('on_owner', ['yes', 'no'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_owner');
    }
};
