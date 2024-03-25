<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_SPK extends Model
{
    protected $table = "img_spk";
    protected $primaryKey = "id_img_spk";

    function getImageSPK($where)  {
        return Image_SPK::select('*')
        ->where($where)
        ->get();

    }
}
