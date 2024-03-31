<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CicilanSPK extends Model{
    protected $table = "cicilan_spk";

    protected $primaryKey = "id_cicilan_spk";

    function getCicilanSPK() {
        return CicilanSPK::select('*')
        ->get();
    }
    function getCicilanSPKWhere($where)  {
        return CicilanSPK::select('*')
        ->where($where)
        ->get();
    }
    function firstCicilanSPKWhere( $where ) {
        return CicilanSPK::select('*')
        ->where($where)
        ->first();
    }
    function insertCicilanSPK($data)  {
        return CicilanSPK::insert($data);
    }

}
