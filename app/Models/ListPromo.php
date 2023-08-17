<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPromo extends Model
{

    protected $table = "list_promo";
    protected $primaryKey = "id_lp";

    function firstListPromo($select,$where,$eq,$value) {
        return ListPromo::select($select)
        ->where($where,$eq,$value)
        ->first();
    }

    function firstListPromoJoinPromoRumah($select,$where,$eq,$value) {
        return ListPromo::select($select)
        ->join('promo','list_promo.id_promo','=','promo.id_promo')
        ->join('rumah','list_promo.id_rumah','=','rumah.id_rumah')
        ->where($where,$eq,$value)
        ->first();
    }
    function getListPromoJoinPromoRumah($select,$where,$eq,$value)  {
        return ListPromo::select($select)
        ->join('promo','list_promo.id_promo','=','promo.id_promo')
        ->join('rumah','list_promo.id_rumah','=','rumah.id_rumah')
        ->where($where,$eq,$value)
        ->get();
    }
    function deleteListPromo($where, $id) {
        return ListPromo::where($where,$id)
        ->delete();
    }

}