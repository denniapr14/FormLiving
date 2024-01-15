<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model{
    protected $table = "checklist";

    public function getChecklistWhere($where){
        return Checklist::select('*')
        ->where($where)
        ->get();

    }

    function getChecklistWhereJoinGroubOrderBy($where,$groubBy,$orderBy) {
        return DB::table('checklist as a')
        ->selectRaw("SUM(subbobot) as percentase,  a.*, r.*, jl.*, sub.*, clus.*, j.*,
        IF(a.id_pengawas1 IS NULL,'N/A',c.nama_ua) as pengawas1,
        IF(a.id_pengawas2 IS NULL,'N/A',b.nama_ua) as pengawas2")
        ->where($where)
        ->leftJoin('user_admin as b', 'b.id_user_admin', '=', 'a.id_pengawas2')
        ->leftJoin('user_admin as c', 'c.id_user_admin', '=', 'a.id_pengawas1')
        ->leftJoin('rumah as r', 'r.id_rumah', '=', 'a.id_rumah')
        ->leftJoin('cluster as clus','r.codecluster','clus.codecluster')
        ->leftJoin('joblist as jl', 'jl.id_joblist', '=', 'a.id_joblist')
        ->leftJoin('subkon as sub', 'sub.id_subkon', '=', 'a.id_subkon')
        ->Join('job as j','jl.id_job','=','j.id_job')
        ->groupBy($groubBy)
        ->orderByRaw($orderBy)
        ->get();
    }

}
