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

class C_Checklist extends Controller
{
    //

    public $userAdmin;
    public $userNotif;
    public $userProjek;

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
            'r.id_projek' => $getProjek->id_projek
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
}
