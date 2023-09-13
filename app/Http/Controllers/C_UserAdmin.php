<?php

namespace App\Http\Controllers;

use App\Models\KategoriAdmin;
use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use PDF;

class C_UserAdmin extends Controller
{
    public $userAdmin;
    public $projek;
    public $userProjek;
    public $userMenu;
    public $kategori;


    public function __construct()
    {
        $this->kategori = new KategoriAdmin();
        $this->userAdmin = new UserAdmin;
        $this->userProjek = new UserProjek;
        $this->userMenu = new UserMenu();
        $this->projek = new Projek();
    }

    public function ambilWaktu()
    {
        $waktuNow = Carbon::now()->locale('id');
        $waktuNow = $waktuNow->settings(['formatFunction' => 'translatedFormat']);
        $waktuNow = $waktuNow->format('d F Y');
        return $waktuNow;
    }
    public function userAdminSalesAgent()
    {

        // dd($getUserSales);
        if (session()->has('user')) {
            $getUserProjekFromUser = $this->userProjek->getUserProjekJoinProjek('*');
            $getProjekAll = $this->projek->getProjekAll();
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            //   dd($user);
            $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
                'user_menu.status_um' => 'aktif',
                'user_menu.id_kategori' => $user->id_kategori
            ])->collect();
            $getKategoriAll = $this->kategori->getKategori('*');
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

            if (
                $user->kategori == 'AdminAgentCompany'

            ) {
                $whereUserAdmin = [
                    'user_admin.id_kepala_ua' => session::get('user'),

                ];
                $getUserSales = $this->userAdmin->getUserAdminWhereJoinProjek('*', $whereUserAdmin)->collect();
                $getUserSales = $getUserSales->where('deleted_ua', 'false');
            }

            if (
                $user->kategori == 'AdminSales'

            ) {
                $whereUserAdmin = [
                    'user_admin.id_kepala_ua' => session::get('user'),

                ];
                $getUserSales = $this->userAdmin->getUserAdminWhereJoinProjek('*', $whereUserAdmin)->collect();
                $getUserSales = $getUserSales->where('deleted_ua', 'false');
            }

            if (
                $user->kategori != 'AdminAgentCompany' && $user->kategori != 'AdminSales'

            ) {
                $whereUserAdmin = [
                    'Agent', 'SalesAgent', 'AgentCompany', 'AdminAgentCompany',
                ];
                $getUserSales = $this->userAdmin->getUserAdminWhereIn('*', 'ktgr_admin.kategori', $whereUserAdmin)->collect();
                $getUserSales = $getUserSales->where('deleted_ua', 'false');
            }

