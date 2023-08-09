<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_projek extends Model{
    protected $table = "user_projek";
    
    function getUserAdminListAllFromSession($namaSesi){
       return User_projek::join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
        ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
        ->where('user_admin.id_user_admin', '=', $namaSesi)
        ->get();
    }
}