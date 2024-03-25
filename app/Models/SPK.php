<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SPK extends Model{
    protected $table = "spk";

    protected $primaryKey = 'id_spk';

    function getInsertSPK($data) {
        return SPK::insertGetId($data);
    }

    function getSPKOrder($order,$by){
        return SPK::select('*')
        ->join('rumah','spk.id_rumah','rumah.id_rumah')
        ->orderBy($order,$by)
        ->get();
    }

    function getSPKWhereJoinRumahPelanggan($where) {
        return SPK::select('*')
        ->join('rumah','spk.id_rumah','rumah.id_rumah')
        ->join('user_pelanggan','spk.id_pelanggan','user_pelanggan.id_pelanggan')
        ->where($where)
        ->get();

    }

    function firstSPK($where) {
        return SPK::select()
        ->where($where)
        ->first();

    }
}
