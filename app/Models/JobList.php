<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joblist extends Model
{
    protected $table = "joblist";
    protected $primaryKey = "id_joblist";
    function getJobList($select) {
        return
        Joblist::select($select)
        ->join('job','joblist.id_job','job.id_job')
        ->get();

    }

    function getJoblistWhere($where) {
        return
        Joblist::select('*')
        ->join('job','joblist.id_job','job.id_job')
        ->where($where)
        ->get();
    }

    function firstJob($select,$where)  {
        return Joblist::select($select)
        ->join('job','joblist.id_job','job.id_job')
        ->where($where)
        ->first();
    }

    function insertJobList($data) {
        return Joblist::insert($data);
    }
}
