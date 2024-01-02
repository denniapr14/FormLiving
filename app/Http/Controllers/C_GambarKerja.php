<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobList;
use App\Models\Job;
use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use App\Models\Rumah;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class C_GambarKerja extends Controller
{
    //

    public $userAdmin;
    public $userNotif;
    public $userProjek;
    public $projek;
    public $userMenu;
    public $job;
    public $joblist;
    public $rumah;
    public function __construct()
    {
        $this->job = new Job();
        $this->joblist = new JobList();
        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
        $this->rumah = new Rumah();
    }
    public function getGambarKerja($projek) {
        $getRumah = $this->rumah->getRumahSelectCountGroupByWhereAll('projek.nama_projek', '=', $projek)->collect();
        $getRumah = $getRumah->where('status','Sold');
        // dd($getRumah);

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

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

            return view(
                'V_Admin.gambarKerja',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                    'getProjek',
                    'getUserMenu'

                )
            );
        } else {
            return redirect('/login');
        }
    }
}
