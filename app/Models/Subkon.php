<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subkon extends Model{
    protected $table = "subkon";
    protected $primaryKey = "id_subkon";

    function getSubkon() {
        return Subkon::select('*')

        ->get();

    }
    function getSubkonWhere($where)  {
        return Subkon::select('*')
        ->where($where)
        ->get();

    }
}
