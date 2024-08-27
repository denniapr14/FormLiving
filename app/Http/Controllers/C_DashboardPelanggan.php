<?php

namespace App\Http\Controllers;

// use App\Models\FormulirPesanan;
// use Spatie\PdfToText\Pdf;
//
// Model
use App\Models\Projek;
use App\Models\Rumah;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserProjek;
use App\Models\FormulirPesanan;
use App\Models\UserPelanggan;
use App\Models\PelangganProjek;
use App\Models\PembayaranRumah;

// =======================
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class C_DashboardPelanggan extends Controller
{

    public $rumah;
    public $formulirPesanan;
    public $userAdmin;
    public $userProject;
    public $projek;
    public $userMenu;
    public $userPelanggan;
    public $pelangganProjek;
    public $pembayaranRumah;
    public function __construct()
    {
        $this->rumah = new Rumah;
        $this->formulirPesanan = new FormulirPesanan;
        $this->userAdmin = new UserAdmin;
        $this->userProject = new UserProjek;
        $this->projek = new Projek;
        $this->userMenu = new UserMenu;
        $this->userPelanggan = new UserPelanggan;
        $this->pelangganProjek = new PelangganProjek;
        $this->pembayaranRumah = new PembayaranRumah;
    }

    public function index($projek)
    {


        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere('id_pelanggan', '=', session::get('guest'));
            $getPelangganProjek = $this->pelangganProjek->getProjectPelangganWhere('user_pelanggan.id_pelanggan', '=', $userPelanggan->id_pelanggan);
            $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
            // dd("INI GUESTTTTTT");
            // dd($userPelanggan);
            $currentMonth = date('Y-m-d');
            // dd($currentMonth);
            $currentYear = date('Y-m-d');

            // Get next month and year
            $nextMonth = date('Y-m-d', strtotime('+1 month'));
            $nextYear = date('Y-m-d', strtotime('+1 month'));
            $getBillMonthNow = $this->pembayaranRumah->firstPembayaranRumahWhereMonthAndYearArr('*',[
                'id_pelanggan' => $userPelanggan->id_pelanggan
            ],
            'tgl_pr',now()->month,'tgl_pr',now()->year);


            $getBillNextMonth = $this->pembayaranRumah->firstPembayaranRumahWhereMonthAndYearArr('*', [
                'id_pelanggan' => $userPelanggan->id_pelanggan
            ], 'tgl_pr', now()->addMonth()->month, 'tgl_pr', now()->addMonth()->year);
            // Query for the next month and year



            // dd($getBillMonthNow);
            // dd($getBillNextMonth);
            return view('V_Guest.dashboard',
                compact(
                    'userPelanggan',
                    'getProjek',
                    'getPelangganProjek',
                    'getBillMonthNow',
                    'getBillNextMonth'


                )
            );
        }
        // CHECK AS GUEST


        return redirect('/login');
    }

    function changeProjek($projek)
    {

        // Store the selected project in the session array
        Session::pull('selectedProjeks', $projek);
        Session::push('selectedProjeks', $projek);
        // dd(Session::get('selectedProjeks',)[0]);
        return redirect()->route('dashboard.guest', $projek);
    }


}
