<?php

namespace App\Http\Controllers;

use App\Models\Clusters;
use App\Models\Projek;
use App\Models\Rumah;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;

use App\Models\UserProjek;
use Illuminate\Http\Request;
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
    public function __construct()
    {
        $this->userNotif = new UserNotif();
        $this->projek = new Projek();
        $this->rumah = new Rumah();
        $this->cluster = new Clusters();
        $this->userAdmin = new UserAdmin();
        $this->userProjek = new UserProjek();
        $this->userMenu = new UserMenu();
    }

    public function Promo($projek)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $promo = DB::table('promo')
            ->leftJoin('cluster', 'promo.codecluster', '=', 'cluster.codecluster')
            ->leftJoin('rumah', 'promo.id_rumah', '=', 'rumah.id_rumah')
            ->leftJoin('formulir_pesanan', 'promo.id_promo', '=', 'formulir_pesanan.id_promo')
            ->leftJoin('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->leftJoin('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->leftJoin('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            // ->where('formulir_pesanan.status_fp','!=','nonactive')
            ->orderBy('promo.id_promo', 'desc')
            ->get();


            $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
                'user_menu.status_um' => 'aktif',
                'user_menu.id_user_admin' => session::get('user')
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
            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', session::get('user'))

                ->first();
            $projekUser = DB::table('user_projek')
                ->join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
                ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->get();

            return view('V_Admin.promo', compact(
                'user',
                'promo',
                'projekUser',
                'getProjek'
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
            'user_menu.id_user_admin' => session::get('user')
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

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'Available')
            ->get();

        if (session()->has('user')) {
            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', Session::get('user'))

                ->first();
            $projekUser = DB::table('user_projek')
                ->join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
                ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->get();

            return view('V_Admin.addPromoRumah', compact(
                'user',

                'rumah',
                'projekUser',
                'getProjek'
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
            'user_menu.id_user_admin' => session::get('user')
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
            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', session::get('user'))

                ->first();
            $projekUser = DB::table('user_projek')
                ->join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
                ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->get();
                if (empty($request->rumah)) {
                    redirect()->back()->with('error','Pilih rumah yang akan diterapkan promo');
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
            return view('V_Admin.addPromo', compact(
                'user',
                'rumah',
                'projekUser',
                'dataInputRumahPromo',
                'getProjek'
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
            'user_menu.id_user_admin' => session::get('user')
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
            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', Session::get('user'))

                ->first();
            $projekUser = DB::table('user_projek')
                ->join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
                ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->get();

            return view('V_Admin.addPromo', compact(
                'user',
                'rumah2',
                'rumah',
                'projekUser',
                'getProjek'
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
                'user_menu.id_user_admin' => session::get('user')
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
            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', session::get('user'))

                ->first();
            if ($request == null) {
                redirect()->back()->with('danger','Lengkapi data promo');
            }
            $request->validate([
                'kode_promo' => 'required',
            ]);

            $dataInputPromo = [
                'promo' => $request->nama_promo,
                'kode_promo' => $request->kode_promo,
                'keterangan' => $request->ket_promo,
                'tipe_promo' => $request->tipe_promo,
                'kuota_promo' => $request->kuota_promo,
                'diskon_promo' => $request->diskon_promo,
                'tgl_aktif' => $request->tgl_mulai,
                'tgl_berakhir' => $request->tgl_berakhir,
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
}