            if (
                $user->kategori == 'SuperAdmin'

            ) {

                $getUserSales = $this->userAdmin->getUserAdminAll('*');
                $getUserSales = $getUserSales->where('deleted_ua', 'false');
                // dd($getUserSales);
            }
            return view(
                'V_Admin.userListSalesAgent',
                compact(
                    'user',
                    'projekUser',
                    'getUserSales',
                    'getUserMenu',
                    'getUserProjekFromUser',
                    'getProjekAll',
                    'getKategoriAll'

                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function updateUserProfile()
    {

        $getUser = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            //   dd($user);
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

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }
            return view(
                'V_Admin.editUserProfile',
                compact(
                    'user',
                    'projekUser',
                    'getUser',
                    'getUserMenu'
                )
            );
        } else {
            return redirect('/login');
        }
    }
    public function updateUserProfileAction(Request $request, $id)
    {

        $decryptedID = Crypt::decrypt($id);
        $getUser = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            //   dd($user);

            $filename = $getUser->foto_ua;
            if ($request->file('image')) {
                $img = $request->file('image');

                // Generate a unique filename based on the current timestamp and the original file extension
                $filename = $request->username . '-' . time() . '.' . $img->getClientOriginalExtension();

                // Store the image in the 'images' folder under the 'public' disk
                $path = 'Home/images/foto/';
                $img = Image::make($img);
                $img->save(public_path($path . $filename));
            }

            $dataUserAdmin = [
                'code_id_ua' => $request->code,
                'nama_ua' => $request->nama,
                'email_ua' => $request->email,
                'no_tlp_ua' => $request->no_telp,
                'alamat_ua' => $request->alamat,
                'tempat_lahir_ua' => $request->tempat_lahir,
                'tgl_lahir_ua' => $request->tgl_lahir,
                'foto_ua' => $filename,
                'id_kategori' => $request->kategori
            ];
            // dd($dataUserAdmin);
            DB::table('user_admin')
                ->where('id_user_admin', $decryptedID)
                ->update(
                    $dataUserAdmin
                );

            $dataInputProjek = [];
            if ($request->projek != null) {
                for ($i = 0; $i < count($request->projek); ++$i) {
                    array_push($dataInputProjek , [
                        'id_projek' => $request->projek[$i],
                        'id_user_admin' => $decryptedID,

                    ]);
                }

                $this->userProjek->insertUserProjek( $dataInputProjek);
            }

            return redirect()->back()->with('success', 'Data profile berhasil diubah');
        } else {
            return redirect('/login');
        }
    }

    public function updatePasswordProfile()
    {

        $getUser = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            //   dd($user);
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

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }
            return view(
                'V_Admin.editPasswordProfile',
                compact(
                    'user',
                    'projekUser',
                    'getUser',
                    'getUserMenu'
                )
            );
        } else {
            return redirect('/login');
        }
    }
    public function updatePasswordProfileAction(Request $request, $id)
    {

        $decryptedID = Crypt::decrypt($id);
        $getUser = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            //   dd($user);

            $filename = $getUser->foto_ua;
            if ($request->file('image')) {
                $img = $request->file('image');

                // Generate a unique filename based on the current timestamp and the original file extension
                $filename = $request->username . '-' . time() . '.' . $img->getClientOriginalExtension();

                // Store the image in the 'images' folder under the 'public' disk
                $path = 'Home/images/foto/';
                $img = Image::make($img);
                $img->save(public_path($path . $filename));
            }

            $dataUserAdmin = [

                'password_ua' => md5($request->password),
            ];
            // dd($dataUserAdmin);
            DB::table('user_admin')
                ->where('id_user_admin', $decryptedID)
                ->update(
                    $dataUserAdmin
                );

            return redirect()->back()->with('success', 'Data profile berhasil diubah');
        } else {
            return redirect('/login');
        }
    }
    public function changeStatusUser($id, $status)
    {

        $getUserAdminAll = $this->userAdmin->getUserAdminJoinKategoriDepartemen('*', 'tgl_input_ua', 'desc');

        // dd($getMenu);

        // if (!$foundMatchingMenu) {
        //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // }
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            $dataUpdateUser = [
                'id_user_admin' => $id,
                'status_ua' => $status,

            ];
            DB::table('user_admin')
                ->where('id_user_admin', $id)
                ->update($dataUpdateUser);
            // return response()->json();
            // return response()->json(['success' => true]);
            return redirect()->back()->with('success', 'User berhasil ' . $status);
        } else {
            return redirect('/login');
        }
    }

    public function DownloadUserAdminSales()
    {

        $waktuNow = $this->ambilWaktu();
        $sesiNow = session::get('user');
        $userAll = $this->userAdmin->getPrintUserAdmin();
        $pdf = PDF::loadView('pdf.printUser', ['userAll' => $userAll, 'waktuNow' => $waktuNow])->setPaper('a4', 'potrait');
        // if (session()->has('user')) {
        //     return view('AdminFormsLiving.printUser',compact('userAll','waktuNow'));
        // }
        return $pdf->download('Laporan User Register Formsliving Tanggal ' . $waktuNow . ".pdf");
    }
    //

    public function deleteUserAdmin($id)
    {

        $decryptedID = Crypt::decrypt($id);
        $dataUserAdmin = [
            'deleted_ua' => 'true',
            'deleted_ua_at' => Carbon::now()
        ];
        // dd($dataUserAdmin);
        DB::table('user_admin')
            ->where('id_user_admin', $decryptedID)
            ->update(
                $dataUserAdmin
            );

        return redirect()->back()->with('success', 'Data profile dihapus');
    }
}
