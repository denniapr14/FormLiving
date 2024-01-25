<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brosur extends Model
{

    protected $table = "brosur";
    protected $primaryKey = "id_brosur";

    function firstBrosur($where){
        return Brosur::select('*')
        ->where($where)
        ->first();

    }
    function getBrosurAll($select) {
        return Brosur::select($select)
        ->get();

    }
    function getBrosurWhere($where) {
        return Brosur::select('*')
        ->where($where)
        ->get();

    }
    function getBrosurAllJoinProjekWhere($select)  {
        return Brosur::select($select)
        ->join('projek','brosur.id_projek','projek.id_projek')
        ->get();
    }
    function insertBrosur($data) {
        return Brosur::insert($data);

    }
}