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
use App\Models\User_projek;


// Controller
use App\Http\Controllers\WhatsappAPI;
// =======================
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Storage;
use Mail;
use PDF;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\If_;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;


class AdminFormsLiving_User extends Controller
{
    public $userAdminList;
    public $printDataUser;
    public function __construct() {
        $this->userAdminList = new User_projek;
        $this->printDataUser = new UserAdmin();
    }
    
    function ambilWaktu(){
        $waktuNow = carbon::now()->locale('id');
        $waktuNow = $waktuNow->settings(['formatFunction' => 'translatedFormat']);
        $waktuNow = $waktuNow->format('d F Y');
        return $waktuNow;
    }

    function listUser() {
        // $listDataAdmin = array(
        //     'code_ui_ua' = $request -> 
        // );
        // $getUserAdmin = $this->UserAdmin->getUserAdminOrderbyWhere()
        $getUserSales = DB::table('user_admin')
        ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
        ->whereNotNull('code_id_ua')
        ->orderByDesc('tgl_input_ua')
        ->get();
        $sesiKini = session::get('user');
        $projekUser = $this->userAdminList->getUserAdminListAllFromSession($sesiKini);
        
        if (session()->has('user')) {

            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->first();

            return view('AdminFormsLiving.listUser', compact(
                'user',
                'projekUser',
                'getUserSales'

            ));

        } else {
            return redirect('/login');
        }

    }

    function downloadPageUser(){
        $waktuNow = $this->ambilWaktu();
        $sesiNow = session::get('user');
        $userAll = $this->printDataUser->getPrintUserAdmin();
        $pdf = PDF::loadView('AdminFormsLiving.printUser', ['userAll' => $userAll,'waktuNow'=> $waktuNow])->setPaper('a4', 'potrait');
        // if (session()->has('user')) {
        //     return view('AdminFormsLiving.printUser',compact('userAll','waktuNow'));
        // }
        return $pdf->download('Laporan User Register Formsliving Tanggal ' . $waktuNow . ".pdf");
        
    }
}