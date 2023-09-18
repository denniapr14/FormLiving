<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model{
    protected $table = "promo";
    protected $primaryKey = "id_promo";

    function getPromoWhere($select, $where,$eq,$value) {
        return Promo::select($select)
        ->where($where,$eq,$value)
        ->first();
    }
    function getPromoWhereAll($select,$where,$eq,$value) {
        return Promo::select($select)
        ->where($where,$eq,$value)
        ->get();
    }

    function getPromoWhereArr($select,$where) {
        return Promo::select($select)
        ->where($where)
        ->first();
    }
    function getPromoWhereAllArr($select,$where) {
        return Promo::select($select)
        ->where($where)
        ->get();
    }
    public static function getAll(){
        return Promo::get();
    }

    public function promoHalamanDepan(){
        return Promo::select('*')
        ->where('status','=','aktif')
        ->where('tipe_promo','=','standart')
        ->get();
    }
    public function firstPromoDataPelanggan($id_rumah,$kode_promo) {
            return Promo::select('*')
            ->join('list_promo','promo.id_promo','list_promo.id_promo')
            ->where('status', '=', "aktif")
            ->where('tipe_promo', '=', "special")
            ->where('kuota_promo','!=',0)
            // ->where('tgl_aktif', '<=', NOW())
            ->where('tgl_berakhir', '>=', NOW())
            ->where([
                'list_promo.id_rumah'   => $id_rumah,
                'promo.kode_promo' => $kode_promo,
        ])->first();

    }


}
