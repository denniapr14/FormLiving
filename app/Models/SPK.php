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
    function getSPKJoinRumahWhereOrder($where,$order,$by){
        return SPK::select('*')
        ->join('rumah','spk.id_rumah','rumah.id_rumah')
        ->join('projek','rumah.id_projek','projek.id_projek')
        ->where($where)
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
    function firstJoinSPK($where) {
        return SPK::select('*')
            ->join('spp', 'spk.id_spp', 'spp.id_spp')
            ->join('user_pelanggan', 'spk.id_pelanggan', 'user_pelanggan.id_pelanggan')
            ->join('formulir_pesanan', 'spk.id_formulir', 'formulir_pesanan.id_formulir')
            ->join('rumah', 'spk.id_rumah', 'rumah.id_rumah')
            ->join('cluster', 'rumah.codecluster', 'cluster.codecluster')
            ->join('projek', 'rumah.id_projek', 'projek.id_projek')
            ->leftJoin('user_admin', 'spk.id_req_pengawas', 'user_admin.id_user_admin')
            ->where($where)
            ->first();
    }

    function firstSPK($where) {
        return SPK::select()
        ->where($where)
        ->first();

    }
}
