<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PelangganProjek extends Model{
    protected $table = "pelanggan_projek";

    function getPelangganProjekJoinProjek($select) {
        return PelangganProjek::select($select)
        ->join('projek', 'pelanggan_projek.id_projek', '=', 'projek.id_projek')
        ->get();

    }
    function getProjectPelangganWhere($where, $eq, $value){
        return PelangganProjek::join('projek', 'pelanggan_projek.id_projek', '=', 'projek.id_projek')
        ->join('user_pelanggan', 'pelanggan_projek.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
        ->where($where, $eq, $value)
        ->get();
    }

    function firstProjectPelangganWhere($where){
        return PelangganProjek::join('projek', 'pelanggan_projek.id_projek', '=', 'projek.id_projek')
        ->join('user_pelanggan', 'pelanggan_projek.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
        ->where($where)
        ->first();
    }

    function getProjectPelangganWhereArr($where){
        return PelangganProjek::join('projek', 'pelanggan_projek.id_projek', '=', 'projek.id_projek')
        ->join('user_pelanggan', 'pelanggan_projek.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
        ->where($where)
        ->get();
    }
    // Insert
    function insertPelangganProjek($data) {
        return PelangganProjek::insert($data);
    }

}
