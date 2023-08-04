<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeRumah extends Model
{
    protected $table = 'tipe_rumah';
    protected $primaryKey = 'id_tipe_rumah';


    // GET

    public function getTipeRumahWhereAll($select, $where, $eq, $value)
    {
        return TipeRumah::select($select)
        ->where($where, $eq, $value)
        ->get();
    }

    public function getTipeRumahWhere($select, $where, $eq, $value)
    {
        return TipeRumah::select($select)
        ->where($where, $eq, $value)
        ->first();
    }
    public function getGambarTipeRumahSelectCountGroupByWhere($where,$eq,$value)
    {
        return TipeRumah::select('*',GambarRumah::raw("COUNT(gambar_rumah.id_tipe) as countGambar"))
            ->join('rumah', 'tipe_rumah.id_rumah', '=', 'rumah.id_rumah')
            ->leftJoin('gambar_rumah', 'gambar_rumah.id_tipe', '=', 'tipe_rumah.id_tipe_rumah')
            ->groupBy('tipe_rumah.id_tipe_rumah')
            // ->where('gambar_rumah.status_gr','!=','nonaktif')
            ->where($where,$eq,$value)
            ->get();
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