<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

use App\Models\Job;
use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use App\Models\Rumah;
use App\Models\Subkon;
use App\Models\JobList;
use App\Models\Checklist;

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
    public $checklist;
    public $subkon;
    public $joblist;
    public $checklist;
    public function __construct()
    {
        $this->job = new Job();
        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
        $this->rumah = new Rumah();
        $this->subkon = new Subkon();
        $this->joblist = new JobList();
        $this->checklist = new Checklist();
    }

    public function getChecklist($projek)
    {

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        //
        $getJob = $this->job->getJobWhereGroupBy(
            '*',
            ['id_projek' => $getProjek->id_projek],
            'termin_job',
            'termin_job',
            'asc'
        )->collect();


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

            $getChecklist = "";

            if ($user->kategori == "Pengawas") {
                $getChecklist = DB::table('checklist as a')
                    ->selectRaw("SUM(subbobot) as percentase,  a.*, r.*, jl.*, sub.*, clus.*,
        IF(a.id_pengawas1 IS NULL,'N/A',c.nama_ua) as pengawas1,
        IF(a.id_pengawas2 IS NULL,'N/A',b.nama_ua) as pengawas2")
                    ->where([
                        'r.id_projek' => $getProjek->id_projek,
                        'a.status_checklist' => 'progress',
                        'a.id_pengawas1'     =>  $user->id_user_admin
                    ])
                    ->orWhere('a.id_pengawas2', $user->id_user_admin) // Add this condition
                    ->leftJoin('user_admin as b', 'b.id_user_admin', '=', 'a.id_pengawas2')
                    ->leftJoin('user_admin as c', 'c.id_user_admin', '=', 'a.id_pengawas1')
                    ->leftJoin('rumah as r', 'r.id_rumah', '=', 'a.id_rumah')
                    ->leftJoin('cluster as clus', 'r.codecluster', 'clus.codecluster')
                    ->leftJoin('joblist as jl', 'jl.id_joblist', '=', 'a.id_joblist')
                    ->leftJoin('subkon as sub', 'sub.id_subkon', '=', 'a.id_subkon')

                    ->groupBy('r.id_rumah')
                    ->orderByRaw('jl.termin_jl AND a.id_checklist DESC')
                    ->get();
            } else {
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
                    ->leftJoin('cluster as clus', 'r.codecluster', 'clus.codecluster')
                    ->leftJoin('joblist as jl', 'jl.id_joblist', '=', 'a.id_joblist')
                    ->leftJoin('subkon as sub', 'sub.id_subkon', '=', 'a.id_subkon')

                    ->groupBy('r.id_rumah')
                    ->orderByRaw('jl.termin_jl AND a.id_checklist DESC')
                    ->get();
            }

            $getRumah = $this->rumah->getRumahProjekWhereAll('status','=','Sold');
            $getSubkon = $this->subkon->getSubkon();
            $getPengawas = $this->userAdmin->getUserAdminWhere('*',['ktgr_admin.kategori'=> "Pengawas"]);
            // dd($getPengawas);

            foreach ($getUserMenu as $menu) {
                if ($menu->url_menu == request()->segment(1)) {
                    $foundMatchingMenu = true;
                    break;
                }
            }
            if (!$foundMatchingMenu) {
                return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            }


            return view(
                'V_Admin.checklist',
                compact(
                    'user',
                    'projekUser',
                    'getJob',
                    'getProjek',
                    'getUserMenu',
                    'getChecklist',
                    'getRumah',
                    'getSubkon',
                    'getPengawas'

                )
            );
        } else {
            return redirect('/login');
        }
    }

    function addChecklistAction(Request $request, $projek) {
        $getChecklist = $this->checklist->getChecklistWhere(['checklist.id_rumah' => $request->rumah]);

        if ($getChecklist !== null) {
            return redirect()->back()->with('error','Checklist sudah ada!');
        }

        $getJoblist = $this->joblist->getJoblistWhere(['joblist.lantai_jl'=>$request->lantai]);
        $dataInput = "";
        $nextMonth = "";
        if ($request->lantai == 1) {
            $nextMonth = date("Y-m-d", strtotime("+1 month"));
        } if ($request->lantai == 2) {
            $nextMonth = date("Y-m-d", strtotime("+2 month"));
        }

        foreach ($getJoblist as $joblist) {
            # code...
            if ($joblist->termin_jl == 1) {
                $dataInput = [
                    'id_rumah' => $request->rumah,
                    'id_subkon' => $request->subkon,
                    'id_pengawas1' => $request->pengawas1,
                    'id_pengawas2' => $request->pengawas2,
                    'tgl_deadline' => $nextMonth,
                    'status_checklist' =>"progress"
                ];
            }else{
                $dataInput = [
                    'id_rumah' => $request->rumah,
                    'id_subkon' => $request->subkon,
                    'id_pengawas1' => $request->pengawas1,
                    'id_pengawas2' => $request->pengawas2,
                    'tgl_deadline' => $nextMonth,
                    'status_checklist' =>"terkunci"
                ];
            }



        }
        return redirect()->back()->with('success','Checklist berhasil ditambahkan!');

    }

    public function nextTermin($projek, $id_rumah)
    {

        $decryptedID = Crypt::decrypt($id_rumah);

        $lantai = DB::table('checklist')
        ->join('joblist','checklist.id_joblist','joblist.id_joblist')
        ->where([
            'checklist.id_rumah' => $decryptedID,
            'checklist.status_checklist' => "selesai"
            ])
        ->orderByDesc('id_checklist')
        ->first();


        $setTermin = null;
        foreach ($lantai as $gt) {
            $setTermin = $gt->termin_jl + 1;
            if ($gt->termin_jl == 5) {

                return redirect()->back()->with('error','Termin sudah selesai!');
            }
        }

        $rumah = DB::table('rumah')->where('id_rumah', $id_rumah)->get();
        foreach ($lantai as $lantai) {
            if ($lantai->lantai_jl == 1) {
                $nextMonth = date("Y-m-d", strtotime("+1 month"));
                DB::table('checklist')
                ->join('joblist','checklist.id_joblist','joblist.id_joblist')
                ->where([
                    'checklist.id_rumah' => $decryptedID,
                    'joblist.termin_jl' => $lantai->termin_jl,
                    'checklist.status_checklist' => "terkunci"
                ])
                ->update([
                    'checklist.status_checklist' =>"progress",
                    'chechlist.tgl_deadline' => $nextMonth
                    ]);

            }
            if ($lantai->lantai_jl == 2) {
                $nextMonth = date("Y-m-d", strtotime("+2 month"));
                DB::table('checklist')
                ->join('joblist','checklist.id_joblist','joblist.id_joblist')
                ->where([
                    'checklist.id_rumah' => $decryptedID,
                    'joblist.termin_jl' => $lantai->termin_jl,
                    'checklist.status_checklist' => "terkunci"
                ])
                ->update([
                    'checklist.status_checklist' =>"progress",
                    'chechlist.tgl_deadline' => $nextMonth
                    ]);
            }
        }


        return redirect()->back()->with('success','Termin sudah menjadi termin '.$setTermin);
    }

    public function costumTermin(Request $request, $projek, $id_rumah)
    {
        $decryptedID = Crypt::decrypt($id_rumah);
        $lantai = DB::table('checklist')
        ->join('joblist','checklist.id_joblist','joblist.id_joblist')
        ->where([
            'checklist.id_rumah' => $decryptedID,
            'checklist.status_checklist' => "selesai"
            ])
        ->orderByDesc('id_checklist')
        ->first();

        $setTermin = null;
        foreach ($lantai as $gt) {
            $setTermin = $gt->termin_jl + 1;
            if ($gt->termin_jl == 5) {

                return redirect()->back()->with('error','Termin sudah selesai!');
            }
        }

        foreach ($lantai as $lantai) {
            if ($lantai->lantai_jl == 1) {
                DB::table('checklist')
                ->join('joblist','checklist.id_joblist','joblist.id_joblist')
                ->where([
                    'checklist.id_rumah' => $decryptedID,
                    'joblist.termin_jl' => $lantai->termin_jl,
                    'checklist.status_checklist' => "terkunci"
                ])
                ->update([
                    'checklist.status_checklist' =>"progress",
                    'chechlist.tgl_deadline' => $request->tanggalTermin,
                    ]);
            }
            if ($lantai->lantai_jl == 2) {
                $nextMonth = date("Y-m-d", strtotime("+2 month"));
                DB::table('checklist')
                ->join('joblist','checklist.id_joblist','joblist.id_joblist')
                ->where([
                    'checklist.id_rumah' => $decryptedID,
                    'joblist.termin_jl' => $lantai->termin_jl,
                    'checklist.status_checklist' => "terkunci"
                ])
                ->update([
                    'checklist.status_checklist' =>"progress",
                    'chechlist.tgl_deadline' => $request->tanggalTermin,
                    ]);
            }
        }

        return redirect()->back()->with('success','Termin sudah menjadi termin '.$setTermin);
    }



    public function getTerminChecklist($projek, $id_rumah)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);


        $decryptedID = Crypt::decrypt($id_rumah);
        $getRumah = $this->rumah->firstRumahWhereJoinCluster('*', 'rumah.id_rumah', '=', $decryptedID);



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
            $getChecklist = "";

            if ($user->kategori == "Pengawas") {
                $getChecklist = DB::table('checklist as a')
                    ->selectRaw("SUM(subbobot) as percentase,  a.*, r.*, jl.*, sub.*, clus.*, j.*,
            IF(a.id_pengawas1 IS NULL,'N/A',c.nama_ua) as pengawas1,
            IF(a.id_pengawas2 IS NULL,'N/A',b.nama_ua) as pengawas2")
                    ->where([
                        'r.id_projek' => $getProjek->id_projek,
                        'r.id_rumah' => $decryptedID,
                        'a.id_pengawas' => $user->id_user_admin,
                    ])
                    ->orWhere('a.id_pengawas2', $user->id_user_admin) // Add this condition
                    ->leftJoin('user_admin as b', 'b.id_user_admin', '=', 'a.id_pengawas2')
                    ->leftJoin('user_admin as c', 'c.id_user_admin', '=', 'a.id_pengawas1')
                    ->leftJoin('rumah as r', 'r.id_rumah', '=', 'a.id_rumah')
                    ->leftJoin('cluster as clus', 'r.codecluster', 'clus.codecluster')
                    ->leftJoin('joblist as jl', 'jl.id_joblist', '=', 'a.id_joblist')
                    ->leftJoin('subkon as sub', 'sub.id_subkon', '=', 'a.id_subkon')
                    ->Join('job as j', 'jl.id_job', '=', 'j.id_job')
                    ->groupBy('j.termin_job')
                    ->orderByRaw('j.termin_job ASC')
                    ->get();
            } else {
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
                    ->leftJoin('cluster as clus', 'r.codecluster', 'clus.codecluster')
                    ->leftJoin('joblist as jl', 'jl.id_joblist', '=', 'a.id_joblist')
                    ->leftJoin('subkon as sub', 'sub.id_subkon', '=', 'a.id_subkon')
                    ->Join('job as j', 'jl.id_job', '=', 'j.id_job')
                    ->groupBy('j.termin_job')
                    ->orderByRaw('j.termin_job ASC')
                    ->get();
            }



            return view(
                'V_Admin.terminChecklist',
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
    public function getListChecklist($projek, $id_rumah, $termin)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);


        $decryptedID = Crypt::decrypt($id_rumah);
        $decryptedTermin = Crypt::decrypt($termin);
        $getRumah = $this->rumah->firstRumahWhereJoinCluster('*', 'rumah.id_rumah', '=', $decryptedID);


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

            $getChecklist = "";
            if ($user->kategori == "Pengawas") {
                $getChecklist = DB::table('checklist as a')
                    ->selectRaw("a.*, jl.*, j.*")
                    ->where([
                        'a.id_rumah'   => $decryptedID,
                        'j.termin_job' => $decryptedTermin,
                        'a.id_pengawas' => $user->id_user_admin,
                    ])
                    ->orWhere('a.id_pengawas2', $user->id_user_admin) // Add this condition
                    ->Join('joblist as jl', 'a.id_joblist', '=', 'jl.id_joblist')

                    ->Join('job as j', 'jl.id_job', '=', 'j.id_job')

                    ->orderByRaw('jl.sort_jl ASC')
                    ->get();
            } else {
                $getChecklist = DB::table('checklist as a')
                    ->selectRaw("a.*, jl.*, j.*")
                    ->where([
                        'a.id_rumah'   => $decryptedID,
                        'j.termin_job' => $decryptedTermin,
                    ])

                    ->Join('joblist as jl', 'a.id_joblist', '=', 'jl.id_joblist')

                    ->Join('job as j', 'jl.id_job', '=', 'j.id_job')

                    ->orderByRaw('jl.sort_jl ASC')
                    ->get();
            }

            return view(
                'V_Admin.listChecklist',
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
    function editChecklist($projek, $id_rumah, $termin, $id_checklist)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);


        $decryptedID = Crypt::decrypt($id_rumah);
        $decryptedTermin = Crypt::decrypt($termin);
        $decryptedIdChecklist = Crypt::decrypt($id_checklist);

        $getRumah = $this->rumah->firstRumahWhereJoinCluster('*', 'rumah.id_rumah', '=', $decryptedID);

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

            $getChecklist = "";
            if ($user->kategori == "Pengawas") {
                $getChecklist = DB::table('checklist as a')
                    ->selectRaw("a.*, jl.*, j.*")
                    ->where([
                        'a.id_rumah'        => $decryptedID,
                        'j.termin_job'      => $decryptedTermin,
                        'a.id_checklist'    => $decryptedIdChecklist,
                        'a.id_pengawas'     => $user->id_user_admin
                    ])
                    ->orWhere('a.id_pengawas2', $user->id_user_admin) // Add this condition
                    ->Join('joblist as jl', 'a.id_joblist', '=', 'jl.id_joblist')

                    ->Join('job as j', 'jl.id_job', '=', 'j.id_job')
                    ->first();
            } else {
                $getChecklist = DB::table('checklist as a')
                    ->selectRaw("a.*, jl.*, j.*")
                    ->where([
                        'a.id_rumah'        => $decryptedID,
                        'j.termin_job'      => $decryptedTermin,
                        'a.id_checklist'    => $decryptedIdChecklist,
                    ])

                    ->Join('joblist as jl', 'a.id_joblist', '=', 'jl.id_joblist')

                    ->Join('job as j', 'jl.id_job', '=', 'j.id_job')
                    ->first();
            }
            // dd($getChecklist);


            return view(
                'V_Admin.editChecklist',
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
    function editChecklistAction(Request $request, $projek, $id_rumah, $termin, $id_checklist)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        $decryptedID = Crypt::decrypt($id_rumah);
        $decryptedTermin = Crypt::decrypt($termin);
        $decryptedIdChecklist = Crypt::decrypt($id_checklist);

        $getChecklist = DB::table('checklist as a')
            ->selectRaw("a.*, jl.*, j.*")
            ->where([
                'a.id_rumah'        => $decryptedID,
                'j.termin_job'      => $decryptedTermin,
                'a.id_checklist'    => $decryptedIdChecklist,
            ])
            ->Join('joblist as jl', 'a.id_joblist', '=', 'jl.id_joblist')

            ->Join('job as j', 'jl.id_job', '=', 'j.id_job')
            ->first();

        $getRumah = $this->rumah->firstRumahWhereJoinCluster('*', 'rumah.id_rumah', '=', $decryptedID);

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
            $dataInput = "";
            $foto = $request->file('foto');
            if (empty($foto)) {
                // Compress the uploaded image
                $dataInput = [
                    'foto' => $getChecklist->foto,
                    'status_cek_pengawas1' => $request->status_cek_pengawas1,
                    'status_cek_pengawas2' => $request->status_cek_pengawas2,
                    'status_checklist'     => $request->status_checklist,
                    'subbobot'             => $request->bobot,
                    'lat_checklist'        => $request->lat_checklist,
                    'long_checklist'       => $request->long_checklist,
                    'keterangan'           => $request->keterangan,
                ];
            } else {
                $compressedImage = Image::make($foto)->encode('jpg', 50); // Adjust the quality as needed

                // Store the compressed image in storage and get its path
                $fotoPath = $compressedImage->store('Home/images/termin', 'public');

                // Get the filename from the $fotoPath
                $filename = basename($fotoPath);
                $dataInput = [
                    'foto' => $filename,
                    'status_cek_pengawas1' => $request->status_cek_pengawas1,
                    'status_cek_pengawas2' => $request->status_cek_pengawas2,
                    'status_checklist'     => $request->status_checklist,
                    'subbobot'             => $request->bobot,
                    'lat_checklist'        => $request->lat_checklist,
                    'long_checklist'       => $request->long_checklist,
                    'keterangan'           => $request->keterangan,
                ];
                // Update the database record with the new photo path

            }
            // dd($dataInput);
            DB::table('checklist')
                ->where('id_checklist', $decryptedIdChecklist)
                ->update($dataInput);
            return redirect()->route('getListChecklist.admin', [$getProjek->nama_projek, Crypt::encrypt($decryptedID), Crypt::encrypt($decryptedTermin)])->with('success', 'data termin telah diubah!');
        } else {
            return redirect('/login');
        }
    }











    public function checkPinPendamping(Request $request,  $projek, $id_rumah, $termin, $id_checklist)
    {
        $user = $this->userAdmin->firstUserAdminWhere(
            '*',
            [
                'ktgr_admin.kategori' => "Pendamping",
                'user_admin.pin_ua'   => $request->input('pin')
            ]
        );
        // Perform your PIN validation logic here


        // Example validation logic
        if ($user) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
