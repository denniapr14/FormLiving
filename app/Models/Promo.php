<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model{
    protected $table = "promo";
    protected $primaryKey = "id_promo";

    function getPromoWhere($select, $where,$eq,$value) {
        return Promo::select($select)
        ->where($where,$eq,$value)
        ->first();
    }
    function getPromoWhereAll($select,$where,$eq,$value) {
        return Promo::select($select)
        ->where($where,$eq,$value)
        ->get();
    }

    function getPromoWhereArr($select,$where) {
        return Promo::select($select)
        ->where($where)
        ->first();
    }
    function getPromoWhereAllArr($select,$where) {
        return Promo::select($select)
        ->where($where)
        ->get();
    }
    public static function getAll(){
        return Promo::get();
    }

}