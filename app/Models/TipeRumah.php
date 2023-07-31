<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeRumah extends Model{
    protected $table = "tipe_rumah";
    protected $primaryKey = "id_tipe_rumah";

    function insertTipeRumahId($dataInput)
    {
        return TipeRumah::insertGetId(
            $dataInput
        );
    }

    function insertTipeRumah($dataInput)
    {
        return Rumah::insert(
            $dataInput
        );
    }
}
