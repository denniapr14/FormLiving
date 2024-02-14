<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model{
    protected $table = "checklist";
    protected $primaryKey = "id_checklist";

    public function getChecklistWhere($where){
        return Checklist::select('*')
        ->where($where)
        ->get();

    }

    public function firstChecklistWhere($where)  {
        return Checklist::where($where)
        ->first();
    }


    function getChecklistJoinJoblist($where) {
        return Checklist::selecT("*")
        ->Join('joblist','checklist.id_joblist','joblist.id_joblist')
        ->where($where)
        ->get();

    }
}
