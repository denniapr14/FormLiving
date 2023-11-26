<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPromo extends Model
{

    protected $table = "list_promo";
    protected $primaryKey = "id_lp";

    function firstListPromo($select,$where,$eq,$value) {
        return ListPromo::select($select)
        ->where($where,$eq,$value)
        ->first();
    }

    function firstListPromoJoinPromoRumah($select,$where,$eq,$value) {
        return ListPromo::select($select)
        ->join('promo','list_promo.id_promo','=','promo.id_promo')
        ->join('rumah','list_promo.id_rumah','=','rumah.id_rumah')
        ->where($where,$eq,$value)
        ->first();
    }
    function getListPromoJoinPromoWherePengisianData($id) {
        return ListPromo::join('promo', 'list_promo.id_promo', '=', 'promo.id_promo')
            ->where('promo.status', '=', "aktif")

            ->where('list_promo.id_rumah', '=', $id)
            ->where('promo.tipe_promo', '=', 'standart')
            ->where('tgl_aktif', '<=', NOW())
            ->where('tgl_berakhir', '>=', NOW())
            ->get();

    }
    function getListPromoJoinPromoRumah($select,$where,$eq,$value)  {
        return ListPromo::select($select)
        ->join('promo','list_promo.id_promo','=','promo.id_promo')
        ->join('rumah','list_promo.id_rumah','=','rumah.id_rumah')
        ->where($where,$eq,$value)
        ->get();
    }
    function deleteListPromo($where, $id) {
        return ListPromo::where($where,$id)
        ->delete();
    }

    function getPromoCostumPromo($getProjek) {
        return ListPromo::select('*')
        ->join('promo', 'list_promo.id_promo', '=', 'promo.id_promo')
        ->leftJoin('cluster', 'list_promo.codecluster', '=', 'cluster.codecluster')
        ->leftJoin('rumah', 'list_promo.id_rumah', '=', 'rumah.id_rumah')
        // ->leftJoin('formulir_pesanan', 'list_promo.id_promo', '=', 'formulir_pesanan.id_promo')
        // ->leftJoin('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
        // ->leftJoin('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
        // ->leftJoin('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
        // ->where('formulir_pesanan.status_fp','!=','nonactive')
        ->where('rumah.id_projek', '=', $getProjek)
        ->orderBy('promo.id_promo', 'desc')
        ->get();

    }
}
