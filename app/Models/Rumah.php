<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Rumah extends Model
{
    protected $table = 'rumah';

    protected $primaryKey = 'id_tipe_rumah';

    // SELECT
    public function getRumahAll()
    {
        return Rumah::join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->get();
    }
    public function getRumahProjekAll()
    {
        return Rumah::join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
        ->join('projek','rumah.id_projek','=','projek.id_projek')
            ->get();
    }
    public function getRumahProjekWhereAll($where,$eq,$value)
    {
        return Rumah::join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
        ->join('projek','rumah.id_projek','=','projek.id_projek')
        ->where($where,$eq,$value)
        ->get();
    }

    public function getRumahSelectCountGroupBy()
    {
        return Rumah::select('*','rumah.id_rumah',TipeRumah::raw("COUNT(tipe_rumah.id_tipe_rumah) as countTipe"))
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->leftJoin('tipe_rumah', 'rumah.id_rumah', '=', 'tipe_rumah.id_rumah')
            ->groupBy('rumah.id_rumah')
            ->get();
    }
    public function getRumahSelectCountGroupByWhereAll($where,$eq, $value)
    {
        return Rumah::select('*','rumah.id_rumah',TipeRumah::raw("COUNT(tipe_rumah.id_tipe_rumah) as countTipe"))
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->join('projek','rumah.id_projek','=','projek.id_projek')
            ->leftJoin('tipe_rumah', 'rumah.id_rumah', '=', 'tipe_rumah.id_rumah')
            ->groupBy('rumah.id_rumah')
            ->where($where,$eq,$value)
            ->where('deleted_tr','=','false')
            ->get();
    }

    public function getRumahSelectCountGroupByWhereAllArr($where)
    {
        return Rumah::select('*','rumah.id_rumah',TipeRumah::raw("COUNT(tipe_rumah.id_tipe_rumah) as countTipe"))
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->leftJoin('tipe_rumah', 'rumah.id_rumah', '=', 'tipe_rumah.id_rumah')
            ->groupBy('rumah.id_rumah')
            ->where($where)
            ->get();
    }

    public function getRumahSelectJoinClusterProjek($select,$where)
    {
        return Rumah::select($select)
        ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
        ->join('projek','rumah.id_projek','projek.id_projek')
        ->where($where)
        ->get();
    }
    
    public function firstRumahJoinTipeRumahWhere($select,$where){
        return Rumah::select($select)
        ->join('tipe_rumah','tipe_rumah.id_rumah','tipe_rumah.id_rumah')
        ->where($where)
        ->get();
    }

    public function getRumahWhere($where, $eq, $value)
    {
        return Rumah::select('*')
            ->where($where, $eq, $value)
            ->first();
    }

    public function firstRumahWhereJoinCluster($select,$where, $eq, $value)
    {
        return Rumah::select($select)
        ->join('cluster','rumah.codecluster','cluster.codecluster')
            ->where($where, $eq, $value)
            ->first();
    }
    public function firstRumahWhereJoinClusterArr($select,$where)
    {
        return Rumah::select($select)
        ->join('cluster','rumah.codecluster','cluster.codecluster')
            ->where($where)
            ->first();
    }


    public function getRumahJoinClusterWhere($select, $where, $eq, $value)
    {
        return Rumah::select($select)
        ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
        ->where($where, $eq, $value)
        ->first();

        // $rumah = new Rumah;

        // $rumah->remainHouse();
    }

    public function getRumahJoin($select, $table, $join, $join2)
    {
        return Rumah::select($select)
        ->join($table, $join, '=', $join2)
        ->get();
    }

    public function RemainHouse($where, $value)
    {
        return Rumah::select(Rumah::raw('COUNT(rumah.id_rumah) as count'))
            ->where([
                $where => $value,
            ])
            ->first();
    }
    public function RemainHouseJoinProjek($where)
    {
        return Rumah::select(Rumah::raw('COUNT(rumah.id_rumah) as count'))
            ->join('projek','rumah.id_projek','=','projek.id_projek')
            ->where(
                $where
            )
            ->first();
    }

     // INSERT

     public function insertRumah($dataInput)
     {
         return Rumah::insert(
             $dataInput
         );
     }

     public function insertRumahId($dataInput)
     {
         return Rumah::insertGetId(
             $dataInput
         );
     }

    //  UPDATE
    public function updateRumah($id, $dataInput)
    {
        return Rumah::where('id_rumah', $id)
            ->update(
                $dataInput
            );
    }

    public function getRumahBaseProjekClusterCount($namaProjek){
       return Rumah::join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->select('logo_img', 'nama_img', 'cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', Rumah::raw('COUNT(rumah.id_rumah) as count'))
            ->where('status', '=', 'Available')
            ->where('projek.nama_projek','=',$namaProjek)
            ->groupBy('cluster.nama_cluster')
            ->get();
    }
    public function getCountRumahWithStatus($namaProjek){
        return Rumah::join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
             ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
             ->select('logo_img', 'nama_img', 'cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', Rumah::raw('COUNT(rumah.id_rumah) as count'))
             ->where('projek.nama_projek','=',$namaProjek)
             ->where('status', '=', 'Available')
             ->orWhere('status', '=', 'keepRefundable')
             ->groupBy('cluster.nama_cluster')
             ->get();
     }

    public function RumahPO($idPreOrder){
        return Rumah::join('pre_order','rumah.id_rumah','=','pre_order.id_rumah')
        ->join('user_pelanggan','pre_order.id_pelanggan','=','user_pelanggan.id_pelanggan')
        ->where('pre_order.id_pre_order','=',$idPreOrder)
        ->where('rumah.status','=','Keep')
        ->orWhere('rumah.status','=','KeepRefundable')
        ->first();
    }
}
