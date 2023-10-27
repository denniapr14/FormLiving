<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $table = "Job";
    protected $primaryKey = "id_job";
    function getJob($select) {
        return
        Job::select($select)
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
