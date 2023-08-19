<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserProjek extends Model{
    protected $table = "user_projek";

    function getProjectUserWhere($where, $eq, $value){
        return UserProjek::join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
        ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
        ->where($where, $eq, $value)
        ->get();
    }

    // Insert
    function insertUserProjek($data) {
        return UserProjek::insert($data);
    }

}