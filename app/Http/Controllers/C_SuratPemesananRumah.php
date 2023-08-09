<?php

namespace App\Http\Controllers;

use App\Models\Clusters;
use App\Models\PembayaranRumah;
use App\Models\Projek;
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
    public $projek;
    public function __construct()
    {
        $this->cluster      = new Clusters;
        $this->rumah        = new Rumah;
        $this->userAdmin    = new UserAdmin;
        $this->userNotif    = new UserNotif;
        $this->userProjek   = new UserProjek;
        $this->formulirPesanan = new FormulirPesanan;
        $this->promo        = new Promo;
        $this->pembayaranRumah = new PembayaranRumah;
        $this->projek = new Projek;
    }
    public function suratPemesananRumah($projek)
    {
        // Surat Pemesanan Rumah == Formulir Pesanan

        $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananProjekJoin6Where(
            'projek.nama_projek',
            '=',
            $projek,
            'formulir_pesanan.tgl_input_fp',
            'desc'
        );
        $getProjek = $this->projek->firstProjek('*','nama_projek','=',$projek);
        $rumah = $this->rumah->getRumahProjekWhereAll('projek.nama_projek','=',$projek);

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
                    'rumah',
                    'getProjek'
                )
            );
        } else {
            return redirect('/login');
        }
    }

    function editSuratPemesananRumah($projek,$id)
    {

        $getProjek = $this->projek->firstProjek('*','nama_projek','=',$projek);
        $decryptedID = Crypt::decrypt($id);
        $getFormulirPesanan = $this->formulirPesanan->getFormulirPesananJoin7Where($decryptedID);
        $getPromo = "";
        // dd($getFormulirPesanan);
        if (!empty($getFormulirPesanan->id_promo)) {
            # code...
            $getPromo = $this->promo->getPromoWhereAll('*', 'id_promo', '=', $getFormulirPesanan->id_promo);
        } else {
            $getPromo = "";
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
                'getProjek'
            ));
        } else {

            return redirect('/login');
        }
    }
    //
}
