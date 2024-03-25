<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SPP extends Model{
    protected $table = "spp";


    protected $primaryKey = 'id_spp';
    public function getSPP() {
        return SPP::select('*')
        ->get();

    }

    public function getSPPWhere($where) {
        return  SPP::select('*')
        ->where($where)
        ->get();

    }
    public function firstSPP($where)  {
        return SPP::select('*')
        ->where($where)
        ->first();
    }

    public function getSPPJoinRumahFormulirPelangganOrder($where, $order,$by) {
        return SPP::select('*')
        ->join('rumah','spp.id_rumah','rumah.id_rumah')
        ->join('projek','rumah.id_projek','projek.id_projek')
        ->join('formulir_pesanan','spp.id_formulir','formulir_pesanan.id_formulir')
        ->join('user_pelanggan','spp.id_pelanggan','user_pelanggan.id_pelanggan')
        ->where($where)
        ->orderBy($order, $by)

        ->get();

    }

    public function firstSPPJoinRumahFormulirPelangganWhere($where) {
        return SPP::selectRaw('*, spp.status_ceo as statusCeoSPP')
        ->join('rumah','spp.id_rumah','rumah.id_rumah')
        ->join('formulir_pesanan','spp.id_formulir','formulir_pesanan.id_formulir')
        ->join('user_pelanggan','spp.id_pelanggan','user_pelanggan.id_pelanggan')
        ->join('user_admin','formulir_pesanan.id_sales','user_admin.id_user_admin')
        ->join('tipe_rumah','formulir_pesanan.id_tipe_rumah','tipe_rumah.id_tipe_rumah')
        ->where($where)
        ->first();

    }

    public function insertSPP($data) {
        return SPP::insert($data);
    }

    public function firstSPPjoinRumahFormulirWhere($where) {
        return SPP::select('*')
        ->join('rumah','spp.id_rumah','rumah.id_rumah')
        ->join('projek','rumah.id_projek','projek.id_projek')
        ->join('formulir_pesanan','spp.id_formulir','formulir_pesanan.id_formulir')
        ->join('user_pelanggan','spp.id_pelanggan','user_pelanggan.id_pelanggan')
        ->where($where)
        ->first();
    }
}
