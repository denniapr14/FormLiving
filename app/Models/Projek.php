<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model{
    protected $table = "projek";

    function getProjekAll() {
        return Projek::select('*')
        ->get();
    }
    function getProjekSelectAll($select) {
        return Projek::select($select)
        ->get();
    }
    function firstProjek($select,$where,$eq, $value) {
        return Projek::select($select)
        ->where($where,$eq,$value)
        ->first();
    }

    // insert
    function insertProjek($data) {
        return Projek::insert($data);
    }

}
