<?php
namespace App\Http\Controllers;

use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use App\Models\HarianLampuTaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class C_LampuTaman extends Controller{
    public $userAdmin;
    public $userNotif;
    public $userProjek;
    public $projek;
    public $userMenu;
    public $lampuTaman;


    public function __construct()
    {

        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
        $this->lampuTaman = new HarianLampuTaman();
    }

    public function harianLampuTaman($projek)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        //
        $getLampuTaman = $this->lampuTaman->select('*')
        ->join('laporan_rem', 'harian_lampu_taman.id_LREM', '=', 'laporan_rem.id_LREM')
        ->groupBy('harian_lampu_taman.id_LREM')
        ->where('harian_lampu_taman.id_projek', '=', $getProjek->id_projek)
        ->orderBy('laporan_rem.tgl_input_LREM', 'desc')
        ->get();
        // dd($getLampuTaman);
        // $getJob = $getJob->where('id_projek',$getProjek->id_projek)->groupBy('termin_job')->sortBy('termin_job');
        // dd($getJob);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
                'user_menu.status_um' => 'aktif',
                'user_menu.id_kategori' => $user->id_kategori
            ])->collect();
            // dd($getUserMenu);
            $foundMatchingMenu = false;


            foreach ($getUserMenu as $menu) {
                if ($menu->url_menu == request()->segment(1)) {
                    $foundMatchingMenu = true;
                    break;
                }
            }
            if (!$foundMatchingMenu) {
                return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            }


            return view('V_Admin.lampuTaman',
                compact(
                    'user',
                    'projekUser',
                    'getProjek',
                    'getUserMenu',
                    'getLampuTaman'


                )
            );
        } else {
            return redirect('/login');
        }
    }
}
