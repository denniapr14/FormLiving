<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHatian_lampu_tamanTable extends Migration{
    
    public function up(){
        Schema::create('hatian_lampu_taman', function (Blueprint $table) {
            $table->id();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('hatian_lampu_taman');
    }
}