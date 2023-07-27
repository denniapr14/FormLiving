<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model{
    protected $table = "rumah";

    protected $primaryKey = "id_tipe_rumah";


    function getRumahAll() {

        return Rumah::join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')

        ->get();

    }

    function RemainHouse($where, $value) {
        Return Rumah::select(Rumah::raw('COUNT(rumah.id_rumah) as count'))
        ->where([

            $where => $value,
        ])
        ->first();
    }
}