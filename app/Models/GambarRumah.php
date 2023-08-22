<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GambarRumah extends Model{
    protected $table = "gambar_rumah";

    function getGambarRumahWhereAll($select, $where,$eq,$value) {
        return GambarRumah::select($select)
        ->where($where,$eq,$value)
        ->get();

    }

    function firstGambarRumah($select,$where)  {
        return GambarRumah::select($select)
        ->where($where)
        ->first();

    }
    function getGambarRumahWhere($select, $where,$eq,$value) {
        return GambarRumah::select($select)
        ->where($where,$eq,$value)
        ->first();

    }
    function getGambarRumahWhereArr($select,$where)  {
        return GambarRumah::select($select)
        ->where($where)
        ->get();
    }
    // public function getGambarRumahSelectCountGroupBy()
    // {
    //     return GambarRumah::select('*',TipeRumah::raw("COUNT(tipe_rumah.id_tipe_rumah) as countGambar"))
    //         ->join('tipe_rumah', 'gambar_rumah.codecluster', '=', 'cluster.codecluster')
    //         ->leftJoin('tipe_rumah', 'rumah.id_rumah', '=', 'tipe_rumah.id_rumah')
    //         ->groupBy('rumah.id_rumah')
    //         ->get();
    // }

    function getGambarRumahJoinTipeRumahGroupBy($select,$where,$group) {
        return GambarRumah::select($select)
        ->join('tipe_rumah','gambar_rumah.id_tipe','tipe_rumah.id_tipe_rumah')
        ->where($where)
        ->groupBy($group)
        ->get();

    }
    function firstGambarRumahJoinTipeRumahGroupBy($select,$where,$group) {
        return GambarRumah::select($select)
        ->join('tipe_rumah','gambar_rumah.id_tipe','tipe_rumah.id_tipe_rumah')
        ->where($where)
        ->groupBy($group)
        ->first();

    }



    function insertGambarRumah($dataInput)
    {
        return GambarRumah::insert(
            $dataInput
        );
    }




}
