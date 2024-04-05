<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HarianLampuTaman extends Model{
    protected $table = "harian_lampu_taman";

    function LHRall(){
        return HarianLampuTaman::select('*')
        ->where('tipe_laporan', '=', 'LHR')
        ->orderBy('id_harian_lampu_taman', 'desc')
        ->get();
    }

    function LHRDetail($id){
        return HarianLampuTaman::join('laporan_rem')
        ->where('id_harian_lampu_taman', '=', $id)
        ->where('tipe_laporan', '=', 'LHR')
        ->get();
    }

    function LHRToday(){
        return HarianLampuTaman::select('*')
        ->where('tipe_laporan', '=', 'LHR')
        ->where('tgl_input_LREM', '=', CURRENT_DATE())
        ->orderBy('tgl_input_LREM', 'desc')
        ->get();
    }

    function AspekView($id){
        return DB::table('aspek_penilaian_rem')
        ->select('*')
        ->orderBy('id_AP', 'asc')
        ->get();
    }
}
