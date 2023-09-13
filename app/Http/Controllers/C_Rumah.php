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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class C_Rumah extends Controller
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

    public function index(Request $request, $projek)
    {
        $getRumah = $this->rumah->getRumahSelectCountGroupByWhereAll('projek.nama_projek', '=', $projek);
        // dd($getRumah);

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

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
            'msg_notif' => 'User '.$user->nama_ua.' telah memasukan rumah '.$request->blok.'-'.$request->nomor,
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
                'msg_notif' => 'User '.$user->nama_ua.' telah merubah rumah '.$getRumah->blok.'-'.$getRumah->nomor,
                'status_notif' => 'aktif',
            ];

            $this->userNotif->insertUserNotif($dataNotif);
            // dd($request->imgRumah);
            $filename = $getRumah->img_rumah;
            if ($request->file('imgRumah')) {
                $img = $request->file('imgRumah');

                // Generate a unique filename based on the current timestamp and the original file extension
                $filename = $request->blok.'-'.$request->nomor.'-'.time().'.'.$img->getClientOriginalExtension();

                // Store the image in the 'images' folder under the 'public' disk
                $path = 'Home/images/rumah/';
                $img = Image::make($img);
                $img->save(public_path($path.$filename));
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

            return redirect('/rumah-admin/'.$projek)->with('success', 'Data rumah '.$request->blok.'-'.$request->nomor.' telah berhasil diubah');
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
}
