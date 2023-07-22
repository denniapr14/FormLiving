<?php

namespace App\Http\Controllers;

// Model

// Controller
// =======================
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;
use PDF;



class AdminADV_Dashboard extends Controller
{
    //
    public function __construct()
    {
        if (!session()->has('user')) {
            return redirect('/login');
        }
    }

    public function index()
    {
        $fp = DB::table('formulir_pesanan')
            ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->where('formulir_pesanan.status_fp', '!=', 'nonactive')
            ->orderBy('formulir_pesanan.tgl_input_fp', 'desc')
            ->get();

        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')

            ->get();
        $getRumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('rumah.status','=','available')

            ->get();



        $agentWithCompany = DB::table('user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->select(DB::raw('COUNT(user_admin.id_user_admin) as count'))
            ->where([
                'ktgr_admin.kategori' => "AgentWithCompany",
                'user_admin.status_ua' => "aktif",
            ])
            ->first();
        $agentWithoutCompany = DB::table('user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->select(DB::raw('COUNT(user_admin.id_user_admin) as count'))
            ->where([
                'ktgr_admin.kategori' => "AgentWithoutCompany",
                'user_admin.status_ua' => "aktif",
            ])
            ->first();
        $closingAll = DB::table('formulir_pesanan')
            ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->select(DB::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
            ->first();

        $closing = DB::table('formulir_pesanan')
            ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month)
            ->select(DB::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
            ->first();

        $remainHouse = DB::table('rumah')
            ->select(DB::raw('COUNT(rumah.id_rumah) as count'))
            ->where([

                'status' => "Available",
            ])
            ->first();

        $promo = DB::table('promo')
            ->leftJoin('cluster', 'promo.codecluster', '=', 'cluster.codecluster')
            ->leftJoin('rumah', 'promo.id_rumah', '=', 'rumah.id_rumah')
            ->get();

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

            return view('AdminAdv.dashboard', compact(
                'user',
                'fp',
                'promo',
                'agentWithCompany',
                'agentWithoutCompany',
                'closingAll',
                'closing',
                'remainHouse',
                'projekUser',
                'rumah',
                'getRumah',
            ));
        } else {

            return redirect('/login');
        }
        # code...
    }

    function TipeRumah($id_rumah) {
        $getRumah = DB::table('rumah')
        ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')

        ->first();

        $getTipeRumah =  DB::table('tipe_rumah')

        ->where([

            'id_rumah' => $id_rumah,
        ])
        ->get();

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

            return view('AdminAdv.tipeRumah', compact(
                'user',
                'projekUser',
                'getRumah',
                'getTipeRumah',
            ));
        } else {

            return redirect('/login');
        }
    }
    function addTipeRumah($id_rumah) {
        $getRumah = DB::table('rumah')
        ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')

        ->first();

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

            return view('AdminAdv.addTipeRumah', compact(
                'user',
                'projekUser',
                'getRumah',

            ));
        } else {

            return redirect('/login');
        }
    }

    function listImageTipeRumah($id_tipe_rumah)  {
        $getRumah = DB::table('tipe_rumah')
        ->join('rumah','tipe_rumah.id_rumah','=','rumah.id_rumah')
        ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
        ->where('tipe_rumah.id_tipe_rumah','=',$id_tipe_rumah)
        ->first();
        $getImageTipeRumah = DB::table('gambar_rumah')
        ->where('id_tipe','=',$id_tipe_rumah)
        ->get();


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

            return view('AdminAdv.listImageTipeRumah', compact(
                'user',
                'projekUser',
                'getRumah',
                'getImageTipeRumah',
            ));
        } else {

            return redirect('/login');
        }
    }

    function addImgTipeRumah($id_rumah)  {
        $getRumah = DB::table('tipe_rumah')
        ->join('rumah','tipe_rumah.id_rumah','=','rumah.id_rumah')
        ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
        ->where('rumah.id_rumah','=',$id_rumah)
        ->first();
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

            return view('AdminAdv.addImageTipeRumah', compact(
                'user',
                'projekUser',
                'getRumah',
            ));
        } else {

            return redirect('/login');
        }
    }
}