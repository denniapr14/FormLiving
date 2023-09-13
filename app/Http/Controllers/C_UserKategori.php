<?php

namespace App\Http\Controllers;

use App\Models\KategoriAdmin;
use App\Models\Menu;
use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class C_UserKategori extends Controller
{
    public $menu;
    public $userAdmin;
    public $userProjek;

    public $userMenu;
    public $projek;
    public $kategori;

    public function __construct()
    {
        $this->menu = new Menu();
        $this->userAdmin = new UserAdmin();
        $this->userProjek = new UserProjek();
        // $this->userProjek = new UserProjek();
        $this->userMenu = new UserMenu();
        $this->projek = new Projek();
        $this->kategori = new KategoriAdmin();
    }

    public function userKategori()
    {
        // $getCluster = $this->cluster->getRumahJoinClusterWhere('*', 'rumah.id_rumah', '=', $id);
        // dd($getRumah);
        $getProjekAll = $this->projek->getProjekAll();

        $getKategoriAll = $this->kategori->getKategori('*');
        $getMenuKategori = $this->userMenu->getUserMenuJoinMenu('*','menu.id_menu','asc');
        $getMenu = $this->menu->getMenuAll('*');
        // $getUserAdminAll = $this->userAdmin->getUserAdminJoinKategoriDepartemen('*', 'tgl_input_ua', 'desc');
        // $getUserProjekFromUser = $this->userProjek->getUserProjekJoinProjek('*');
        // dd($getUserProjekFromUser);



        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            // dd($user);
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

            return view('V_Admin.userKategori',
                compact(
                    'user',
                    'projekUser',
                    'getKategoriAll',
                    'getMenuKategori',
                    'getUserMenu',
                    'getMenu',
                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function updateUserKategoriAction(Request $request, $id)
    {
        // $getCluster = $this->cluster->getRumahJoinClusterWhere('*', 'rumah.id_rumah', '=', $id);
        // dd($getRumah);
        $getUserAdminAll = $this->userAdmin->getUserAdminJoinKategoriDepartemen('*', 'tgl_input_ua', 'desc');
        $getUserMenuAll = $this->userMenu->getUserMenuJoinMenu('*', 'tgl_input_um', 'desc');
        $getMenu = $this->menu->getMenuWhere('*', ['status_menu' => 'fitur'])->collect();
        // dd($getMenu);


        // if (!$foundMatchingMenu) {
        //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // }
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
                'user_menu.status_um' => 'aktif',
                'user_menu.id_kategori' => $user->id_kategori,
            ])->collect();

            $foundMatchingMenu = false;

            foreach ($getUserMenu as $menu) {
                if ($menu->url_menu == request()->segment(1)) {
                    $foundMatchingMenu = true;
                    break;
                }
            }

            $dataInputUserMenu = [];
            if ($request->menu != null) {
                for ($i = 0; $i < count($request->menu); ++$i) {
                    array_push($dataInputUserMenu, [
                        'id_menu' => $request->menu[$i],
                        'id_kategori' => $id,
                        'status_um' => 'aktif',
                    ]);
                }

                $this->userMenu->insertUserMenu($dataInputUserMenu);
            }
            // dd($dataInputUserMenu);




            return redirect()->back()->with('success', 'user '.$request->nama.' berhasil diubah');
        } else {
            return redirect('/login');
        }
    }

    public function changeStatusUserKategori($id)
    {
        $userMenuStatus =$this->userMenu->firstUserMenu('*',['id_user_menu' => $id]);

        $status ="";
        if ($userMenuStatus->status_um == 'aktif') {
           $status = 'nonaktif';
        }else{
            $status = 'aktif';
        }
        $dataUpdateUserMenu = [

            'status_um' => $status,
        ];
        DB::table('user_menu')
            ->where('id_user_menu', $id)
            ->update($dataUpdateUserMenu);
        // $getStatus = 'aaaaaaaaaaaaaaaaaaaaaaaaaa';
        // return response()->json();
        // dd($id);
        return response()->json($userMenuStatus);
        // return redirect()->back()->with('success','User berhasil diubah');

        // } else {
        //     return redirect('/login');
        // }
    }
}
