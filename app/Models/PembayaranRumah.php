<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranRumah extends Model{
    protected $table = "pembayaran_rumah";

    function getPembayaranRumahAll(){
        return PembayaranRumah::get();
    }

    function getPembayaranRumahWhereAll($select,$where,$eq,$value)  {
        return PembayaranRumah::select($select)
        ->where($where,$eq,$value)
        ->get();
    }

    function getPembayaranRumahWhereAllArr($select,$where) {
        return PembayaranRumah::select($select)
        ->where($where)
        ->get();
    }

    function firstPembayaranRumahWhere($select,$where,$eq,$value) {
        return PembayaranRumah::select($select)
        ->where($where,$eq,$value)
        ->first();
        }
    function firstPembayaranRumahWhereArr($select,$where) {
        return PembayaranRumah::select($select)
        ->where($where)
        ->first();
    }

}