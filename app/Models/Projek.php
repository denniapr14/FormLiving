<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model{
    protected $table = "projek";

    function getProjek() {
        return Projek::get();
    }



}
