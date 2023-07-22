<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipe_rumahTable extends Migration{
    
    public function up(){
        Schema::create('tipe_rumah', function (Blueprint $table) {
            $table->id();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('tipe_rumah');
    }
}