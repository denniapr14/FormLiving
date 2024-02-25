<?php

namespace App\Http\Controllers;

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

class C_Job extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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

    public function getJob($projek)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        //
        $getJob = $this->job->getJobWhereGroupBy('*',
        ['id_projek'=>$getProjek->id_projek],
        'termin_job',
        'termin_job',
        'asc')->collect();
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


            return view('V_Admin.job',
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
    function getJobTermin($projek, $termin) {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        //
        $decrypted = Crypt::decrypt($termin);
        $getJob = $this->job->getJob('*')->collect();
        $getJob = $getJob->where('termin_job',$decrypted);
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



            return view('V_Admin.jobTermin',
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

    function addJob($projek) {
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



            return view('V_Admin.addJob',
                compact(
                    'user',
                    'projekUser',

                    'getProjek',
                    'getUserMenu'

                )
            );
        } else {
            return redirect('/login');
        }
    }
    function addJobAction(Request $request,$projek) {
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
            $dataJob = array();

            for ($i=0; $i < count($request->nama_job) ; $i++) {
                # code...
                array_push($dataJob,
                [
                    'id_projek' => $getProjek->id_projek,
                    'nama_job'  => $request->nama_job[$i],
                    'lantai_job'    => $request->lantai_job[$i],
                    'termin_job'    => $request->termin_job[$i],
                    'status_job'    => "Aktif"
                ]);

            }
            $this->job->insertJob($dataJob);
            return redirect()->route('job.admin',$getProjek->nama_projek)->with('success','Perkerjaan berhasil di ubah');
        } else {
            return redirect('/login');
        }
    }

    function editJobAction(Request $request,$projek, $id) {



        $decryptedID = Crypt::decrypt($id);
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


                # code...
                $dataJob =
                [
                    'id_projek' => $getProjek->id_projek,
                    'nama_job'  => $request->nama_job,
                    'lantai_job'    => $request->lantai_job,
                    'termin_job'    => $request->termin_job,
                    'status_job'    => $request->status_job
                ];
            DB::table('job')
                ->where('id_job', $decryptedID)
                ->update($dataJob);


            return redirect()->route('jobTermin.admin',[$getProjek->nama_projek, Crypt::encrypt($request->termin_job)])->with('success','Perkerjaan berhasil di ubah');
        } else {
            return redirect('/login');
        }
    }
}
