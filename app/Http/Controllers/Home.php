<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

// Model
use App\Models\UserAdmin;
use App\Models\UserPelanggan;
use App\Models\TipeRumah;
// =======================

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\If_;

class Home extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:admin')->except('logout');
        // // $this->middleware('guest:writer')->except('logout');
    }
    //

    // =============================== NAVBAR
    public function index()
    {
        // Session
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])->first();

            // dd($userPelanggan);
            // die();
            return view('home', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('home', compact('userPelanggan'));
        }
        // end sess
        return view('home');
    }

    public function housing()
    {

        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...

        }

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])->first();

            // dd($user);
            // die();
            return view('housing', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('housing', compact('userPelanggan'));
        }
        return view('housing');
    }

    // ===========================================================

    // LOGIN
    public function Login()
    {
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
            'password_ua' => md5($request->password)
        ])->first();

        // CHECK PELANGGAN
        $userPelanggan = \App\Models\UserPelanggan::where([
            'username_plgn' => $request->username,
            'password_plgn' => md5($request->password)
        ])->first();


        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);



        // dd($user);
        // die();
        //         $user = UserAdmin::where('username', '=', Input::get('username'))->first();

        //         if(isset($user)) {
        //             if($user->password == md5(Input::get('password'))) { // If their password is still MD5
        //                 $user->password = Hash::make(Input::get('password')); // Convert to new format
        //                 $user->save();
        //                 Auth::login(Input::get('username'));
        //     }
        // }
        // dd(Auth::guard('admin')->attempt(['username_ua' => $request->username, 'password' => md5($request->password)]));
        // die();
        // $credentials = $request->only('username_ua', 'password_ua');

        if (!empty($user)) {
            if (Auth::guard('admin')->attempt(['username_ua' => $request->username, 'password' => md5($request->password)], $request->get('remember'))) {

                Session::put('user', $user->id_user_admin);
                $hasilSess = Session::get('user');


                // return response()->json($hasilSess);
                // dd($hasilSess);
                // die();
                return redirect('/');

                // return "Daaaaa";
                // return redirect()->intended('dashboard')
                //             ->withSuccess('Signed in');
            }
        }

        if (!empty($userPelanggan)) {
            if (Auth::guard('guest')->attempt(['username_plgn' => $request->username, 'password' => md5($request->password)], $request->get('remember'))) {
                // dd($request->session()->all());
                // die();
                // $dataSess = array(
                //     'id_pelanggan'  => $userPelanggan->id_pelanggan,
                //     'nama_plgn'     => $userPelanggan->nama_plgn
                // );
                Session::put('guest', $userPelanggan->id_pelanggan);
                # code...
                // $hasilSess = Session::get('guest');


                // return response()->json($hasilSess);
                // dd($hasilSess);
                // die();

                return redirect('/housing')

                    ->with('success', "You're Sign in!");

                // return "Daaaaa";
                // return redirect()->intended('dashboard')
                //             ->withSuccess('Signed in');
            }
        }
        // return "salah";


        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function Logout()
    {
        Session::flush('guest');
        Session::flush('user');
        return redirect('/')->with('success', "You're sign out!");
    }

    protected function guard($guard)
    {
        return Auth::guard($guard);
    }


    // ===================== OPTIONAL ============================
    public function MyCart()
    {
        return view('mycart');
        # code...
    }

    public function Cluster()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('cluster', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('cluster', compact('userPelanggan'));
        }

        return view('cluster');
        # code...
    }
    public function DetailCluster()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('detailCluster', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('detailCluster', compact('userPelanggan'));
        }


        return view('detailCluster');
        # code...
    }

    public function SplashScreen()
    {
        return view('splashScreen');
        # code...
    }

    public function LoadingPage()
    {
        return view('loadingPage');
        # code...
    }
    public function VirtualTour()
    {
        return view('virtualTour');
        # code...
    }


    // ======================- END OPTIONAL -=====================



    // ===================== Profile ============================

    public function EditProfile()
    {
         if (!session()->has('guest') || session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...



        }

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('editProfile', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('editProfile', compact('userPelanggan'));
        }

        return view('editProfile');
        # code...
    }

    public function FilterResult()
    {
        return view('filterResult');
        # code...
    }
    public function ProfileSetting()
    {
        if (!session()->has('guest') || session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...



        }

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('profileSetting', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('profileSetting', compact('userPelanggan'));
        }

        return view('profileSetting');
        # code...
    }

    public function ProfileSettingAction(Request $request)
    {


        // if (session()->has('user')) {
        //     $user = \App\Models\UserAdmin::where([
        //             'id_user_admin' => session::get('user'),
        //         ])
        //         ->join('ktgr_admin')
        //         ->first();

        //     // dd($user);
        //     // die();
        //     return view('profileSetting', compact('user'));
        // }
        if (session()->has('guest')) {



            // dd($userPelanggan);
            // die();
            $this->validate($request, [
                'username'  => 'required',
                'nama'      => 'required',
                'email'     => 'required',
                'telp'      => 'required',
                'wa'        => 'required',
                'password'  => 'required|min:6'
            ]);

            $userPelanggan = \App\Models\UserPelanggan::where([
                'username_plgn' => $request->username,
                'password_plgn' => md5($request->password)
            ])->first();
// dd(session::get('guest'));
//             die();
            // $userP = \App\Models\UserPelanggan::where([
            //     'username_plgn' => $request->username,
            // ])->first();

            // if (!empty($userP)) {
            //     return redirect('/profile-setting')->with('error', 'Username is use!');
            // }

            $dataInput = array(
                'nama_plgn'             => $request->nama,
                // 'password_plgn'         => md5($request->password),
                'email_plgn'            => $request->email,
                'no_telp_plgn'           => $request->telp,
                'no_wa_plgn'            => $request->wa,

            );

            if (!empty($userPelanggan)) {
                DB::table('user_pelanggan')
                ->where('id_pelanggan', $userPelanggan->id_pelanggan )
                ->update(
                    $dataInput
                );
                return back()->with('success', 'Your Account ' . $request->username . ' has been updated!');
            } else {
                return back()->with('error', 'Your Password wrong!');
            }


            return back()->with('success', 'Your Account ' . $request->username . ' has been updated!');

        }

        // return view('profileSetting');
        # code...
    }

    public function  SearchItem()
    {
        return view('searchItem');
        # code...
    }

    public function SignUp()
    {
        return view('signUp');
        # code...
    }
    public function SignUpAction(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'nama'      => 'required|min:3',
            'username' => 'required|min:5|max:20',
            'email' => 'required',
            'phone' => 'required|numeric',

            'kelamin'   => 'required',
            'password' => 'required|min:6'
        ]);

        $userP = \App\Models\UserPelanggan::where([
            'username_plgn' => $request->username,
        ])->first();

        if (!empty($userP)) {
            return redirect('/sign-up')->with('error', 'Username is use!');
        }

        $dataInput = array(
            'nama_plgn'             => $request->nama,
            'username_plgn'         => $request->username,
            'password_plgn'         => md5($request->password),
            'email_plgn'            => $request->email,
            'no_telp_plgn'           => $request->phone,
            // 'no_wa_plgn'            => $request->wa,
            'kategori_plgn'         => "guest",
            'jenis_kelamin_status'    => $request->kelamin

        );
        // dd($dataInput);
        // die();

        DB::table('user_pelanggan')->insert(
            $dataInput
        );
        return redirect('/login')->with('error', 'Your Account ' . $request->username . ' has been created');
        // return view('signUp');
        # code...
    }


    // ===================== End Profile ============================


    // =======================- SIMULATION -======================

    public function SimCluster()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('simCluster', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simCluster', compact('userPelanggan'));
        }
        return view('simCluster');
        # code...
    }

    public function SimSelectUnit()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('simSelectUnit', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simSelectUnit', compact('userPelanggan'));
        }
        return view('simSelectUnit');
        # code...
    }

    public function SimType()
    {
        $tipe = DB::table('tipe_rumah')->get();
        // dd($tipe);
        // die();
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('simType', compact('user'), compact('tipe'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simType', compact('userPelanggan'),compact('tipe'));
        }
        return view('simType',compact('tipe'));
        # code...
    }

    public function SimModif()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('simModification', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simModification', compact('userPelanggan'));
        }
        return view('simModification');
        # code...
    }

    public function SimPayment()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('simPayment', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simPayment', compact('userPelanggan'));
        }
        return view('simPayment');
        # code...
    }

    public function SimPrice()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('simPrice', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simPrice', compact('userPelanggan'));
        }
        return view('simPrice');
        # code...
    }

    public function SimOrder()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('simOrder', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simOrder', compact('userPelanggan'));
        }
        return view('simOrder');
        # code...
    }

    public function SimSummary()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('simSummary', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simSummary', compact('userPelanggan'));
        }
        return view('simSummary');
        # code...
    }
    public function Congratulation()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                    'id_user_admin' => session::get('user'),
                ])
                ->join('ktgr_admin')
                ->first();

            dd($user);
            die();
            return view('congratulation', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('congratulation', compact('userPelanggan'));
        }

        return view('congratulation');
        # code...
    }




    // =================- END SIMULATION -========================


    // ======================= FOOTER ============================

    public function Privacy()
    {
        return view('privacy');
    }

    public function Terms()
    {
        return view('terms');
    }

    // ======================= END FOOTER ========================

}
