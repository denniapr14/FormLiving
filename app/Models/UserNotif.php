<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserNotif extends Model{
    protected $table = "user_notif";


    function getUserNotifAll($select){
        return UserNotif::select($select)
           ->all() ;
    }
    function GetUserNotifWhere($select,$where,$eq,$value) {
        return UserNotif::select($select)
        ->where($where,$eq,$value)
        ->get();

    }
    function insertUserNotif($dataInsert)  {
        return UserNotif::insert(
            $dataInsert
        );
    }

}