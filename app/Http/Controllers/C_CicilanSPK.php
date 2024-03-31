<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use App\Models\Rumah;
use App\Models\SPP;
use App\Models\SPK;
use App\Models\CicilanSPK;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class C_CicilanSPK extends Controller
{
    //
    public $userAdmin;
    public $userNotif;
    public $userProjek;
    public $projek;
    public $userMenu;
    public $rumah;
    public $spp;
    public $spk;
    public $cicilanspk;
    public function __construct()
    {
        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
        $this->rumah = new Rumah();
        $this->spk =  new SPK();
        $this->cicilanspk = new CicilanSPK();
    }

    function addCicilanSPK($projek, $id_spk)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        $decryptedID = Crypt::decrypt($id_spk);

        $getSPK = $this->spk->firstSPK(['id_spk' => $decryptedID]);
        $getCicilanSPK = $this->cicilanspk->getCicilanSPKWhere(['id_spk' => $decryptedID]);
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

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }

            return view(
                'V_Admin.addCicilanSPK',
                compact(
                    'user',
                    'projekUser',
                    'getProjek',
                    'getUserMenu',
                    'getSPK',
                    'getCicilanSPK'


                )
            );
        } else {
            return redirect('/login');
        }
    }
    function addCicilanSPKAction(Request $request, $projek, $id_spk)
    {
        $decryptedID = Crypt::decrypt($id_spk);

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getSPK = $this->spk->firstSPK(['id_spk' => $decryptedID]);
        $getCicilanSPK = $this->cicilanspk->getCicilanSPKWhere(['id_spk' => $decryptedID]);
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
            DB::table('spk')
                ->where('id_spk', $decryptedID)
                ->update(
                    [
                        'total_spk' => $request->total_spk,
                        'sisa_spk'  => $request->total_spk,
                        'cicilan_spk' => $getSPK->cicilan_spk + 1
                    ]
                );

                $dataInsert = [
                    'pembayaran_cs' => $request->tagihan_cs,
                    'sisa_cs' => $request->tagihan_cs,
                    'status_cs' => "belum",
                    'id_spk'    => $decryptedID
                ];

                $this->cicilanspk->insertCicilanSPK($dataInsert);

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }

            return redirect()->route('spk.admin', [$projek])->with('success', 'Cicilan SPK berhasil ditambahkan');
        } else {
            return redirect('/login');
        }
    }
    function editCicilanSPK($projek, $id_cicilan_spk)  {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        $decryptedID = Crypt::decrypt($id_cicilan_spk);

        $getSPK = $this->spk->firstSPK(['id_spk' => $decryptedID]);
        $getCicilanSPK = $this->cicilanspk->firstCicilanSPKWhereCicilanSPKWhere(['id_cicilan_spk' => $decryptedID]);
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

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }

            return view('V_Admin.editCicilanSPK',
                compact(
                    'user',
                    'projekUser',
                    'getProjek',
                    'getUserMenu',
                    'getSPK',
                    'getCicilanSPK'


                )
            );
        } else {
            return redirect('/login');
        }
    }
    function editCicilanSPKAction($projek, $id_cicilan_spk)  {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        $decryptedID = Crypt::decrypt($id_cicilan_spk);

        $getSPK = $this->spk->firstSPK(['id_spk' => $decryptedID]);
        $getCicilanSPK = $this->cicilanspk->getCicilanSPKWhere(['id_cicilan_spk' => $decryptedID]);
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

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }


        } else {
            return redirect('/login');
        }
    }
}
