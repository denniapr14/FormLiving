<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Job;
use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use App\Models\Rumah;

class C_Checklist extends Controller
{
    //

    public $userAdmin;
    public $userNotif;
    public $userProjek;
    public $rumah;
    public $projek;
    public $userMenu;
    public $job;
    public function __construct()
    {
        $this->job = new Job();
        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
        $this->rumah = new Rumah();
    }

    public function getChecklist($projek) {

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        //
        $getJob = $this->job->getJobWhereGroupBy('*',
        ['id_projek'=>$getProjek->id_projek],
        'termin_job',
        'termin_job',
        'asc')->collect();

        $getChecklist = DB::table('checklist as a')
        ->selectRaw("SUM(subbobot) as percentase,  a.*, r.*, jl.*, sub.*, clus.*,
        IF(a.id_pengawas1 IS NULL,'N/A',c.nama_ua) as pengawas1,
        IF(a.id_pengawas2 IS NULL,'N/A',b.nama_ua) as pengawas2")
        ->where([
            'r.id_projek' => $getProjek->id_projek,
            'a.status_checklist' => 'terkunci',
            'a.status_checklist' => 'progress'
        ])
        ->leftJoin('user_admin as b', 'b.id_user_admin', '=', 'a.id_pengawas2')
        ->leftJoin('user_admin as c', 'c.id_user_admin', '=', 'a.id_pengawas1')
        ->leftJoin('rumah as r', 'r.id_rumah', '=', 'a.id_rumah')
        ->leftJoin('cluster as clus','r.codecluster','clus.codecluster')
        ->leftJoin('joblist as jl', 'jl.id_joblist', '=', 'a.id_joblist')
        ->leftJoin('subkon as sub', 'sub.id_subkon', '=', 'a.id_subkon')

        ->groupBy('r.id_rumah')
        ->orderByRaw('jl.termin_jl AND a.id_checklist DESC')
        ->get();
        // dd($getChecklist);
        // $getJob = $getJob->where('id_projek',$getProjek->id_projek)->groupBy('termin_job')->sortBy('termin_job');
        // dd($getJob);
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


            return view('V_Admin.checklist',
                compact(
                    'user',
                    'projekUser',
                    'getJob',
                    'getProjek',
                    'getUserMenu',
                    'getChecklist'

                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function getTerminChecklist($projek, $id_rumah) {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);


        $decryptedID = Crypt::decrypt($id_rumah);
        $getRumah = $this->rumah->firstRumahWhereJoinCluster('*','rumah.id_rumah','=', $decryptedID);

        $getChecklist = DB::table('checklist as a')
        ->selectRaw("SUM(subbobot) as percentase,  a.*, r.*, jl.*, sub.*, clus.*, j.*,
        IF(a.id_pengawas1 IS NULL,'N/A',c.nama_ua) as pengawas1,
        IF(a.id_pengawas2 IS NULL,'N/A',b.nama_ua) as pengawas2")
        ->where([
            'r.id_projek' => $getProjek->id_projek,
            'r.id_rumah' => $decryptedID
        ])
        ->leftJoin('user_admin as b', 'b.id_user_admin', '=', 'a.id_pengawas2')
        ->leftJoin('user_admin as c', 'c.id_user_admin', '=', 'a.id_pengawas1')
        ->leftJoin('rumah as r', 'r.id_rumah', '=', 'a.id_rumah')
        ->leftJoin('cluster as clus','r.codecluster','clus.codecluster')
        ->leftJoin('joblist as jl', 'jl.id_joblist', '=', 'a.id_joblist')
        ->leftJoin('subkon as sub', 'sub.id_subkon', '=', 'a.id_subkon')
        ->Join('job as j','jl.id_job','=','j.id_job')
        ->groupBy('j.termin_job')
        ->orderByRaw('j.termin_job ASC')
        ->get();

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


            return view('V_Admin.terminChecklist',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                    'getProjek',
                    'getUserMenu',
                    'getChecklist'

                )
            );
        } else {
            return redirect('/login');
        }
    }
    public function getListChecklist($projek, $id_rumah,$termin) {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);


        $decryptedID = Crypt::decrypt($id_rumah);
        $decryptedTermin = Crypt::decrypt($termin);
        $getRumah = $this->rumah->firstRumahWhereJoinCluster('*','rumah.id_rumah','=', $decryptedID);

        $getChecklist = DB::table('checklist as a')
        ->selectRaw("a.*, jl.*, j.*")
        ->where([
            'a.id_rumah'   => $decryptedID,
            'j.termin_job' => $decryptedTermin,
        ])

        ->Join('joblist as jl', 'a.id_joblist', '=', 'jl.id_joblist')

        ->Join('job as j','jl.id_job','=','j.id_job')

        ->orderByRaw('jl.sort_jl ASC')
        ->get();
        // dd($getChecklist);
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


            return view('V_Admin.listChecklist',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                    'getProjek',
                    'getUserMenu',
                    'getChecklist'

                )
            );
        } else {
            return redirect('/login');
        }
    }
}
