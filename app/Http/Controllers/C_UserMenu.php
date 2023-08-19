<?php

namespace App\Http\Controllers;

use App\Models\UserMenu;
use App\Models\Menu;
use App\Models\UserAdmin;
use App\Models\UserProjek;
use App\Models\Projek;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;

class C_UserMenu extends Controller
{
    //
    public $menu;
    public $userAdmin;
    public $userProjek;

    public $userMenu;
    public $projek;
    public function __construct() {
        $this->menu = new Menu();
        $this->userAdmin = new UserAdmin();
        $this->userProjek = new UserProjek();
        $this->userProjek = new UserProjek();
        $this->userMenu = new UserMenu();
        $this->projek = new Projek();
    }
    function userMenu() {

        // $getCluster = $this->cluster->getRumahJoinClusterWhere('*', 'rumah.id_rumah', '=', $id);
        // dd($getRumah);
        $getProjekAll = $this->projek->getProjekAll();
        $getUserAdminAll = $this->userAdmin->getUserAdminJoinKategoriDepartemen('*','tgl_input_ua','desc');
        $getUserMenuAll = $this->userMenu->getUserMenuJoinMenu('*','tgl_input_um','desc');
        $getMenu = $this->menu->getMenuWhere('*',['status_menu' => 'fitur'])->collect();
        // dd($getMenu);
        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => Session::get('user'),
        ])->collect();

        $foundMatchingMenu = false;

        foreach ($getUserMenu as $menu) {
            if ($menu->url_menu == request()->segment(1)) {
                $foundMatchingMenu = true;
                break;
            }
        }

        // if (!$foundMatchingMenu) {
        //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // }
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));


        return view(
                'V_Admin.userMenu',
                compact(
                    'user',
                    'projekUser',
                    'getUserMenu',
                    'getUserAdminAll',
                    'getUserMenuAll',
                    'getMenu'
                )
        );
        } else {
            return redirect('/login');
        }
    }

    function updateUserMenuAction(Request $request,$id) {

        // $getCluster = $this->cluster->getRumahJoinClusterWhere('*', 'rumah.id_rumah', '=', $id);
        // dd($getRumah);
        $getUserAdminAll = $this->userAdmin->getUserAdminJoinKategoriDepartemen('*','tgl_input_ua','desc');
        $getUserMenuAll = $this->userMenu->getUserMenuJoinMenu('*','tgl_input_um','desc');
        $getMenu = $this->menu->getMenuWhere('*',['status_menu' => 'fitur'])->collect();
        // dd($getMenu);
        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => Session::get('user'),
        ])->collect();

        $foundMatchingMenu = false;

        foreach ($getUserMenu as $menu) {
            if ($menu->url_menu == request()->segment(1)) {
                $foundMatchingMenu = true;
                break;
            }
        }

        // if (!$foundMatchingMenu) {
        //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // }
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            $dataUpdateUser = [
                'code_id_ua' => $request->code,
                'nama_ua'   => $request->nama,
                'email_ua'  => $request->email,
                'no_tlp_ua' => $request->noTelp,
                'alamat_ua' => $request->alamat,
                'tgl_lahir_ua'  => $request->tglLahir,
                'tempat_lahir_ua'   => $request->tempatLahir,
                'status_ua'         => $request->statusUser,


            ];
            $dataInputUserMenu = [];
            if ($request->menu!=null) {
                for ($i=0; $i <count($request->menu) ; $i++) {
                    array_push($dataInputUserMenu,[
                        'id_menu'   =>$request->menu[$i],
                        'id_user_admin' => $id,
                        'status_um'     => 'aktif'
                    ]);

                }
                $this->userMenu->insertUserMenu($dataInputUserMenu);

            }
            DB::table('user_admin')
            ->where('id_user_admin',$id)
            ->update($dataUpdateUser);

            return redirect()->back()->with('success','user '.$request->nama.' berhasil diubah');


        } else {
            return redirect('/login');
        }
    }
    function changeStatusUserMenu($id,$status) {

        // $getUserAdminAll = $this->userAdmin->getUserAdminJoinKategoriDepartemen('*','tgl_input_ua','desc');
        // $getUserMenuAll = $this->userMenu->getUserMenuJoinMenu('*','tgl_input_um','desc');
        // $getMenu = $this->menu->getMenuWhere('*',['status_menu' => 'fitur'])->collect();
        // // dd($getMenu);
        // $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
        //     'user_menu.status_um' => 'aktif',
        //     'user_menu.id_user_admin' => Session::get('user'),
        // ])->collect();

        // $foundMatchingMenu = false;

        // foreach ($getUserMenu as $menu) {
        //     if ($menu->url_menu == request()->segment(1)) {
        //         $foundMatchingMenu = true;
        //         break;
        //     }
        // }

        // // if (!$foundMatchingMenu) {
        // //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // // }
        // if (session()->has('user')) {
        //     $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

        //     $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            $dataUpdateUserMenu = [
                'id_user_menu'  => $id,
                'status_um'     =>$status

            ];
            DB::table('user_menu')
            ->where('id_user_menu',$id)
            ->update($dataUpdateUserMenu);
            // return response()->json();
            return response()->json(['success' => true]);
            // return redirect()->back()->with('success','User berhasil diubah');


        // } else {
        //     return redirect('/login');
        // }
    }


}