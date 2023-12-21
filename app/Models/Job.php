<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $table = "job";
    protected $primaryKey = "id_job";
    function getJob($select) {
        return
        Job::select($select)
        ->get();

    }

    function getJobWhereGroupBy($select, $where, $group, $sort, $by) {
        return Job::select($select)
        ->where($where)
        ->groupBy($group)
        ->orderBy($sort, $by)
        ->get();

    }

    function firstJob($select,$where)  {
        return Job::select($select)
        ->where($where)
        ->first();
    }

    function insertJob($data) {
        return Job::insert($data);
    }
}
