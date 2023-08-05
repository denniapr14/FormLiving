<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembayaranRumah;
use App\Models\UserAdmin;
use App\Models\UserProjek;


use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class C_PembayaranRumah extends Controller
{
    public $pembayaranRumah;
    public $userAdmin;
    public $userProjek;
    public function __construct() {
        $this->pembayaranRumah = new PembayaranRumah;
        $this->userAdmin = new UserAdmin;
        $this->userProjek =  new UserProjek;
    }
    //
    function updatePembayaranRumah($id)  {

           $decryptedID = Crypt::decrypt($id);
        $getPembayaranRumah = $this->pembayaranRumah->firstPembayaranRumahWhere('*','id_pem_rumah','=',$decryptedID);
        // dd($getPembayaranRumah);
        if (session()->has('user')) {

            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            return view('V_Admin.editPembayaranRumah', compact(
                'user',
                'projekUser',
                'getPembayaranRumah',
            ));
        } else {

            return redirect('/login');
        }
    }
}