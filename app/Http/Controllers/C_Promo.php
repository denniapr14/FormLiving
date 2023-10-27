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

    public $promo;

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
        $this->promo = new Promo();
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


            return view(
                'V_Admin.promo',
                compact(
                    'user',
                    'promo',
                    'projekUser',
                    'getProjek',
                    'getPromoFP',
                    'getUserMenu'
                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function addRumahPromo($projek)
    {

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->join('projek','rumah.id_projek','projek.id_projek')
            ->where('rumah.status', '=', 'Available')
            ->where('projek.nama_projek',"=",$projek)
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

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }
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

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }

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
            $kodePromo = RandomCode(4,$projek);
            $getPromo = $this->promo->firstPromo('*',['kode_promo' => $kodePromo]);
            if ($getPromo != null) {
                if ($kodePromo == $getPromo->kode_promo) {
                    $kodePromo = randomCode(4,$projek);
                }
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
                    'getUserMenu',
                    'kodePromo'

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
        // dd("aaa");

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


            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }

            return view('V_Admin.addPromo',
                compact(
                    'user',
                    'rumah2',
                    'rumah',
                    'projekUser',
                    'getProjek',
                    'getUserMenu',
                    'kodePromo'
                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function addPromoAction(Request $request, $projek)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

// dd($request);
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
                'jenis_promo' => $request->jenisPromo,
                'kode_promo' => $request->kode_promo,
                'keterangan' => $request->ket_promo,
                'tipe_promo' => $request->tipe_promo,
                'kuota_promo' => $request->kuota_promo,
                'status_diskon' => $request->statusDiskon,
                'diskon_promo' => $request->diskon_promo,
                'status_max_diskon' => $request->statusMaxDiskon,
                'max_diskon'        =>$request->maxDiskon,
                'tgl_aktif' => $request->tgl_mulai,
                'tgl_berakhir' => $request->tgl_berakhir,
                'bphtb_promo' => $request->bphtb,
                'freekpr_promo' => $request->kpr,
                'extra_cicilan' => $request->extra_cicilan,
                'jumlah_extra_cicilan' => $request->jumlah_cicilan
            ];
            // dd($dataInputPromo);
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

            // echo "<pre>";
            // print_r ($dataInputPromo);
            // echo "</pre>";

            // dd($dataListPromo);

            DB::table('list_promo')
                ->insert($dataListPromo);
            // dd($dataInputPromo);

            return redirect()->route('promo.admin', $getProjek->nama_projek)->with('successPromo', $request->kode_promo);
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

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }

            return view(
                'V_Admin.editPromo',
                compact(
                    'user',

                    'projekUser',
                    'getProjek',
                    'getPromo',
                    'getListPromo',
                    'getUserMenu',

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
                'jenis_promo' => $request->jenisPromo,
                'kode_promo' => $request->kode_promo,
                'keterangan' => $request->ket_promo,
                'tipe_promo' => $request->tipe_promo,
                'kuota_promo' => $request->kuota_promo,
                'status_diskon' => $request->statusDiskon,
                'diskon_promo' => $request->diskon_promo,
                'status_max_diskon' => $request->status_max_diskon,
                'max_diskon'        =>$request->maxDiskon,
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
        } else {
            return redirect('/login');
        }
    }

    function rumahPromoAutoComplete(Request $request, $projek)
    {

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        $searchTerm = $request->input('search');

        $rumah = $this->rumah->getRumahAll()->collect();
        $rumah = $rumah->where('status', 'Available');
        $rumah = $rumah->where('id_projek', $getProjek->id_projek);

        // Filter the $rumah collection based on 'blok' containing the search term
        $filteredRumah = $rumah->filter(function ($item) use ($searchTerm) {
            return str_contains($item->blok, $searchTerm);
        });

        // Extract the 'blok' values from the filtered collection
        $suggestions = $filteredRumah->pluck('blok')->unique()->values();

        return response()->json($suggestions);
    }
}
