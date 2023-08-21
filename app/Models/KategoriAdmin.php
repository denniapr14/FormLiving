<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriAdmin extends Model{
    protected $table = "ktgr_admin";
    protected $primaryKey = "id_kategori";

    function getKategori($select) {
       return KategoriAdmin::select($select)
        ->get();
    }
}