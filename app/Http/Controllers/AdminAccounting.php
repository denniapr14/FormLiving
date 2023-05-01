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
use Mail;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\If_;

class AdminAccounting extends Controller
{

    public function index()
    {

        $fp = DB::table('formulir_pesanan')
        ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
        ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
        ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
        ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
        ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')



        ->get();
        if (session()->has('user')) {

            $user = DB::table('user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

            ->where('user_admin.id_user_admin', '=', session::get('user'))

            ->first();

            return view('AdminAccounting.dashboard', compact('user','fp'));
        }else{

            return redirect('/login');
        }

        # code...
    }
    public function formulirPesanan($id_formulir)
    {
        $fp = DB::table('formulir_pesanan')
        ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
        ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
        ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
        ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
        ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
        ->where('id_formulir','=',$id_formulir)
        ->first();

        // dd($fp);
        // die();
        if (session()->has('user')) {

            $user = DB::table('user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

            ->where('user_admin.id_user_admin', '=', session::get('user'))

            ->first();

            return view('AdminAccounting.formulirPesanan', compact('user','fp'));
        }else{

            return redirect('/login');
        }


        # code...
    }
}