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

        // Surat Pemesanan Rumah == Formulir Pesanan

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $rumah = $this->rumah->getRumahProjekWhereAll('projek.nama_projek', '=', $projek);

        // $getRumah = $this->rumah->getRumahSelectCountGroupBy();
        // dd($getRumah);
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
            if (
                $user->kategori == 'AdminAgentCompany' || $user->kategori == 'AdminSales'

            ) {
                $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananProjekJoin6WhereArr(
                    [
                        'projek.nama_projek' => $projek,
                        'user_admin.id_kepala_ua' => session::get('user')
                    ],
                    'formulir_pesanan.tgl_input_fp',
                    'desc'
                );
            } elseif (
                $user->kategori == 'Sales' ||
                $user->kategori == 'SalesAgent' ||
                $user->kategori == 'Agent' ||
                $user->kategori == 'AgentCompany'

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

public function checkPromoDiskon($arrayPromo,$arrayFP)
{
   if (!empty($arrayPromo)) {
        if (!($arrayPromo['diskon_promo'] == 0)) {
            return $arrayFP['total_diskon']; 
        }
    }else{
        return 0;
    }
}
    
public function checkFreePPN($arrayPromo,$arrayFP)
{
   if (!empty($arrayPromo)) {
        if (($arrayPromo['free_ppn_promo'] == "yes")) {
            return [
                'hargaPricelist' => $arrayFP['harga_non_ppn'],
                'hargaNetto' => ($arrayFP['harga_non_ppn'] - $arrayFP['total_diskon']),
                'hargaPPN' => 0
            ]; 
        }
    }else{
        return [
            'hargaPricelist' => $arrayFP['harga_awal'],
            'hargaNetto' => $arrayFP['total_harga'] / 1.1,
            'hargaPPN' => (11 / 100) * ($arrayFP['total_harga'] / 1.11)
        ]; 
    }
} 

    public function editSuratPemesananRumah($projek, $id)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $decryptedID = Crypt::decrypt($id);
        $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananJoin7Where($decryptedID);
        $getPromo = '';
        $getPromoAll = $this->promo->getPromoWhereAll('*','status','=',"aktif");
        // dd($getFormulirPesanan);
        if (!empty($getFormulirPesanan->id_promo)) {
            $getPromo = $this->promo->firstPromo('*', ['id_promo' => $getFormulirPesanan->id_promo]);
        } else {
            $getPromo = '';
        }
        // dd($getPromo);
        $getPembayaranRumah = $this->pembayaranRumah->getPembayaranRumahWhereAll('*', 'id_formulir', '=', $decryptedID);

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
                'user_menu.status_um' => 'aktif',
                'user_menu.id_kategori' => $user->id_kategori
            ])->collect();

            $dataHarga = [];

            $cekHargaPromo = $this->checkPromoDiskon($getPromo,$getFormulirPesanan);
            $cekAdaFreePPN = $this->checkFreePPN($getPromo,$getFormulirPesanan);

            // dd($cekAdaFreePPN);

            if(empty($getPromo)){
                $dataHarga = array([
                    'hargaPricelist' => $getFormulirPesanan->harga_awal,
                    'hargaDiskon' =>  0,
                    'hargaNetto' => rupiah($getFormulirPesanan->total_harga / 1.1),
                    'hargaPPN' => rupiah((11 / 100) * ($getFormulirPesanan->total_harga / 1.11))
                    ]);
            }else{
                $dataHarga = array([
                    'code_promo' => $getPromo->id_promo,
                    'hargaPricelist' => $cekAdaFreePPN['hargaPricelist'],
                    'hargaDiskon' => $cekHargaPromo,
                    'hargaNetto' => $cekAdaFreePPN['hargaNetto'],
                    'hargaPPN' => $cekAdaFreePPN['hargaPPN']
                    ]);
            }

            // dd($dataHarga);

            // var_dump($dataHarga);

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
            return view('V_Admin.editFormulirPesanan', compact(
                'user',
                'projekUser',
                'getFormulirPesanan',
                'getPromo',
                'getPembayaranRumah',
                'getProjek',
                'getUserMenu',
                'getPromoAll',
                'dataHarga'
            ));
        } else {
            return redirect('/login');
        }
    }

    public function editSuratPemesananRumahAction(Request $request, $projek, $id)
    {
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
            $dataUpdate = "";

            if ($user->kategori == "AdminFormsLiving" || $user->kategori == "SuperAdmin") {
                $dataUpdate = [
                    'no_fp' => $request->nofp.$request->nofp2,
                    'status_market_fp'   => "accept",
                    'tgl_market_fp'  => date('d-m-y h:m:s'),
                    'status_staf_acc_fp'   => "accept",
                    'tgl_staff_acc_fp'  => date('d-m-y h:m:s'),
                ];
                
                $dataUpdateUSer = [
                    'nama_plgn' => $request->namaPlgn,
                    'npwp_plgn' => $request->npwp,
                    'no_ktp_plgn' => $request->ktp,
                    'alamat_plgn' => $request->alamat,
                    'no_tlp_plgn' => $request->tlp,
                    'email_plgn' => $request->email,
                ];
            }

            if ($user->kategori == "StaffAcc" || $user->kategori == "SuperAdmin") {
                $dataUpdate = [
                    'no_fp' => $request->nofp.$request->nofp2,
                    'status_market_fp'   => "accept",
                    'tgl_market_fp'  => date('d-m-y h:m:s'),
                    'status_staf_acc_fp'   => "accept",
                    'tgl_staff_acc_fp'  => date('d-m-y h:m:s'),
                ];
            }

            if ($user->kategori == "AdminAccounting") {
                $dataUpdate = [
                    'no_fp' => $request->nofp,
                    'status_acc_fp'  => "accept",
                    'tgl_acc_fp'  => date('d-m-y h:m:s'),
                ];
            }
            if ($user->kategori == "AdminLegal") {

                $dataUpdate = [
                    'status_legal_fp'   => "accept",
                    'tgl_legal_fp'  => date('d-m-y h:m:s'),
                ];
            }


            if ($user->kategori == "AdminLegal" || $user->kategori == "SuperAdmin" ) {
                $dataRumah = ['luas_tanah'    => $request->luasTanah];
                DB::table('rumah')
                    ->where('id_rumah', $getFormulirPesanan->id_rumah)
                    ->update($dataRumah);
            }
            DB::table('formulir_pesanan')
                ->where('id_formulir', $decryptedID)
                ->update($dataUpdate);

            return redirect()->route('suratPemesananRumah.admin', $getProjek->nama_projek)->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/login');
        }
    }

    function cetakSuratPemesananRumah($id) {

            $decryptedID = Crypt::decrypt($id);


        $fpJadi = DB::table('formulir_pesanan')
        ->select('*','rumah.id_projek')
        ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
        ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')

        ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
        ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
        ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
        ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
        ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
        ->where('id_formulir', '=', $decryptedID)
        ->first();


    // dd($fpJadi);
    $dataPembayaran = DB::table('pembayaran_rumah')
        ->where('id_formulir', '=', $decryptedID)
        ->get();
    $promo = '';
    if (!empty($fpJadi->id_promo)) {
        $promo = DB::table('promo')
            ->where('id_promo', '=', $fpJadi->id_promo)
            ->first();
    }
         $pdf = \PDF::loadView('pdf.printSPR-dashboard', ['fp' => $fpJadi, 'dtPembayaran' => $dataPembayaran, 'promo' => $promo]);
            // $pdf = PDF::loadView('mail.index');
            $pdf->setPaper('F4', 'potrait');
            // Storage::put('public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf', $pdf->output());
            $pdf->render();
            $pdfData = $pdf->output();
            // $filename = 'public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf';
            // Storage::put($filename, $pdfData);
            // dd($filename);
            $path = './Home/pdf/';
            $pdf->save($path.'FP-'.$fpJadi->blok.'-'.$fpJadi->nomor.'-'.$fpJadi->id_formulir.'.pdf');
            $filename = $path.'FP-'.$fpJadi->blok.'-'.$fpJadi->nomor.'-'.$fpJadi->id_formulir.'.pdf';
            set_time_limit(2000);
        return $pdf->download('FP-' . $fpJadi->blok . "-" . $fpJadi->nomor . '.pdf');
    }
    public function editPromoSuratPemesananRumahAction(Request $request, $projek, $id) {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        $dataUpdate  = array(
            'id_promo' => $request->promo
        );

        $decryptedID = Crypt::decrypt($id);
        DB::table('formulir_pesanan')
        ->where('id_formulir', $decryptedID)
        ->update($dataUpdate);

        return redirect()->route('editSuratPemesananRumah.admin',[$getProjek->nama_projek, Crypt::encrypt($decryptedID)])->with('success','promo telah di ubah!');
    }
}
