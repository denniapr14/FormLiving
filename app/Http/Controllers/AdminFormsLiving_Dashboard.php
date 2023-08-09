<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// Model
use App\Models\UserAdmin;
use App\Models\UserPelanggan;
use App\Models\TipeRumah;
use App\Models\Rumah;
use App\Models\Cluster;
use App\Models\Promo;


// Controller
use App\Http\Controllers\WhatsappAPI;
// =======================
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Storage;
use Mail;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\If_;
use Intervention\Image\Facades\Image;

class AdminFormsLiving_Dashboard extends Controller
{
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
            ->where('formulir_pesanan.status_fp','!=','nonactive')
            ->orderBy('formulir_pesanan.tgl_input_fp', 'desc')
            ->get();

        $rumah =  DB::table('rumah')
        ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
        // ->orderBy('rumah.status', 'asc')
        ->get();
        $getRumah =  DB::table('rumah')
        ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
        ->orderBy('rumah.status', 'asc')
        ->get();
        // $GEt =  DB::table('rumah')
        // ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')

        // ->get();


        // $getRumah = $rumah->GetRumah();
        //     // $rumah = DB::table('rumah')
        //     // ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')

        //     // ->get();

        $agentWithCompany = DB::table('user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->select(DB::raw('COUNT(user_admin.id_user_admin) as count'))
            ->where([
                'ktgr_admin.kategori' => "AgentWithCompany",
                'user_admin.status_ua'  => "aktif"
            ])
            ->first();
        $agentWithoutCompany = DB::table('user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->select(DB::raw('COUNT(user_admin.id_user_admin) as count'))
            ->where([
                'ktgr_admin.kategori' => "AgentWithoutCompany",
                'user_admin.status_ua'  => "aktif"
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

        $remainHouse =  DB::table('rumah')
            ->select(DB::raw('COUNT(rumah.id_rumah) as count'))
            ->where([

                'status'  => "Available"
            ])
            ->first();

        $promo = DB::table('promo')
            ->leftJoin('cluster', 'promo.codecluster', '=', 'cluster.codecluster')
            ->leftJoin('rumah', 'promo.id_rumah', '=', 'rumah.id_rumah')
            ->get();

        $projekUser = DB::table('user_projek')
        ->join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
        ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
        ->where('user_admin.id_user_admin', '=', session::get('user'))
        ->get();
        
        if (session()->has('user')) {

            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->first();

            return view('AdminFormsLiving.dashboard', compact(
                'user',
                'fp',
                'promo',
                'agentWithCompany',
                'agentWithoutCompany',
                'closingAll',
                'closing',
                'remainHouse',
                'rumah',
                'getRumah',
                'projekUser'
            ));

        } else {

            return redirect('/login');
        }
        # code...
    }

    //
}