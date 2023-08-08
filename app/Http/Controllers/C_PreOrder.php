<?php

namespace App\Http\Controllers;

// Model
use App\Models\UserAdmin;
use App\Models\UserProjek;
use App\Models\Projek;
use App\Models\Rumah;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class C_PreOrder extends Controller
{
    public $userAdmin;
    public $userProjek;
    public $projek;
    public $rumah;
    public function __construct() {
        $this->userAdmin = new UserAdmin;
        $this->userProjek = new UserProjek;
        $this->projek = new Projek;
        $this->rumah = new Rumah;
    }
    //
    function Preorder($projek) {

        $getProjek = $this->projek->firstProjek('*','nama_projek','=',$projek);
        $rumah = $this->rumah->getRumahProjekWhereAll('projek.nama_projek','=',$projek);
        // dd($getProjek);
        // $getRumah = $this->rumah->getRumahSelectCountGroupBy();
        // dd($getRumah);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            return view('V_Admin.preOrder',
                compact(
                    'user',
                    'projekUser',

                    'rumah',
                    'getProjek'
                )
            );
        } else {
            return redirect('/login');
        }
    }
}