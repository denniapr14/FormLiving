<?php

namespace App\Http\Controllers;

use App\Models\Clusters;
use App\Models\Projek;
use App\Models\Rumah;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use App\Models\Promo;
use App\Models\ListPromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class C_Promo extends Controller
{
    public $rumah;
    public $cluster;
    public $userAdmin;
    public $userProjek;
    public $userNotif;
    public $projek;
    public $userMenu;
    public $listPromo;

    public function __construct()
    {
        $this->userNotif = new UserNotif();
        $this->projek = new Projek();
        $this->rumah = new Rumah();
        $this->cluster = new Clusters();
        $this->userAdmin = new UserAdmin();
        $this->userProjek = new UserProjek();
        $this->userMenu = new UserMenu();
        $this->listPromo = new ListPromo();
    }

    public function Promo($projek)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $promo = DB::table('list_promo')
            ->select('*')
            ->join('promo', 'list_promo.id_promo', '=', 'promo.id_promo')
            ->leftJoin('cluster', 'list_promo.codecluster', '=', 'cluster.codecluster')
            ->leftJoin('rumah', 'list_promo.id_rumah', '=', 'rumah.id_rumah')
            // ->leftJoin('formulir_pesanan', 'list_promo.id_promo', '=', 'formulir_pesanan.id_promo')
            // ->leftJoin('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            // ->leftJoin('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            // ->leftJoin('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            // ->where('formulir_pesanan.status_fp','!=','nonactive')
            ->where('rumah.id_projek', '=', $getProjek->id_projek)
            ->orderBy('promo.id_promo', 'desc')
            ->get();
        $getPromoFP =  DB::table('formulir_pesanan')
            ->join('promo', 'formulir_pesanan.id_promo', '=', 'promo.id_promo')
            ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            // ->leftjoin('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->where('rumah.id_projek', '=', $getProjek->id_projek)
            ->where('formulir_pesanan.status_fp', '!=', 'nonactive')
            ->get();
        // echo "<pre>";
        // print_r($promo);
        // dd($getPromoFP);
        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => session::get('user'),
        ])->collect();

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

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            $projekUser = $this->userProjek->getProjectUserWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );


            return view(
                'V_Admin.promo',
                compact(
                    'user',
                    'promo',
                    'projekUser',
                    'getProjek',
                    'getUserMenu',
                    'getPromoFP'
                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function addRumahPromo($projek)
    {
        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => session::get('user'),
        ])->collect();

        $foundMatchingMenu = false;

        foreach ($getUserMenu as $menu) {
            if ($menu->url_menu == request()->segment(1)) {
                $foundMatchingMenu = true;
                break;
            }
        }

        // if (!$foundMatchingMenu) {
        //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // }

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'Available')
            ->get();

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            $projekUser = $this->userProjek->getProjectUserWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            return view(
                'V_Admin.addPromoRumah',
                compact(
                    'user',

                    'rumah',
                    'projekUser',
                    'getProjek',
                    'getUserMenu'
                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function addRumahPromoAction(Request $request, $projek)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => session::get('user'),
        ])->collect();

        $foundMatchingMenu = false;

        foreach ($getUserMenu as $menu) {
            if ($menu->url_menu == request()->segment(1)) {
                $foundMatchingMenu = true;
                break;
            }
        }

        // if (!$foundMatchingMenu) {
        //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // }
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            $projekUser = $this->userProjek->getProjectUserWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            if (empty($request->rumah)) {
                redirect()->back()->with('error', 'Pilih rumah yang akan diterapkan promo');
            }
            $request->validate([
                'rumah' => 'required',
            ]);
            $dataInputRumahPromo = '';
            for ($i = 0; $i < count($request->rumah); ++$i) {
                $rumah = DB::table('rumah')
                    ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
                    ->whereIn('id_rumah', $request->rumah)
                    ->get();

                $dataInputRumahPromo = [
                    'id_rumah' => $request->rumah,
                ];
            }
            // dd($rumah);
            return view(
                'V_Admin.addPromo',
                compact(
                    'user',
                    'rumah',
                    'projekUser',
                    'dataInputRumahPromo',
                    'getProjek',
                    'getUserMenu'
                )
            );
            // dd($dataInputRumahPromo);
        } else {
            return redirect('/login');
        }
    }

    public function addPromo($projek)
    {
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'Available')
            ->get();
        $rumah2 = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'Available')
            ->get();

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => session::get('user'),
        ])->collect();

        $foundMatchingMenu = false;

        foreach ($getUserMenu as $menu) {
            if ($menu->url_menu == request()->segment(1)) {
                $foundMatchingMenu = true;
                break;
            }
        }

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            $projekUser = $this->userProjek->getProjectUserWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );


            return view(
                'V_Admin.addPromo',
                compact(
                    'user',
                    'rumah2',
                    'rumah',
                    'projekUser',
                    'getProjek',
                    'getUserMenu'
                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function addPromoAction(Request $request, $projek)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => session::get('user'),
        ])->collect();

        $foundMatchingMenu = false;

        foreach ($getUserMenu as $menu) {
            if ($menu->url_menu == request()->segment(1)) {
                $foundMatchingMenu = true;
                break;
            }
        }

        // if (!$foundMatchingMenu) {
        //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // }

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            $projekUser = $this->userProjek->getProjectUserWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            if ($request == null) {
                redirect()->back()->with('danger', 'Lengkapi data promo');
            }
            $request->validate([
                'kode_promo' => 'required',
            ]);

            $dataInputPromo = [
                'status'    => 'aktif',
                'promo' => $request->nama_promo,
                'kode_promo' => $request->kode_promo,
                'keterangan' => $request->ket_promo,
                'tipe_promo' => $request->tipe_promo,
                'kuota_promo' => $request->kuota_promo,
                'diskon_promo' => $request->diskon_promo,
                'tgl_aktif' => $request->tgl_mulai,
                'tgl_berakhir' => $request->tgl_berakhir,
                'bphtb_promo' => $request->bphtb,
                'freekpr_promo' => $request->kpr,
                'extra_cicilan' => $request->extra_cicilan,
                'jumlah_extra_cicilan' => $request->jumlah_cicilan
            ];
            $promoID = DB::table('promo')
                ->insertGetId($dataInputPromo);
            $dataListPromo = [];
            for ($i = 0; $i < count($request->id_rumah); ++$i) {
                array_push($dataListPromo, [
                    'id_promo' => $promoID,
                    'codecluster' => $request->codecluster[$i],
                    'id_rumah' => $request->id_rumah[$i],
                ]);

                // code...
            }

            DB::table('list_promo')
                ->insert($dataListPromo);
            // dd($dataInputPromo);

            return redirect()->route('promo.admin', $getProjek->nama_projek)->with('success', 'Promo berhasil ditambahkan');
            // return view('V_Admin.addPromo', compact('user', 'cluster', 'rumah'));
        } else {
            return redirect('/login');
        }
    }


    // UPDATE PROMOlistpr

    function updatePromo($projek, $id)
    {

        $decryptedID = Crypt::decrypt($id);

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getPromo = $this->listPromo->firstListPromoJoinPromoRumah('*', 'promo.id_promo', '=', $decryptedID);
        $getListPromo = $this->listPromo->getListPromoJoinPromoRumah('*', 'promo.id_promo', '=', $decryptedID);
        // dd($getPromo);
        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => session::get('user'),
        ])->collect();

        // dd($getPromo);
        $foundMatchingMenu = false;

        foreach ($getUserMenu as $menu) {
            if ($menu->url_menu == request()->segment(1)) {
                $foundMatchingMenu = true;
                break;
            }
        }


        // if (!$foundMatchingMenu) {
        //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // }

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            $projekUser = $this->userProjek->getProjectUserWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            return view(
                'V_Admin.editPromo',
                compact(
                    'user',

                    'projekUser',
                    'getProjek',
                    'getUserMenu',
                    'getPromo',
                    'getListPromo'
                )
            );
        } else {
            return redirect('/login');
        }
    }
    function updatePromoAction(Request $request, $projek, $id)
    {

        $decryptedID = Crypt::decrypt($id);
        $getPromo = $this->listPromo->firstListPromoJoinPromoRumah('*', 'list_promo.id_promo', '=', $decryptedID);

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        // $getCluster = $this->cluster->getRumahJoinClusterWhere('*', 'rumah.id_rumah', '=', $id);
        // dd($getRumah);

        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => session::get('user'),
        ])->collect();

        $foundMatchingMenu = false;

        foreach ($getUserMenu as $menu) {
            if ($menu->url_menu == request()->segment(1)) {
                $foundMatchingMenu = true;
                break;
            }
        }

        // if (!$foundMatchingMenu) {
        //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
        // }

        // $getRumah = $this->rumah->getRumahWhere('id_rumah', '=', $id);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            // $dataNotif = [
            //     'msg_notif' => 'User '.$user->nama_ua.' telah merubah rumah '.$getRumah->blok.'-'.$getRumah->nomor,
            //     'status_notif' => 'aktif',
            // ];

            // $this->userNotif->insertUserNotif($dataNotif);
            // dd($request->imgRumah);


            if ($request == null) {
                redirect()->back()->with('danger', 'Lengkapi data promo');
            }
            $request->validate([
                'kode_promo' => 'required',
            ]);

            $dataUpdatePromo = [
                'promo' => $request->nama_promo,
                'kode_promo' => $request->kode_promo,
                'keterangan' => $request->ket_promo,
                'tipe_promo' => $request->tipe_promo,
                'kuota_promo' => $request->kuota_promo,
                'diskon_promo' => $request->diskon_promo,
                'tgl_aktif' => $request->tgl_mulai,
                'tgl_berakhir' => $request->tgl_berakhir,
                'bphtb_promo' => $request->bphtb,
                'freekpr_promo' => $request->kpr,
                'extra_cicilan' => $request->extra_cicilan,
                'jumlah_extra_cicilan' => $request->jumlah_cicilan
            ];
            // dd($dataRumah);
            DB::table('promo')
                ->where('id_promo', $decryptedID)
                ->update(
                    $dataUpdatePromo
                );

            // dd($dataRumah);

            return redirect()->route('promo.admin', [$getProjek->nama_projek])->with('success', 'Data promo telah berhasil diubah');
            // return view(
            //     'V_Admin.rumah',
            //     compact(
            //         'user',
            //         'projekUser',
            //         'getRumah',
            //     )
            // );
        } else {
            return redirect('/login');
        }
    }
}
