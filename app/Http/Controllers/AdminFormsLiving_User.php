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


class AdminFormsLiving_User extends Controller
{
    //
    function listUser() {
        $getUserSales = DB::table('user_admin')
        ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
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

            return view('AdminFormsLiving.listUser', compact(
                'user',
                'projekUser',
                'getUserSales'

            ));

        } else {

            return redirect('/login');
        }

    }
}
