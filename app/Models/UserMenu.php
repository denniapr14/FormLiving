<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model
{
    protected $table = "user_menu";
    protected $primaryKey = "id_user_menu";

    function getUserMenuWhere($select,$where,$eq,$value) {
        return UserMenu::select($select)
        ->join('menu','user_menu.id_menu','=','menu.id_menu')
        ->where($where,$eq,$value)
        ->get();
    }
    function getUserMenuWhereArr($select,$where) {
        return UserMenu::select($select)
        ->join('menu','user_menu.id_menu','=','menu.id_menu')
        ->where($where)
        ->get();
    }
    function getUserMenuJoinMenu($select,$order,$by) {
        return UserMenu::select($select)
        ->join('menu','user_menu.id_menu','menu.id_menu')
        ->orderBy($order,$by)
        ->get();

    }
    function getUserMenuWhereJoinMenu($select,$where,$order,$by) {
        return UserMenu::select($select)
        ->join('menu','user_menu.id_menu','menu.id_menu')
        ->where($where)
        ->orderBy($order,$by)
        ->get();

    }

    // INSERT...................................
    function insertUserMenu($data)  {
        return UserMenu::insert($data);
    }
}