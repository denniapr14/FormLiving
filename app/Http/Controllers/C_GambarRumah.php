<?php

namespace App\Http\Controllers;


use App\Models\GambarRumah;
use App\Models\UserAdmin;
use App\Models\UserProjek;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class C_GambarRumah extends Controller
{
    public $gambarRumah;
    public $userAdmin;
    public $userProjek;
    public function __construct() {
        $this->gambarRumah = new GambarRumah;

    }
    function changeGambarRumahStatus($status,$id){
            $decryptedID = Crypt::decrypt($id);

            $dataGambar = [
                'status_gr' => $status,
            ];







            DB::table('gambar_rumah')
            ->where('id_gambar_rumah', $decryptedID)
            ->update(
                $dataGambar
            );
            return redirect()->back()->with('success','Gambar rumah telah '.$status);


    }
    //
}