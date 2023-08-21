<?php

namespace App\Http\Controllers;


use App\Mail\MailAttachment;
use App\Mail\MailNotify;
// use App\Mail\MailAttachment;
// use Spatie\PdfToText\Pdf;
// use PDF;

// Model
use App\Models\Promo;
use App\Models\Departemen;
use App\Models\Rumah;
use App\Models\TipeRumah;
use App\Models\UserAdmin;
use App\Models\UserPelanggan;
use App\Models\Clusters;
use App\Models\GambarRumah;
use Illuminate\Contracts\Auth\Guard;

// Controller
// =======================
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Mail;
use PDF;

class C_Simulasi extends Controller
{
    public $rumah;
    public $cluster;
    public  $promoList;
    public $userList;
    public $userAdmin;
    public $userPelanggan;
    public $tipeRumah;
    public $gambarRumah;


    public function __construct()
    {
        $this->rumah = new Rumah();
        $this->promoList = new Promo();
        $this->userList = new UserPelanggan();
        $this->cluster = new Clusters();
        $this->userAdmin = new UserAdmin();
        $this->userPelanggan = new UserPelanggan();
        $this->tipeRumah = new TipeRumah();
        $this->gambarRumah = new GambarRumah();
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:admin')->except('logout');
        // // $this->middleware('guest:writer')->except('logout');
    }
    //

    public function SimCluster()
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...
        }

        $cluster = $this->cluster->getClusterProjekWhereArr(
            '*',
            ['projek.id_projek' => 1]
        );
        $rumah = $this->rumah->getRumahSelectJoinClusterProjek(
            '*',
            [
                'rumah.id_projek'   => 1,
                'rumah.status'      => 'Available'
            ]
        );

        //session check untuk user
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );
            return view('simCluster', compact(
                'user',
                'cluster',
                'rumah'
            ));
        }
        // session check untuk pelanggan
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );

            return view('simCluster', compact(
                'userPelanggan',
                'cluster',
                'rumah'
            ));
        }
        return view('simCluster', compact(
            'cluster',
            'rumah'
        ));
        # code...
    }

    public function SimType($id_rumah)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $rumah = $this->rumah->firstRumahWhereJoinCluster('*','rumah.id_rumah', '=', $id_rumah);

        // dd($rumah);
        // die();
        $tipe = $this->gambarRumah->getGambarRumahJoinTipeRumahGroupBy(
            '*',
            [
                'gambar_rumah.id_rumah' => $id_rumah,

            ],
            'tipe_rumah.id_tipe_rumah'
        )->collect();
        // dd($tipe);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );
            // dd($user);
            // die();
            return view('simType', compact(
                'user',
                'tipe',
                'rumah'
            ));
        }
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );
            // dd($userPelanggan);
            // die();
            return view('simType', compact(
                'userPelanggan',
                'tipe',
                'rumah'
            ));
        }
        return view('simType', compact('tipe'), compact('rumah'));
        # code...
    }

    public function SimDetailType($id_rumah, $id_tipe)
    {
        $rumah = $this->rumah->firstRumahWhereJoinCluster('*','rumah.id_rumah', '=', $id_rumah);

        $tipeRumah = $this->tipeRumah->firstTipeRumah('*',['id_tipe_rumah' => $id_tipe]);
        // dd($tipeRumah);
        // die();
        $imgRumahSingle =$this->gambarRumah->firstGambarRumah('*',
        [
            'id_tipe'=> $id_tipe,
        'jenis_img' => "gambar"
    ]);
        $imgRumah = $this->gambarRumah->getGambarRumahWhereArr(
            '*',
            [
                'id_rumah' => $id_rumah,
                'id_tipe' => $id_tipe,
                'jenis_img' => 'gambar',
                'status_gr' => 'aktif'
            ]
        );
        $imgRumah2 = $this->gambarRumah->getGambarRumahWhereArr(
            '*',
            [
                'id_rumah' => $id_rumah,
                'id_tipe' => $id_tipe,
                'jenis_img' => 'gambar',
                'status_gr' => 'aktif'
            ]
        );
        $imgDenah = $this->gambarRumah->getGambarRumahWhereArr(
            '*',
            [
                'id_rumah' => $id_rumah,
                'id_tipe' => $id_tipe,
                'jenis_img' => 'denah',
                'status_gr' => 'aktif'
            ]
        );



            // dd($imgRumah2);

        // dd($imgDenah);
        // die();

        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            // dd($user);
            // die();
            // return view('underMT');
            return view('simDetailType', compact(
                'user',
                'rumah',
                'tipeRumah',
                'imgRumahSingle',
                'imgRumah',
                'imgRumah2',
                'imgDenah'
            ));
        }
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );
            // dd($userPelanggan);
            // die();
            // return view('underMT');
            return view('simDetailType', compact(
                'userPelanggan',
                'rumah',
                'tipeRumah',
                'imgRumahSingle',
                'imgRumah',
                'imgRumah2',
                'imgDenah'
            ));
        }
        return view('simDetailType', 'rumah', 'tipeRumah', 'imgRumahSingle', 'imgRumah', 'imgDenah');

        # code...
    }
}
