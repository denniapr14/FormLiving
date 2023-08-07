<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RincianPembayaran extends Model{
    protected $table = "rincian_pembayaran";

    function getRincianPembayaranAll($select) {
        return RincianPembayaran::select($select)
        ->get();
    }
    function firstRincianPembayaranWhere($select,$where, $eq, $value) {
        return RincianPembayaran::select($select)
        ->where($where,$eq,$value)
        ->first();
    }
    function getRincianPembayaranWhereAll($select,$where, $eq, $value) {
        return RincianPembayaran::select($select)
        ->where($where,$eq,$value)
        ->get();
    }
    function getRincianPembayaranWhereAllArr($select,$where) {
        return RincianPembayaran::select($select)
        ->where($where)
        ->get();
    }
    function firstRincianPembayaranWhereArr($select,$where) {
        return RincianPembayaran::select($select)
        ->where($where)
        ->first();
    }

    function insertRincianPembayaran($dataInput)  {
        return RincianPembayaran::insert(
            $dataInput
        );
    }

}