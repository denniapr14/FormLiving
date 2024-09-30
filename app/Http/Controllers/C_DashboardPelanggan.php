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
use App\Models\CounterNotifPelanggan;
use App\Models\Checklist;

// =======================
use Illuminate\Support\Facades\DB;
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
    public $checklist;
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
        $this->checklist = new Checklist();
    }

    public function index($projek)
    {


        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere('id_pelanggan', '=', session::get('guest'));
            $getPelangganProjek = $this->pelangganProjek->getProjectPelangganWhere('user_pelanggan.id_pelanggan', '=', $userPelanggan->id_pelanggan);
            $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
            // dd("INI GUESTTTTTT");
            // dd($userPelanggan);
            $notificationsCounter = CounterNotifPelanggan::where('id_pelanggan',$userPelanggan->id_pelanggan)
        ->first();
        // dd($notificationsCounter);
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
            $getRumah = $this->formulirPesanan->getFormulirPesanan6Join(['id_pelanggan' => $userPelanggan->id_pelanggan]);
            // dd($getRumah);
            foreach ($getRumah as $getRumah) {
                # code...
                $getChecklist = $this->checklist->countChecklistJoinJoblistJob("*",['id_rumah' => $getRumah->id_rumah])->collect();

                $getChecklistAll = DB::table('checklist as a')
                ->selectRaw("SUM(subbobot) as percentase,  a.*, r.*, jl.*, sub.*, clus.*,
    IF(a.id_pengawas1 IS NULL,'N/A',c.nama_ua) as pengawas1,
    IF(a.id_pengawas2 IS NULL,'N/A',b.nama_ua) as pengawas2")
                ->where([
                    'a.id_rumah' => $getRumah->id_rumah,

                ])
                ->leftJoin('user_admin as b', 'b.id_user_admin', '=', 'a.id_pengawas2')
                ->leftJoin('user_admin as c', 'c.id_user_admin', '=', 'a.id_pengawas1')
                ->leftJoin('rumah as r', 'r.id_rumah', '=', 'a.id_rumah')
                ->leftJoin('cluster as clus', 'r.codecluster', 'clus.codecluster')
                ->leftJoin('joblist as jl', 'jl.id_joblist', '=', 'a.id_joblist')
                ->leftJoin('subkon as sub', 'sub.id_subkon', '=', 'a.id_subkon')

                ->orderByRaw('jl.termin_jl AND a.id_checklist DESC')
                ->groupBy('r.id_rumah')
                ->get();
            }
            if (!empty($getChecklist) && !empty($getChecklistAll)) {
                # code...
                $countChecklist = count($getChecklist);
                $countChecklistDone = $getChecklist->where('status_checklist', 'selesai')->count($getChecklist);
                // $getChecklistSelesai = $this->checklist->countChecklistJoinJoblistJob('*,Count(*) as TotalDone',['id_rumah' => $getRumah->id_rumah, 'checklist.status_checklist' => 'selesai']);
                // dd($getChecklistAll);
            }else{
                $getChecklist="";
                $countChecklist="";
                $countChecklistDone="";
                $getChecklistAll="";
            }


            // dd($getBillMonthNow);
            // dd($getBillNextMonth);
            return view('V_Guest.dashboard',
                compact(
                    'userPelanggan',
                    'getProjek',
                    'getPelangganProjek',
                    'getBillMonthNow',
                    'getBillNextMonth',
                    'getChecklistAll',
                    'countChecklist',
                    'countChecklistDone',
                    'notificationsCounter'


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
