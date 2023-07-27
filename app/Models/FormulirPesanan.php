<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormulirPesanan extends Model{
    protected $table = "formulir_pesanan";

    function getFormulirPesananJoin5Where($where, $eq, $value, $order, $orderby)  {
        return  FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
         ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
         ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
         ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
         ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
         ->where($where, $eq, $value)
         ->orderBy($order, $orderby)
         ->get();
     }

     function getFormulirPesananJoin5Count() {
        return FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
        ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
        ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
        ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
        ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
        ->select(FormulirPesanan::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
        ->first();

    }
    function getFormulirPesananJoin5CountWhere($where, $value){
        return FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
        ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
        ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
        ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
        ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
        ->whereMonth($where, $value)
        ->select(FormulirPesanan::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
        ->first();
    }

}