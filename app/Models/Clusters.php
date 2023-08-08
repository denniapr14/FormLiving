<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clusters extends Model{
    protected $table = "cluster";

    protected $primaryKey = "codecluster";

    function getClusterAll() {
        return Clusters::select('*')
        ->get();
    }
    function getClusterProjek($select) {
        return Clusters::select($select)
        ->join('projek','cluster.id_projek','=','projek.id_projek')
        ->get();
    }
    function getClusterProjekWhere($select,$where,$eq,$value) {
        return Clusters::select($select)
        ->join('projek','cluster.id_projek','=','projek.id_projek')
        ->where($where,$eq,$value)
        ->get();
    }
}