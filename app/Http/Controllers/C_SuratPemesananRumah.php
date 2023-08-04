<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\PembayaranRumah;
use App\Models\Rumah;
use App\Models\UserAdmin;
use App\Models\UserNotif;
use App\Models\UserProjek;
use App\Models\FormulirPesanan;
use App\Models\Promo;


use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

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
    public function __construct()
    {
        $this->cluster      = new Cluster;
        $this->rumah        = new Rumah;
        $this->userAdmin    = new UserAdmin;
        $this->userNotif    = new UserNotif;
        $this->userProjek   = new UserProjek;
        $this->formulirPesanan = new FormulirPesanan;
        $this->promo        = new Promo;
        $this->pembayaranRumah = new PembayaranRumah;
    }
    public function suratPemesananRumah()
    {
        // Surat Pemesanan Rumah == Formulir Pesanan

        $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananJoin5('formulir_pesanan.tgl_input_fp', 'desc');

        $rumah = $this->rumah->getRumahAll();

        // $getRumah = $this->rumah->getRumahSelectCountGroupBy();
        // dd($getRumah);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            return view(
                'V_Admin.formulirPesanan',
                compact(
                    'user',
                    'projekUser',
                    'getFormulirPesanan',
                    'rumah'
                )
            );
        } else {
            return redirect('/login');
        }
    }

    function editSuratPemesananRumah($id)  {

        $decryptedID = Crypt::decrypt($id);
        $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananJoin7Where($decryptedID);
        $getPromo = "";
        // dd($getFormulirPesanan);
        if (!empty($getFormulirPesanan->id_promo)) {
            # code...
            $getPromo = $this->promo->getPromoWhereAll('*','id_promo','=',$getFormulirPesanan->id_promo);
        }else{
            $getPromo="";
        }

        $getPembayaranRumah = $this->pembayaranRumah->getPembayaranRumahWhereAll('*','id_formulir','=',$decryptedID);

    //     $fp = DB::table('formulir_pesanan')
    //     ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
    //     ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'formulir_pesanan.id_rumah')
    //     ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
    //     ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
    //     ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
    //     ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
    //     ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
    //     ->where('id_formulir', '=', $id_formulir)
    //     ->first();
    // $promo = "";
    // $dtPembayaran = DB::table('pembayaran_rumah')
    //     ->where('id_formulir', '=', $id_formulir)
    //     ->get();

    // dd($dtPembayaran);
    // die();
    if (session()->has('user')) {

        $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

        $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

        return view('V_Admin.editFormulirPesanan', compact(
            'user',
            'projekUser',
            'getFormulirPesanan',
            'getPromo',
            'getPembayaranRumah',
        ));
    } else {

        return redirect('/login');
    }


    }
    //
}