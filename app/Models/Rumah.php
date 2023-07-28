<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $table = "rumah";

    protected $primaryKey = "id_tipe_rumah";


    // INSERT

    function insertRumah($dataInput)
    {
        return Rumah::insert(
            $dataInput
        );
    }
    function insertRumahId($dataInput)
    {
        return Rumah::insertGetId(
            $dataInput
        );
    }

    // SELECT
    function getRumahAll()
    {

        return Rumah::join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')

            ->get();
    }

    function updateRumah($id, $dataInput)
    {
        return Rumah::where('id_rumah', $id)
            ->update(
                $dataInput
            );
    }

    function getRumahWhere($where, $eq, $value)
    {
        return Rumah::select('*')
            ->where($where, $eq, $value)
            ->first();
    }
    function RemainHouse($where, $value)
    {
        return Rumah::select(Rumah::raw('COUNT(rumah.id_rumah) as count'))
            ->where([

                $where => $value,
            ])
            ->first();
    }
}