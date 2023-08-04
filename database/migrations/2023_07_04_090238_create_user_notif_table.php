<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser_notifTable extends Migration{
    
    public function up(){
        Schema::create('user_notif', function (Blueprint $table) {
            $table->id();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('user_notif');
    }
}