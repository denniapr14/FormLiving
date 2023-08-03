<?php

namespace App\Http\Controllers;

// MODELS
use App\Models\Cluster;
use App\Models\Rumah;
use App\Models\UserAdmin;
use App\Models\UserProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class C_Rumah extends Controller
{
    public $rumah;
    public $cluster;
    public $userAdmin;
    public $userProjek;

    public function __construct()
    {
        $this->rumah = new Rumah();
        $this->cluster = new Cluster();
        $this->userAdmin = new UserAdmin();
        $this->userProjek = new UserProjek();
    }

    public function index()
    {
        $getRumah = $this->rumah->getRumahSelectCountGroupBy();
        // dd($getRumah);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            return view(
                'V_Admin.rumah',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function storeRumah()
    {
        // $getRumah = $this->rumah->getRumahAll();
        $getCluster = $this->cluster->getClusterAll();
        // dd($getRumah);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            return view(
                'V_Admin.addRumah',
                compact(
                    'user',
                    'projekUser',
                    'getCluster',
                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function storeRumahAction(Request $request)
    {
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
        ];

        // $id = DB::table('rumah')->insert(
        //     $dataRumah
        // );
        $getIdRumah = $this->rumah->insertRumahId($dataRumah);
        // dd($id);
        $getRumah = $this->rumah->getRumahWhere('id_rumah', '=', $getIdRumah);

        return response()->json($getRumah);
    }
    function updateRumah($id)
    {

        $getCluster = $this->rumah->getRumahJoinClusterWhere('*', 'rumah.id_rumah', '=', $id);
        $getRumah = $this->rumah->getRumahWhere('id_rumah', '=', $id);
        // dd($getCluster);

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            return view(
                'V_Admin.editRumah',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                    'getCluster',
                )
            );
        } else {
            return redirect('/login');
        }
    }

    function updateRumahActionNoJS(Request $request, $id)
    {

        // $getCluster = $this->cluster->getRumahJoinClusterWhere('*', 'rumah.id_rumah', '=', $id);
        // dd($getRumah);
        if (session()->has('user')) {

            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            // dd($request->imgRumah);
            // $filename = "";

            $img = $request->file('imgRumah');

            // Generate a unique filename based on the current timestamp and the original file extension
            $filename = $request->blok.'-'.$request->nomor.'-'.time() . '.' . $img->getClientOriginalExtension();

            // Store the image in the 'images' folder under the 'public' disk
            $path = 'Home/images/rumah/';
            $img = Image::make($img);
            $img->save(public_path($path . $filename));



            $dataRumah = [
                'codecluster' => $request->cluster,
                'blok' => $request->blok,
                'nomor' => $request->nomor,
                'status' => $request->status,
                'status_stock' => $request->stock,
                'img_rumah'           => $filename
            ];
            DB::table('rumah')
            ->where('id_rumah', $id)
            ->update(
                $dataRumah
            );

            // dd($dataRumah);



return redirect('/rumah-admin')->with('success','Data rumah '.$request->blok.'-'.$request->nomor.' telah berhasil diubah');
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
}
