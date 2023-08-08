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

    function getPreOrderWhereAllJoinProjekUserRumahCluster($select,$where,$eq,$value) {
        return PreOrder::select($select)
        ->join('projek','pre_order.id_projek','=','projek.id_projek')
        ->join('user_admin','pre_order.id_user_admin','=','user_admin.id_user_admin')
        ->join('rumah','pre_order.id_rumah','=','rumah.id_rumah')
        ->join('cluster','rumah.codecluster','=','cluster.codecluster')
        ->where($where,$eq,$value)
        ->get();

    }
    function firstreOrderWhereAllJoinProjekUserRumahCluster($select,$where,$eq,$value) {
        return PreOrder::select($select)
        ->join('projek','pre_order.id_projek','=','projek.id_projek')
        ->join('user_admin','pre_order.id_user_admin','=','user_admin.id_user_admin')
        ->join('rumah','pre_order.id_rumah','=','rumah.id_rumah')
        ->join('cluster','rumah.codecluster','=','cluster.codecluster')
        ->where($where,$eq,$value)
        ->first();

    }

    function firstPreOder($select,$where,$eq,$value) {
        return PreOrder::select($select)
        ->where($where,$eq,$value)
        ->first();

    }
}
