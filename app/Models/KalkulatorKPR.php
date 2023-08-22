<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KalkulatorKPR extends Model{
    protected $table = "kalkulator_kpr";

    function firstKalkulatorKPRArr($select,$where)  {
        return KalkulatorKPR::select($select)
        ->where($where)
        ->first();

    }
    function insertGetIDKalkulatorKPR($data) {
        return KalkulatorKPR::insertGetId(
            $data
        );

    }
}
