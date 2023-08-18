<?php

namespace App\Http\Controllers;

use App\Models\Clusters;
use App\Models\FormulirPesanan;
use App\Models\PembayaranRumah;
use App\Models\Projek;
use App\Models\Promo;
use App\Models\Rumah;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class C_SuratPemesananRumah extends Controller
{
    public $cluster;
    public $rumah;
    public $userAdmin;
    public $userNotif;
    public $userProjek;
    public $formulirPesanan;
    public $promo;
    public $pembayaranRumah;
    public $projek;
    public $userMenu;

    public function __construct()
    {
        $this->cluster = new Clusters();
        $this->rumah = new Rumah();
        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->formulirPesanan = new FormulirPesanan();
        $this->promo = new Promo();
        $this->pembayaranRumah = new PembayaranRumah();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
    }

    public function suratPemesananRumah($projek)
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

        // Surat Pemesanan Rumah == Formulir Pesanan

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $rumah = $this->rumah->getRumahProjekWhereAll('projek.nama_projek', '=', $projek);

        // $getRumah = $this->rumah->getRumahSelectCountGroupBy();
        // dd($getRumah);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            if (
                $user->kategori == 'Sales' ||
                $user->kategori == 'SalesAgent' ||
                $user->kategori == 'Agent' ||
                $user->kategori == 'AgentCompany' ||
                $user->kategori == 'AdminAgentCompany'
            ) {
                $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananProjekJoin6Where2(
                    'projek.nama_projek',
                    '=',
                    $projek,
                    'user_admin.id_user_admin',
                    '=',
                    $user->id_user_admin,
                    'formulir_pesanan.tgl_input_fp',
                    'desc'
                );
            } else {
                $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananProjekJoin6Where(
                    'projek.nama_projek',
                    '=',
                    $projek,
                    'formulir_pesanan.tgl_input_fp',
                    'desc'
                );
            }

            return view(
                'V_Admin.formulirPesanan',
                compact(
                    'user',
                    'projekUser',
                    'getFormulirPesanan',
                    'rumah',
                    'getProjek',
                    'getUserMenu'
                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function editSuratPemesananRumah($projek, $id)
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

        // if (!$foundMatchingMenu) {
        //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // }

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $decryptedID = Crypt::decrypt($id);
        $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananJoin7Where($decryptedID);
        $getPromo = '';
        // dd($getFormulirPesanan);
        if (!empty($getFormulirPesanan->id_promo)) {
            // code...
            $getPromo = $this->promo->getPromoWhereAll('*', 'id_promo', '=', $getFormulirPesanan->id_promo);
        } else {
            $getPromo = '';
        }

        $getPembayaranRumah = $this->pembayaranRumah->getPembayaranRumahWhereAll('*', 'id_formulir', '=', $decryptedID);

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            return view('V_Admin.editFormulirPesanan', compact(
                'user',
                'projekUser',
                'getFormulirPesanan',
                'getPromo',
                'getPembayaranRumah',
                'getProjek',
                'getUserMenu'
            ));
        } else {
            return redirect('/login');
        }
    }

    public function editSuratPemesananRumahAction(Request $request, $projek, $id)
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

        // if (!$foundMatchingMenu) {
        //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // }

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $decryptedID = Crypt::decrypt($id);
        $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananJoin7Where($decryptedID);
        $getPromo = '';
        // dd($getFormulirPesanan);
        if (!empty($getFormulirPesanan->id_promo)) {
            // code...
            $getPromo = $this->promo->getPromoWhereAll('*', 'id_promo', '=', $getFormulirPesanan->id_promo);
        } else {
            $getPromo = '';
        }

        $getPembayaranRumah = $this->pembayaranRumah->getPembayaranRumahWhereAll('*', 'id_formulir', '=', $decryptedID);

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            $dataUpdate = [
                'no_fp' => $request->nofp,
            ];
            DB::table('formulir_pesanan')
            ->where('id_formulir', $decryptedID)
            ->update($dataUpdate);

            return redirect()->route('suratPemesananRumah.admin', $getProjek->nama_projek)->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/login');
        }
    }
}
