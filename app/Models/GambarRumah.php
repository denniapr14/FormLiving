<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GambarRumah extends Model{
    protected $table = "gambar_rumah";

    function insertGambarRumah($dataInput)
    {
        return GambarRumah::insert(
            $dataInput
        );
    }
}
