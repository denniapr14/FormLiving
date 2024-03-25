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
}
