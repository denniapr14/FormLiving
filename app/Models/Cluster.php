<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model{
    protected $table = "cluster";

    protected $primaryKey = "codecluster";

    function getClusterAll() {
        return Cluster::select('*')
        ->get();
    }
    function getClusterProjek($select) {
        return Cluster::select($select)
        ->join('projek','cluster.id_projek','=','projek.id_projek')
        ->get();
    }
    function getClusterProjekWhere($select,$where,$eq,$value) {
        return Cluster::select($select)
        ->join('projek','cluster.id_projek','=','projek.id_projek')
        ->where($where,$eq,$value)
        ->get();
    }
}