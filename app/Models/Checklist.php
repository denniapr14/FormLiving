<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model{
    protected $table = "checklist";

    public function getChecklistWhere($where){
        return Checklist::select('*')
        ->where($where)
        ->get();

    }


}
