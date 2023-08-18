<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserPelanggan;
use App\Models\UserProjek;

class C_UserPelanggan extends Controller
{
    public $userAdmin;
    public $userNotif;
    public $userProjek;

    public $userPelanggan;
    public $projek;
    public $userMenu;

    public function __construct()
    {
        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->userPelanggan = new UserPelanggan();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
    }

    public function userPelanggan()
    {
        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => session::get('user'),
        ])->collect();

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
        $getUserPelanggan = $this->userPelanggan->getUserPelangganOrderBy('*', 'tgl_input_plgn', 'desc');

        // Surat Pemesanan Rumah == Formulir Pesanan

        // $getRumah = $this->rumah->getRumahSelectCountGroupBy();
        // dd($getRumah);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            return view(
                'V_Admin.userPelanggan',
                compact(
                    'user',
                    'projekUser',

                    'getProjek',
                    'getUserMenu',
                    'getUserPelanggan'
                )
            );
        } else {
            return redirect('/login');
        }
    }
}
