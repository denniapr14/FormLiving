<?php

namespace App\Http\Controllers;

use App\Models\JobList;
use App\Models\Job;
use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class C_Joblist extends Controller
{

    public $userAdmin;
    public $userNotif;
    public $userProjek;

    public $projek;
    public $userMenu;
    public $job;

    public $joblist;

    public function __construct()
    {
        $this->job = new Job();
        $this->joblist = new JobList();
        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
    }
    public function getJoblist($projek, $id_job, $termin)
    {

        $decryptedID = Crypt::decrypt($id_job);
        $decryptedTermin = Crypt::decrypt($termin);
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getJob = $this->job->getJob('*')->collect();
        $getJob = $getJob->where('id_projek',$getProjek->id_projek);
        $getJob = $getJob->where('id_job',$decryptedID);
        $getJob = $getJob->first();
        // dd($getJob);
        $getJoblist = $this->joblist->getJoblist('*')->collect();
        $getJoblist = $getJoblist->where('id_projek', $getProjek->id_projek);
        $getJoblist = $getJoblist->where('id_job', $decryptedID);
        // dd($getJob->nama_job);
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

            return view(
                'V_Admin.joblist',
                compact(
                    'user',
                    'projekUser',
                    'getJob',
                    'getJoblist',
                    'getProjek',
                    'getUserMenu',
                    'decryptedTermin'

                )
            );
        } else {
            return redirect('/login');
        }
    }

    function addJoblist($projek, $id_job)
    {
        $decryptedID = Crypt::decrypt($id_job);
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getJob = $this->job->getJob('*')->collect();
        $getJob = $getJob->where('id_projek',$getProjek->id_projek);
        $getJob = $getJob->where('id_job',$decryptedID);
        $getJob = $getJob->first();
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
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



            return view(
                'V_Admin.addJoblist',
                compact(
                    'user',
                    'projekUser',
                    'getJob',

                    'getProjek',
                    'getUserMenu'

                )
            );
        } else {
            return redirect('/login');
        }
    }
    function addJoblistAction(Request $request, $projek,$id_job)
    {
        $decryptedID = Crypt::decrypt($id_job);
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getJob = $this->job->getJob('*')->collect();
        $getJob = $getJob->where('id_projek',$getProjek->id_projek);
        $getJob = $getJob->where('id_job',$decryptedID);
        $getJob = $getJob->first();
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
            $dataJob = array();

            for ($i = 0; $i < count($request->nama_jl); $i++) {
                # code...
                array_push(
                    $dataJob,
                    [
                        'id_job'   => $getJob->id_job,
                        'nama_jl'  => $request->nama_jl[$i],
                        'sort_jl'  => $request->sort_jl[$i],
                        'bobot_jl'    => $request->bobot_jl[$i],
                        'termin_jl'    => $getJob->termin_job,
                        'lantai_jl'    => $getJob->lantai_job,
                        'status_jl'    => "Aktif"
                    ]
                );
            }



            $this->joblist->insertJobList($dataJob);
            return redirect()
            ->route('joblist.admin', [$getProjek->nama_projek,Crypt::encrypt($getJob->id_job) , Crypt::encrypt($getJob->termin_job)])
            ->with('success', 'Rincian perkerjaan berhasil di tambah');
        } else {
            return redirect('/login');
        }
    }

    function editJoblistAction(Request $request, $projek, $id_job, $id)
    {
        $decryptedID_Job = Crypt::decrypt($id_job);
        $decryptedID = Crypt::decrypt($id);

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getJob = $this->job->getJob('*')->collect();
        $getJob = $getJob->where('id_projek',$getProjek->id_projek);
        $getJob = $getJob->where('id_job',$decryptedID_Job);
        $getJob = $getJob->first();
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


            # code...
            $dataJob =
                [
                    'nama_jl'  => $request->nama_jl,
                    'sort_jl'  => $request->sort_jl,
                    'bobot_jl'    => $request->bobot_jl,
                    'termin_jl'    => $request->termin_jl,
                    'lantai_jl'    => $request->lantai_jl,
                    'status_jl'    => "Aktif"
                ];
            DB::table('joblist')
                ->where('id_joblist', $decryptedID)
                ->update($dataJob);


            return redirect()
            ->route('joblist.admin', [$getProjek->nama_projek,Crypt::encrypt($getJob->id_job) , Crypt::encrypt($getJob->termin_job)])
            ->with('success', 'Perkerjaan berhasil di ubah');
        } else {
            return redirect('/login');
        }
    }
}
