<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeRumah extends Model
{
    protected $table = 'tipe_rumah';
    protected $primaryKey = 'id_tipe_rumah';

    // GET
    public function getTipeRumahWhere($select, $where, $eq, $value)
    {
        return TipeRumah::select($select)
        ->where($where, $eq, $value)
        ->first();
    }

    // Insert
    public function insertTipeRumahId($dataInput)
    {
        return TipeRumah::insertGetId(
            $dataInput
        );
    }

    public function insertTipeRumah($dataInput)
    {
        return Rumah::insert(
            $dataInput
        );
    }
}
