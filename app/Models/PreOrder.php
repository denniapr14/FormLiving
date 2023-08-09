<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreOrder extends Model{
    protected $table = "pre_order";

    function getPreOderAll($select){
        return PreOrder::select($select)
        ->get();
    }
    function getPreOrderWhereAll($select,$where,$eq, $value) {
        return PreOrder::select($select)
        ->where($where,$eq,$value)
        ->get();
    }

    function getPreOrderWhereAllJoinProjekUserRumahClusterPelangganKategoriUser($select,$where,$eq,$value) {
        return PreOrder::select($select)
        ->join('user_admin','pre_order.id_user_admin','=','user_admin.id_user_admin')
        ->join('ktgr_admin','user_admin.id_kategori','=','ktgr_admin.id_kategori')
        ->join('rumah','pre_order.id_rumah','=','rumah.id_rumah')
        ->join('projek','rumah.id_projek','=','projek.id_projek')
        ->join('cluster','rumah.codecluster','=','cluster.codecluster')
        ->join('user_pelanggan','pre_order.id_pelanggan','=','user_pelanggan.id_pelanggan')
        ->where($where,$eq,$value)
        ->get();

    }
    function getPreOrderWhereAllOrderByJoinProjekUserRumahClusterPelangganKategoriUser($select,$where,$eq,$value,$order,$by) {
        return PreOrder::select($select)
        ->join('user_admin','pre_order.id_user_admin','=','user_admin.id_user_admin')
        ->join('ktgr_admin','user_admin.id_kategori','=','ktgr_admin.id_kategori')
        ->join('rumah','pre_order.id_rumah','=','rumah.id_rumah')
        ->join('projek','rumah.id_projek','=','projek.id_projek')
        ->join('cluster','rumah.codecluster','=','cluster.codecluster')
        ->join('user_pelanggan','pre_order.id_pelanggan','=','user_pelanggan.id_pelanggan')
        ->where($where,$eq,$value)
        ->orderBy($order,$by)
        ->get();

    }
    function firstreOrderWhereAllJoinProjekUserRumahClusterPelangganKategoriUser($select,$where,$eq,$value) {
        return PreOrder::select($select)
        ->join('user_admin','pre_order.id_user_admin','=','user_admin.id_user_admin')
        ->join('ktgr_admin','user_admin.id_kategori','=','ktgr_admin.id_kategori')
        ->join('rumah','pre_order.id_rumah','=','rumah.id_rumah')
        ->join('projek','rumah.id_projek','=','projek.id_projek')
        ->join('cluster','rumah.codecluster','=','cluster.codecluster')
        ->join('user_pelanggan','pre_order.id_pelanggan','=','user_pelanggan.id_pelanggan')
        ->where($where,$eq,$value)
        ->first();

    }

    function firstPreOder($select,$where,$eq,$value) {
        return PreOrder::select($select)
        ->where($where,$eq,$value)
        ->first();

    }
}