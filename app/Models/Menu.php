<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $primaryKey = "id_menu";

    function getMenuWhere($select,$where) {
        return Menu::select($select)
        ->where($where)
        ->get();

    }

    function getMenuAll($select) {
        return Menu::select($select)
        ->get();

    }
}
