<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Contracts\Auth\Guard;

// Controller
// =======================
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mail;
use PDF;


class C_Login extends Controller
{
    public function Login()
    {

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])->first();

            // dd($user);
            // die();
            return view('login', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('login', compact('userPelanggan'));
        }
        // if (!session()->has('guest') || session()->has('user')) {
        //     return redirect("/login")->with('error',"You not sign in or sign up!");
        //     # code...
        //     $hasilSess = Session::get('guest');
        //     response()->json('hasilSess');

        //     return view('housing',compact('hasilSess'));
        // }
        return view('login');
    }

    public function LoginAction(Request $request)
    {
        $user = \App\Models\UserAdmin::where([
            'username_ua' => $request->username,
            'password_ua' => md5($request->password),
        ])->first();

        // CHECK PELANGGAN
        $userPelanggan = \App\Models\UserPelanggan::where([
            'username_plgn' => $request->username,
            'password_plgn' => md5($request->password),
        ])->first();

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!empty($user)) {
            if (Auth::guard('admin')->attempt(['username_ua' => $request->username, 'password' => md5($request->password)], $request->get('remember'))) {

                Session::put('user', $user->id_user_admin);
                $hasilSess = Session::get('user');

                $userRole = $this->Role(Session::get('user'));

                switch ($userRole) {
                    case 'AdminAccounting':
                        return redirect('/dashboard-admin/Greenland')->with('success', "You're Sign in!");
                        break;
                    case 'Admin':
                        return redirect('/')->with('success', "You're Sign in!");
                        break;

                    case 'CEO':
                        return redirect('/')->with('success', "You're Sign in!");
                        break;
                    case 'AdminFormsLiving':
                        return redirect('/dashboard-admin/Greenland')->with('success',"You're Sign in!");
                    break;
                    case 'SuperAdmin':
                        return redirect('/dashboard-admin/Greenland')->with('success',"You're Sign in!");
                    break;

                    default:
                        return redirect('/')->with('success', "You're Sign in!");
                        break;
                }
            }
        }

        if (!empty($userPelanggan)) {
            if (Auth::guard('guest')->attempt(['username_plgn' => $request->username, 'password' => md5($request->password)], $request->get('remember'))) {

                Session::put('guest', $userPelanggan->id_pelanggan);

                return redirect('/Greenland')

                    ->with('success', "You're Sign in!");
            }
        }

        return redirect("login")->with('error', 'Login details are not valid');
    }
    public function Role($idUser)
    {

        $user = DB::table('user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

            ->where('user_admin.id_user_admin', '=', $idUser)

            ->first();

        // dd($user->kategori);
        // die();

        return $user->kategori;
    }

    public function forgotPassword($email){
        // if(!session()->has('guest') || session()->has('user')){
        //     Session::flush('guest');
        //     Session::flush('user');
        // }
        $user = DB::table('user_admin')
            ->where('user_admin.email_ua', '=', $email)
            ->first();
            // dd($user); 
       return view('forgotPassword',compact('user'));
    }

    public function forgotAction(request $request){
       
        
        

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed'
            // Add more validation rules as needed
        ]);
        
        if ($validator->fails()) {
            $customMessages = [
                'required' => ':attribute Masih Kosong',
                'min' => ' :attribute kurang dari 6',
                'confirmed' => ' :attribute tidak sama dengan konfirmasi password'
            ];
        }

        Session::flash('toastr', [
            'type' => 'error',
            'message' => 'Please fix the following issues:',
            'options' => ['timeOut' => 5000], // Toastr options
        ]);
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function Logout()
    {
        Session::flush('guest');
        Session::flush('user');
        return redirect('/')->with('success', "You're sign out!");
    }
}