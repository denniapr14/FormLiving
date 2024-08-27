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

    function firstPembayaranRumahWhereMonthAndYearArr($select,$where,$whereMonth,$valueMonth,$whereYear,$valueYear) {
        return PembayaranRumah::select($select)
        ->where($where)
        ->whereMonth($whereMonth,$valueMonth)
        ->whereYear($whereYear,$valueYear)
        ->first();
    }

    function getPembayaranRumahRincianJoinWhereAll($select,$where,$eq,$value)  {
       return PembayaranRumah::select($select)
       ->join('rincian_pembayaran', 'pembayaran_rumah.id_pem_rumah', '=', 'rincian_pembayaran.id_pem_rumah')
        ->where($where, $eq, $value)
        ->get();
    }
    // INSERT
    function insertPembayaranRumah($data) {

        return PembayaranRumah::insert(
            $data
        );

    }


}
