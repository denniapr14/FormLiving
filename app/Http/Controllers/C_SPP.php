<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserProjek;
use App\Models\UserMenu;
use App\Models\FormulirPesanan;
use App\Models\SPP;
use App\Models\PembayaranRumah;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class C_SPP extends Controller
{
    public $user;
    public $projek;
    public $userAdmin;
    public $userMenu;
    public $userProjek;
    public $formulirPesanan;
    public $spp;
    public $pembayaranRumah;
    public function __construct() {
        $this->user = new User();
        $this->projek = new Projek();
        $this->userAdmin = new UserAdmin();
        $this->userMenu = new UserMenu();
        $this->userProjek = new UserProjek();
        $this->formulirPesanan=new FormulirPesanan();
        $this->spp=new SPP();
        $this->pembayaranRumah=new PembayaranRumah();
    }
    public function getSPP($projek){
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        //

        // $getJob = $getJob->where('id_projek',$getProjek->id_projek)->groupBy('termin_job')->sortBy('termin_job');
        // dd($getJob);
        $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananProjekJoin6Where(
            'projek.nama_projek',
            '=',
            $projek,
            'formulir_pesanan.tgl_input_fp',
            'desc'
        )

        ;
        $getSPP = $this->spp->getSPPJoinRumahFormulirPelangganOrder(['projek.nama_projek' => $projek],'spp.tgl_input_spp','desc');
        // dd($getFormulirPesanan);
        $getPembayaranRumah = $this->pembayaranRumah->getPembayaranRumahAll();

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


            return view('V_Admin.spp',
                compact(
                    'user',
                    'projekUser',
                    'getProjek',
                    'getUserMenu',
                    'getFormulirPesanan',
                    'getPembayaranRumah',
                    'getSPP'

                )
            );
        } else {
            return redirect('/login');
        }
    }
    public function createSPP($projek,$id_formulir)  {


        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        //

        $decryptedIDFormulir = Crypt::decrypt($id_formulir);


        // $getJob = $getJob->where('id_projek',$getProjek->id_projek)->groupBy('termin_job')->sortBy('termin_job');
        // dd($getJob);
        $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananJoin7Where($decryptedIDFormulir);
        // dd($getFormulirPesanan);

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
            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }

            $dataInput = [
                'id_formulir'       => $decryptedIDFormulir,
                'id_rumah'          => $getFormulirPesanan->id_rumah,
                'id_pelanggan'      => $getFormulirPesanan->id_pelanggan,
                'status_staf_acc'   => "validated",
                'status_head_acc'   => "nonvalidated",
                'status_ceo'        => "nonvalidated",
                'stats_spk'         => "spp"
            ];
            $this->spp->insertSPP($dataInput);
            return  redirect()->route('spp.admin',$getProjek->nama_projek)->with('success','SPP telah di buat!');
        } else {
            return redirect('/login');
        }
    }

    public function editSPP($projek,$idSPP) {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        //

        $decryptedID = Crypt::decrypt($idSPP);
        $getSPP = $this->spp->firstSPPJoinRumahFormulirPelangganWhere(['spp.id_spp' => $decryptedID]);

        // $getJob = $getJob->where('id_projek',$getProjek->id_projek)->groupBy('termin_job')->sortBy('termin_job');
        // dd($getJob);
        // $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananJoin7Where($decryptedIDFormulir);
        // dd($getFormulirPesanan);
        // dd($getSPP);
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
            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }
            return view('V_Admin.editSPP',
            compact(
                'user',
                'projekUser',
                'getProjek',
                'getUserMenu',
                'getSPP'

            )
        );
        } else {
            return redirect('/login');
        }
    }

    public function editSPPAction(Request $request,$projek,$idSPP) {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        //

        $decryptedID = Crypt::decrypt($idSPP);
        $getSPP = $this->spp->firstSPPJoinRumahFormulirPelangganWhere(['spp.id_spp' => $decryptedID]);

        // $getJob = $getJob->where('id_projek',$getProjek->id_projek)->groupBy('termin_job')->sortBy('termin_job');
        // dd($getJob);
        // $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananJoin7Where($decryptedIDFormulir);
        // dd($getFormulirPesanan);
        // dd($getSPP);
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
            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }

            $dataUpdate = [
                'no_spp' => $request->nomorSPP,
                'ket_spp' => $request->keterangan,
                'status_head_acc'  => $request->statusAccounting,
                'tgl_accept_acc'   => $request->tglAcc,
                'status_ceo'       => $request->statusCEO,
                'tgl_accept_ceo'   => $request->tglCEO,
                'pem_akhir_spp'    => $request->tgldanbank,
                'tgl_max_bangun'   => $request->tglBangun,
            ];
            DB::table('spp')
            ->where('id_spp',$decryptedID)
            ->update($dataUpdate);
            return back()->with('success','Data telah di update!');
        } else {
            return redirect('/login');
        }
    }

    public function printSPP($projek,$idSPP) {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        //

        $decryptedID = Crypt::decrypt($idSPP);
        $getSPP = $this->spp->firstSPPJoinRumahFormulirPelangganWhere(['spp.id_spp' => $decryptedID]);

        // $getJob = $getJob->where('id_projek',$getProjek->id_projek)->groupBy('termin_job')->sortBy('termin_job');
        // dd($getJob);
        // $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananJoin7Where($decryptedIDFormulir);
        // dd($getFormulirPesanan);
        // dd($getSPP);
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
            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }
            return view('V_Admin.printSPP',
            compact(
                'user',
                'projekUser',
                'getProjek',
                'getUserMenu',
                'getSPP'

            )
        );
        } else {
            return redirect('/login');
        }
    }
    //
}
