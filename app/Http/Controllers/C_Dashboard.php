<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Mail\MailAttachment;
use App\Mail\MailNotify;
// use App\Mail\MailAttachment;
use App\Models\Cluster;
// use Spatie\PdfToText\Pdf;
// use PDF;

// Model
use App\Models\Promo;
use App\Models\Rumah;
use App\Models\FormulirPesanan;
use App\Models\UserAdmin;
use App\Models\UserProjek;
use App\Models\Projek;

use Illuminate\Contracts\Auth\Guard;


// =======================

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;
use PDF;

class C_Dashboard extends Controller
{

    public $rumah;
    public $formulirPesanan;
    public $userAdmin;
    public $userProject;
    public $projek;

    public function __construct()
    {
        $this->rumah = new Rumah;
        $this->formulirPesanan = new FormulirPesanan;
        $this->userAdmin = new UserAdmin;
        $this->userProject = new UserProjek;
        $this->projek = new Projek;
    }

    function index($projek)
    {
        $getProjek = $this->projek->firstProjek('*','nama_projek','=',$projek);
        $fp = $this->formulirPesanan->getFormulirPesananProjekJoin6Where2(
            'formulir_pesanan.status_fp',
            '!=',
            'nonactive',
            'projek.nama_projek',
            '=',
            $projek,
            'formulir_pesanan.tgl_input_fp',
            'desc'
        );
        $getRumah = $this->rumah->getRumahProjekWhereAll('projek.nama_projek','=',$projek);
        $rumah = $this->rumah->getRumahProjekWhereAll('projek.nama_projek','=',$projek);
        $arrWithCompany = array(
            'ktgr_admin.kategori' => "AgentWithCompany",
            'user_admin.status_ua' => "aktif",
        );
        $arrWithoutCompany = array(
            'ktgr_admin.kategori' => "AgentWithoutCompany",
            'user_admin.status_ua' => "aktif",
        );

        $agentWithCompany = $this->userAdmin->getUserJoinCountWhere($arrWithCompany);
        $agentWithoutCompany = $this->userAdmin->getUserJoinCountWhere($arrWithoutCompany);
        // dd($agentWithoutCompany);

        $closingAll = $this->formulirPesanan->getFormulirPesananJoin5Count();


        $closing = $this->formulirPesanan->getFormulirPesananJoin5CountWhere('formulir_pesanan.tgl_input_fp', now()->month);


        $remainHouse = $this->rumah->RemainHouse('status', 'available');


        if (session()->has('user')) {

            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProject->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            return view(
                'V_Admin.dashboard',
                compact(
                    'user',
                    'projekUser',
                    'fp',
                    'rumah',
                    'agentWithCompany',
                    'agentWithoutCompany',
                    'closingAll',
                    'closing',
                    'remainHouse',
                    'getRumah',
                    'getProjek'

                )
            );
        } else {

            return redirect('/login');
        }
    }
}