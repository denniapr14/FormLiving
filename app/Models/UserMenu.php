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
}
