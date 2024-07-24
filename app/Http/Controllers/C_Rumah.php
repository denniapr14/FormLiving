<?php

namespace App\Http\Controllers;

// MODELS
use App\Models\Clusters;
use App\Models\Projek;
use App\Models\Rumah;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use App\Models\GambarRumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;

class C_Rumah extends Controller
{
    public $rumah;
    public $tipeRumah;
    public $cluster;
    public $userAdmin;
    public $userProjek;
    public $userNotif;
    public $projek;
    public $userMenu;
    public $gambarRumah;


    public function __construct()
    {
        $this->userNotif = new UserNotif();
        $this->projek = new Projek();
        $this->rumah = new Rumah();
        $this->tipeRumah = new TipeRumah();
        $this->cluster = new Clusters();
        $this->userAdmin = new UserAdmin();
        $this->userProjek = new UserProjek();
        $this->userMenu = new UserMenu();
        $this->gambarRumah = new GambarRumah();
    }

    public function index(Request $request, $projek)
    {
        $getRumah = $this->rumah->getRumahSelectCountGroupByWhereAll('projek.nama_projek', '=', $projek);
        // dd($getRumah);
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));
            //dd($user);
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

            return view(
                'V_Admin.rumah',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                    'getProjek',
                    'getUserMenu'

                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function storeRumah($projek)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        $getCluster = $this->cluster->getClusterProjekWhere('*', 'projek.nama_projek', '=', $projek);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

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

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }

            return view(
                'V_Admin.addRumah',
                compact(
                    'user',
                    'projekUser',
                    'getCluster',
                    'getProjek',
                    'getUserMenu'

                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function storeRumahAction(Request $request)
    {




        $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));
        $dataNotif = [
            'msg_notif' => 'User ' . $user->nama_ua . ' telah memasukan rumah ' . $request->blok . '-' . $request->nomor,
            'status_notif' => 'aktif',
        ];

        $this->userNotif->insertUserNotif($dataNotif);

        $request->validate([
            'cluster' => 'required',
            'blok' => 'required',
            'nomor' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:1',
            'status' => 'required',
            'stock' => 'required',
        ]);

        $dataRumah = [
            'id_projek' => $request->projek,
            'codecluster' => $request->cluster,
            'blok' => $request->blok,
            'nomor' => $request->nomor,
            'status' => $request->status,
            'status_stock' => $request->stock,
            'luas_tanah' => $request->luasTanah,
            'va_rumah' => $request->va,
            // 'imgRumah' => $filename,
        ];

        // $this->userNotif->insertUserNotif($dataNotif);
        // $id = DB::table('rumah')->insert(
        //     $dataRumah
        // );
        $getIdRumah = $this->rumah->insertRumahId($dataRumah);
        // dd($id);
        $getRumah = $this->rumah->getRumahWhere('id_rumah', '=', $getIdRumah);

        return response()->json($getRumah);
    }

    public function updateRumah($projek, $id)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getCluster = $this->rumah->getRumahJoinClusterWhere('*', 'rumah.id_rumah', '=', $id);
        $getRumah = $this->rumah->getRumahWhere('id_rumah', '=', $id);
        // dd($getRumah);


        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

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

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }
            return view(
                'V_Admin.editRumah',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                    'getCluster',
                    'getProjek',
                    'getUserMenu'

                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function updateRumahActionNoJS(Request $request, $projek, $id)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        // $getCluster = $this->cluster->getRumahJoinClusterWhere('*', 'rumah.id_rumah', '=', $id);
        // dd($getRumah);



        $getRumah = $this->rumah->getRumahWhere('id_rumah', '=', $id);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

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

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }

            $dataNotif = [
                'msg_notif' => 'User ' . $user->nama_ua . ' telah merubah rumah ' . $getRumah->blok . '-' . $getRumah->nomor,
                'status_notif' => 'aktif',
            ];

            $this->userNotif->insertUserNotif($dataNotif);
            // dd($request->imgRumah);
            $filename = $getRumah->img_rumah;
            if ($request->file('imgRumah')) {
                $img = $request->file('imgRumah');

                // Generate a unique filename based on the current timestamp and the original file extension
                $filename = $request->blok . '-' . $request->nomor . '-' . time() . '.' . $img->getClientOriginalExtension();

                // Store the image in the 'images' folder under the 'public' disk
                $path = 'Home/images/rumah/';
                $img = Image::make($img);
                $img->save(public_path($path . $filename));
            }

            $dataRumah = [
                'id_projek' => $getProjek->id_projek,
                'codecluster' => $request->cluster,
                'blok' => $request->blok,
                'nomor' => $request->nomor,
                'status' => $request->status,
                'status_stock' => $request->status_stock,
                'img_rumah' => $filename,
                'luas_tanah' => $request->luasTanah,
                'va_rumah' => $request->vaRumah,
            ];
            // dd($dataRumah);
            DB::table('rumah')
                ->where('id_rumah', $id)
                ->update(
                    $dataRumah
                );

            // dd($dataRumah);

            return redirect('/rumah-admin/' . $projek)->with('success', 'Data rumah ' . $request->blok . '-' . $request->nomor . ' telah berhasil diubah');
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

    public function updateRumahAction(Request $request, $id)
    {
        // $getRumah = $this->rumah->getRumahWhere('id_rumah','=',$id);
        // $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));
        // $dataNotif = [
        //     'msg_notif'  => "User ".$user->nama_ua." telah merubah rumah ".$getRumah->blok.'-'.$getRumah->nomor,
        //     'status_notif'  => "aktif",

        // ];

        // $this->userNotif->insertUserNotif($dataNotif);

        $request->validate([
            'cluster' => 'required',
            'blok' => 'required',
            'nomor' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:1',
            'status' => 'required',
            'stock' => 'required',
        ]);

        $dataRumah = [
            'codecluster' => $request->cluster,
            'blok' => $request->blok,
            'nomor' => $request->nomor,
            'status' => $request->status,
            'status_stock' => $request->stock,
            'luas_tanah' => $request->luasTanah,
            'va_rumah' => $request->va,
        ];

        // $id = DB::table('rumah')->insert(
        //     $dataRumah
        // );
        DB::table('rumah')
            ->where('id_rumah', $id)
            ->update(
                $dataRumah
            );

        // Update the data with the new values
        // $data->update($dataRumah);
        // $this->rumah->updateRumah($id, $dataRumah);
        // // dd($id);
        $getRumah = $this->rumah->getRumahWhere('id_rumah', '=', $id);

        return response()->json($getRumah);
    }

    public function deleteRumah($projek, $id)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
    }


    function getProjekApi()
    {
        $projek = $this->projek->getProjekAll();

        return response()->json($projek);
        // return ['nama' => "hehe"];
    }
    function getRumahWhereApi($projek, $min_harga, $max_harga)
    {
        $arrProjek = array($projek);
        $rumah = $this->rumah->getRumahWhereTipeRumahApi([
            "rumah.blok", "rumah.nomor", "tipe_rumah.harga_tr", "projek.nama_projek", "cluster.nama_cluster", "tipe_rumah.kmr_mandi_tr", "tipe_rumah.kmr_tidur_tr", "tipe_rumah.harga_tr", "tipe_rumah.img_tr", "tipe_rumah.luas_bangunan_tr", "rumah.luas_tanah", "tipe_rumah.id_tipe_rumah"
        ], $arrProjek, [
            ['tipe_rumah.harga_tr', '>=', $min_harga,],
            ['tipe_rumah.harga_tr', '<=', $max_harga,]
        ]);
        // dd($rumah);

        return response()->json($rumah);
    }

    function getTipeRumahApi($tipeRumah)
    {

        $data = $this->rumah->firstRumahWhereTipeRumahApi('*', ['tipe_rumah.id_tipe_rumah' => $tipeRumah]);
        return response()->json($data);
    }

    public function searchRumahAdvanceApi(Request $request) {
        $arrProjek = [$request->projek];
        $whereQuery = [['rumah.status', '=', 'Available']];

        if ($request->has('projek')) {
            $arrProjek[] = $request->projek;
        }
        if ($request->has('min_harga')) {
            $whereQuery[] = ['tipe_rumah.harga_tr', '>=', $request->min_harga];
        }
        if ($request->has('max_harga')) {
            $whereQuery[] = ['tipe_rumah.harga_tr', '<=', $request->max_harga];
        }
        if ($request->has('kmr_mandi')) {
            $whereQuery[] = ['tipe_rumah.kmr_mandi_tr', '=', $request->kmr_mandi];
        }
        if ($request->has('kmr_tidur')) {
            $whereQuery[] = ['tipe_rumah.kmr_tidur_tr', '=', $request->kmr_tidur];
        }
        if ($request->has('luas_tanah')) {
            $whereQuery[] = ['rumah.luas_tanah', '<=', $request->luas_tanah];
        }
        if ($request->has('luas_bangunan')) {
            $whereQuery[] = ['tipe_rumah.luas_bangunan_tr', '<=', $request->luas_bangunan];
        }

        if ($request->has('pondasi')) {
            $whereQuery[] = ['tipe_rumah.pondasi_tr', 'LIKE', '%' . $request->pondasi . '%'];
        }
        if ($request->has('struktur')) {
            $whereQuery[] = ['tipe_rumah.struktur_tr', 'LIKE', '%' . $request->struktur . '%'];
        }
        if ($request->has('dinding_dalam')) {
            $whereQuery[] = ['tipe_rumah.dinding_dalam_tr', 'LIKE', '%' . $request->dinding_dalam . '%'];
        }
        if ($request->has('dinding_luar_kamar_mandi')) {
            $whereQuery[] = ['tipe_rumah.dinding_luar_kamar_mandi_tr', 'LIKE', '%' . $request->dinding_luar_kamar_mandi . '%'];
        }
        if ($request->has('dinding_kmr_mnd_tr')) {
            $whereQuery[] = ['tipe_rumah.dinding_kmr_mnd_tr', 'LIKE', '%' . $request->dinding_kmr_mnd_tr . '%'];
        }
        if ($request->has('meja_dapur')) {
            $whereQuery[] = ['tipe_rumah.meja_dapur_tr', 'LIKE', '%' . $request->meja_dapur . '%'];
        }
        if ($request->has('lantai_ruang_tidur')) {
            $whereQuery[] = ['tipe_rumah.lt_ruang_tidur_tr', 'LIKE', '%' . $request->lantai_ruang_tidur . '%'];
        }
        if ($request->has('lantai_ruang_keluarga')) {
            $whereQuery[] = ['tipe_rumah.lt_ruang_keluarga_tr', 'LIKE', '%' . $request->lantai_ruang_keluarga . '%'];
        }
        if ($request->has('lantai_teras_utama')) {
            $whereQuery[] = ['tipe_rumah.lt_teras_utama_tr', 'LIKE', '%' . $request->lantai_teras_utama . '%'];
        }
        if ($request->has('rangka_atap')) {
            $whereQuery[] = ['tipe_rumah.rangka_atap_tr', 'LIKE', '%' . $request->rangka_atap . '%'];
        }
        if ($request->has('penutup_atap')) {
            $whereQuery[] = ['tipe_rumah.penutup_atap_tr', 'LIKE', '%' . $request->penutup_atap . '%'];
        }
        if ($request->has('kusen')) {
            $whereQuery[] = ['tipe_rumah.kusen_tr', 'LIKE', '%' . $request->kusen . '%'];
        }
        if ($request->has('daun_pintu')) {
            $whereQuery[] = ['tipe_rumah.daun_pintu_tr', 'LIKE', '%' . $request->daun_pintu . '%'];
        }
        if ($request->has('sanitary')) {
            $whereQuery[] = ['tipe_rumah.sanitary_tr', 'LIKE', '%' . $request->sanitary . '%'];
        }
        if ($request->has('plafon_dalam')) {
            $whereQuery[] = ['tipe_rumah.plafon_dalam_tr', 'LIKE', '%' . $request->plafon_dalam . '%'];
        }
        if ($request->has('handle')) {
            $whereQuery[] = ['tipe_rumah.handle_tr', 'LIKE', '%' . $request->handle . '%'];
        }
        if ($request->has('lighting')) {
            $whereQuery[] = ['tipe_rumah.lighting_tr', 'LIKE', '%' . $request->lighting . '%'];
        }
        if ($request->has('daya_listrik')) {
            $whereQuery[] = ['tipe_rumah.daya_listrik_tr', 'LIKE', '%' . $request->daya_listrik . '%'];
        }
        if ($request->has('carport')) {
            $whereQuery[] = ['tipe_rumah.carport_tr', 'LIKE', '%' . $request->carport . '%'];
        }
        if ($request->has('tangga')) {
            $whereQuery[] = ['tipe_rumah.tangga_tr', 'LIKE', '%' . $request->tangga . '%'];
        }

        $rumah = $this->rumah->getRumahWhereTipeRumahApi(
            [
                "rumah.blok",
                "rumah.nomor",
                "tipe_rumah.harga_tr",
                "projek.nama_projek",
                "cluster.nama_cluster",
                "tipe_rumah.kmr_mandi_tr",
                "tipe_rumah.kmr_tidur_tr",
                "tipe_rumah.harga_tr",
                "tipe_rumah.img_tr",
                "tipe_rumah.luas_bangunan_tr",
                "rumah.luas_tanah",
                "tipe_rumah.id_tipe_rumah"
            ],
            $arrProjek,
            $whereQuery
        );

        return response()->json($rumah);
    }

    function getDenahDetailTipeRumahApi($tipeRumah)  {
        $dataDenahTipeRumah = $this->gambarRumah->getGambarRumahJoinTipeRumahGroupBy('*',[
            ['gambar_rumah.jenis_img','=', 'denah'],
            ['tipe_rumah.id_tipe_rumah','=',$tipeRumah]
        ],'tipe_rumah.id_tipe_rumah');
        return response()->json($dataDenahTipeRumah);

    }


    public function getVarTipeRumahApi()
    {
        $varTipeRumah = DB::table('var_tipe_rumah')->where(1)->first();
        return response()->json($varTipeRumah);
    }
}
