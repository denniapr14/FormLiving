<?php

namespace App\Http\Controllers;

use App\Helpers\helpers;
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
use PDF; // Gunakan facade PDF


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
                $getFormulirPesananMobile = $this->formulirPesanan->getFormulirPesananProjekJoin6WhereArr(
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
                $getFormulirPesananMobile = $this->formulirPesanan->getFormulirPesananProjekJoin6Where2(
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
                $getFormulirPesananMobile = $this->formulirPesanan->getFormulirPesananProjekJoin6Where(
                    'projek.nama_projek',
                    '=',
                    $projek,
                    'formulir_pesanan.tgl_input_fp',
                    'desc'
                );
                // dd($getFormulirPesanan);
            }
            // dd($getFormulirPesananMobile);

            return view('V_Admin.formulirPesanan',
                compact(
                    'user',
                    'projekUser',
                    'getFormulirPesanan',
                    'getFormulirPesananMobile',
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
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $decryptedID = Crypt::decrypt($id);
        $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananJoin7Where($decryptedID);
        $getPromo = '';
        $getPromoAll = $this->promo->getPromoWhereAll('*', 'status', '=', "aktif");
        // dd($getFormulirPesanan);
        if (!empty($getFormulirPesanan->id_promo)) {
            $getPromo = $this->promo->firstPromo('*', ['id_promo' => $getFormulirPesanan->id_promo]);
        } else {
            $getPromo = '';
        }
        //dd($getFormulirPesanan);
        $getPembayaranRumah = $this->pembayaranRumah->getPembayaranRumahWhereAll('*', 'id_formulir', '=', $decryptedID);

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

            if ($getPromo->free_ppn_promo == "yes") {
                $dataHarga = array([
                    'hargaPricelist' => $getFormulirPesanan->harga_awal,
                    'hargaDiskon' => $getFormulirPesanan->total_diskon,
                    'hargaNetto' => $getFormulirPesanan->harga_netto,
                    'hargaPPN' => $getFormulirPesanan->harga_ppn,
                    'hargaTotal' => $getFormulirPesanan->total_harga,
                    'hargaBPHTB'    => $getFormulirPesanan->harga_bphtb
                ]);
            } else {
                // Adjust these values based on your requirements
                $dataHarga = array([
                    'hargaPricelist' => $getFormulirPesanan->harga_awal,
                    'hargaDiskon' => $getFormulirPesanan->total_diskon,
                    'hargaNetto' => $getFormulirPesanan->harga_netto,
                    'hargaPPN' => $getFormulirPesanan->harga_ppn,
                    'hargaTotal' => $getFormulirPesanan->total_harga,
                    'hargaBPHTB'    => $getFormulirPesanan->harga_bphtb
                ]);
            }



            // if(empty($getPromo)){
            //     $dataHarga = [
            //         hargaPricelist => $getFormulirPesanan->harga_awal,
            //         hargaDiskon => 0,
            //         hargaNetto => rupiah($getFormulirPesanan->total_harga / 1.1),
            //         hargaPPN => rupiah((11 / 100) * ($getFormulirPesanan->total_harga / 1.11))
            //         ];
            // }elseif($getPromo->bphtp_promo=="yes"){
            //     $dataHarga = [
            //         hargaPricelist => $getFormulirPesanan->harga_awal,
            //         hargaDiskon => 0,
            //         hargaNetto => rupiah(($getFormulirPesanan->total_harga + 3000000) / 1.16),
            //         hargaPPN => rupiah((11 / 100) * (($getFormulirPesanan->total_harga + 3000000) / 1.16))
            //         ];
            // }elseif($getPromo->bphtp_promo=="no" && $getPromo->freekpr_promo=="yes"){
            //     $dataHarga = [
            //         hargaPricelist => $getFormulirPesanan->harga_free_kpr,
            //         hargaDiskon => 0,
            //         hargaNetto => rupiah($getFormulirPesanan->total_harga / 1.1),
            //         hargaPPN => rupiah((11 / 100) * ($getFormulirPesanan->total_harga / 1.11))
            //         ];
            // }

            // var_dump($dataHarga);

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
        $dataPembayaranUpdate = array();

        for ($i = 0; $i < count($request->input('id_pembayaran')); $i++) {
            // if ($request->in) {
            //     # code...
            // }
            $dataPembayaranUpdate[] = array(
                'id_pem_rumah' => $request->input('id_pembayaran')[$i],
                'detail_pr'    => $request->input('keterangan')[$i],
                'tgl_pr'       => $request->input('tglPembayaran')[$i],
                'harga_pr'     => removePeriods($request->input('nominal')[$i]),
                'sisa_pr'      => removePeriods($request->input('nominal')[$i]),
            );
        }


        // Now perform the update on the database
        foreach ($dataPembayaranUpdate as $data) {
            DB::table('pembayaran_rumah')
                ->where('id_pem_rumah', $data['id_pem_rumah'])
                ->update([
                    'detail_pr' => $data['detail_pr'],
                    'tgl_pr'    => $data['tgl_pr'],
                    'harga_pr'  => $data['harga_pr'],
                    'sisa_pr'   => $data['sisa_pr']
                ]);
        }
        $dataPembayaranNew = array();
        for ($k = 0; $k < count($request->input('tipePembayaran')); $k++){
            $dataPembayaranNew[] = array(
                'id_rumah' => $getFormulirPesanan->id_rumah,
                'id_formulir' => $getFormulirPesanan->id_formulir,
                'id_pelanggan' => $getFormulirPesanan->id_pelanggan,
                'detail_pr'     => $request->input('tipePembayaran')[$k],
                'tgl_pr'       => $request->input('tglPembayaranBaru')[$k],
                'harga_pr'     => removePeriods($request->input('nominalBaru')[$k]),
                'sisa_pr'      => removePeriods($request->input('nominalBaru')[$k]),
            );
        }
        // dd($dataPembayaranNew); // This is for debugging to see the array structure
        $this->pembayaranRumah->insertPembayaranRumah($dataPembayaranNew);
        // dd($request->input('keterangan'));
        $getPembayaranRumah = $this->pembayaranRumah->getPembayaranRumahWhereAll('*', 'id_formulir', '=', $decryptedID);

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            $dataUpdate = "";

            if ($user->kategori == "AdminFormsLiving" || $user->kategori == "SuperAdmin") {
                $dataUpdate = [
                    'no_fp' => $request->nofp . $request->nofp2,
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
                    'no_telp_plgn' => $request->tlp,
                    'email_plgn' => $request->email,
                    'tempat_lahir_plgn' => $request->tempat,
                    'tgl_lahir_plgn'    => $request->tanggalLahir
                ];
            }

            if ($user->kategori == "StaffAcc" || $user->kategori == "SuperAdmin") {
                $dataUpdate = [
                    'no_fp' => $request->nofp . $request->nofp2,
                    'status_market_fp'   => "accept",
                    'tgl_market_fp'  => date('d-m-y h:m:s'),
                    'status_staf_acc_fp'   => "accept",
                    'tgl_staff_acc_fp'  => date('d-m-y h:m:s'),
                ];
            }

            if ($user->kategori == "AdminAccounting") {
                $dataKKPR = [
                    'harga_awal'    => removePeriods($request->hargaPricelist),
                    'total_diskon' => removePeriods($request->hargaDiskon),
                    'harga_netto'  => removePeriods($request->hargaNetto),
                    'harga_bphtb' => removePeriods($request->hargaBPHTB),
                    'harga_ppn'     => removePeriods($request->hargaPPN),
                    'total_harga'  => removePeriods($request->hargaTotal),
                ];
                $dataUpdate = [

                    'no_fp' => $request->nofp . $request->nofp2,
                    'status_acc_fp'   => "accept",
                    'tgl_acc_fp'  => date('d-m-y h:m:s'),

                ];
                $dataUpdateUSer = [
                    'nama_plgn' => $request->namaPlgn,
                    'npwp_plgn' => $request->npwp,
                    'no_ktp_plgn' => $request->ktp,
                    'alamat_plgn' => $request->alamat,
                    'no_telp_plgn' => $request->tlp,
                    'email_plgn' => $request->email,
                    'tempat_lahir_plgn' => $request->tempat,
                    'tgl_lahir_plgn'    => $request->tanggalLahir
                ];
            }
            // dd($dataKKPR);
            if ($user->kategori == "AdminLegal") {

                $dataUpdate = [
                    'status_legal_fp'   => "accept",
                    'tgl_legal_fp'  => date('d-m-y h:m:s'),
                ];
            }

            if ($user->kategori == "AdminLegal" || $user->kategori == "SuperAdmin") {
                $dataRumah = ['luas_tanah'    => $request->luasTanah];
                DB::table('rumah')
                    ->where('id_rumah', $getFormulirPesanan->id_rumah)
                    ->update($dataRumah);
            }

            if(!empty($dataKKPR)){
                DB::table('kalkulator_kpr')
                ->where('id_formulir', $decryptedID)
                ->update($dataKKPR);
            }

            DB::table('formulir_pesanan')
                ->where('id_formulir', $decryptedID)
                ->update($dataUpdate);

            DB::table('user_pelanggan')
                ->where('id_pelanggan', $getFormulirPesanan->id_pelanggan)
                ->update($dataUpdateUSer);

            return redirect()->route('suratPemesananRumah.admin', $getProjek->nama_projek)->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/login');
        }
    }

    function cetakSuratPemesananRumah($id)
    {

        $decryptedID = Crypt::decrypt($id);


        $fpJadi = DB::table('formulir_pesanan')
            ->select('*', 'rumah.id_projek')
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

        if ($promo->free_ppn_promo == "yes") {
            $dataHarga = array([
                'hargaPricelist' => $fpJadi->harga_awal,
                'hargaDiskon' => $fpJadi->total_diskon,
                'hargaNetto' => $fpJadi->harga_netto_kkpr,
                'hargaPPN' => $fpJadi->harga_ppn_kkpr,
                'hargaTotal' => $fpJadi->total_harga
            ]);
        } else {
            // Adjust these values based on your requirements
            $dataHarga = array([
                'hargaPricelist' => $fpJadi->harga_awal,
                'hargaDiskon' => $fpJadi->total_diskon,
                'hargaNetto' => $fpJadi->harga_netto,
                'hargaPPN' => $fpJadi->harga_ppn,
                'hargaTotal' => $fpJadi->total_harga
            ]);
        }
        //function cetak

        $pdf = PDF::loadView('pdf.printSPR-dashboard', ['fp' => $fpJadi, 'dtPembayaran' => $dataPembayaran, 'promo' => $promo, 'dataHarga' => $dataHarga]);
        $pdf->setPaper('F4', 'potrait');
        $pdf->render();
        $pdfData = $pdf->output();
        $path = './Home/pdf/';
        $pdf->save($path . 'SPR-' . $fpJadi->blok . '-' . $fpJadi->nomor . '-' . $fpJadi->id_formulir . '.pdf');
        $filename = $path . 'SPR-' . $fpJadi->blok . '-' . $fpJadi->nomor . '-' . $fpJadi->id_formulir . '.pdf';
        set_time_limit(2000);
        return $pdf->download('SPR-' . $fpJadi->blok . "-" . $fpJadi->nomor . '.pdf');
    }
    public function editPromoSuratPemesananRumahAction(Request $request, $projek, $id)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        $dataUpdate  = array(
            'id_promo' => $request->promo
        );

        $decryptedID = Crypt::decrypt($id);
        DB::table('formulir_pesanan')
            ->where('id_formulir', $decryptedID)
            ->update($dataUpdate);

        return redirect()->route('editSuratPemesananRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($decryptedID)])->with('success', 'promo telah di ubah!');
    }
}
