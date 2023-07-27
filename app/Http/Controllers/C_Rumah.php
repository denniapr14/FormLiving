<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailAttachment;
use App\Mail\MailNotify;
// use App\Mail\MailAttachment;
use App\Models\Cluster;
// use Spatie\PdfToText\Pdf;
// use PDF;

// Model
use App\Models\Promo;
use App\Models\Rumah;


use Illuminate\Contracts\Auth\Guard;


// =======================

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;
use PDF;
class C_Rumah extends Controller
{
    //
    public $rumah;

    public function __construct()
    {
        $this->rumah = new Rumah;
    }

    function index()  {
        $getRumah = $this->rumah->getRumahAll();

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

            return view('V_Admin.rumah',
            compact(
                'user',
                'projekUser',
                'getRumah',

            ));

        } else {

            return redirect('/login');
        }

    }
}