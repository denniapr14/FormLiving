<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

// Model
use App\Models\UserAdmin;
use App\Models\UserPelanggan;
use App\Models\TipeRumah;
use App\Models\Rumah;
use App\Models\Cluster;
use App\Models\Promo;
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
        $cluster = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->select('cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
            ->where('status', '=', 'available')
            ->groupBy('cluster.nama_cluster')
            ->get();
        $cluster2 = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->select('cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
            ->where('status', '=', 'available')
            ->groupBy('cluster.nama_cluster')
            ->get();

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
            return view('housing', compact('user', 'cluster', 'cluster2'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('housing', compact('userPelanggan', 'cluster', 'cluster2'));
        }
        return view('housing', 'cluster', 'cluster2');
    }

    // ===========================================================

    // LOGIN
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

                ->first();


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

                ->first();

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
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...



        }

        if (session()->has('user')) {
            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where(['id_user_admin' => session::get('user')])
                ->first();

            // dd($user);
            // die();
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
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...



        }

        if (session()->has('user')) {
            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where(['id_user_admin' => session::get('user')])
                ->first();

            // dd($user);
            // die();
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
        if (session()->has('user')) {



            // dd($userPelanggan);
            // die();
            $this->validate($request, [
                'username'  => 'required',
                'nama'      => 'required',
                'email'     => 'required',

                'password'  => 'required|min:6'
            ]);

            $user = \App\Models\UserAdmin::where([
                'username_ua' => $request->username,
                'password_ua' => md5($request->password)
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
                'nama_ua'             => $request->nama,
                // 'password_plgn'         => md5($request->password),
                'email_ua'            => $request->email,
                'no_tlp_ua'           => $request->telp,

            );

            if (!empty($user)) {
                DB::table('user_admin')
                    ->where('id_user_admin', $user->id_user_admin)
                    ->update(
                        $dataInput
                    );
                return back()->with('success', 'Your Account ' . $request->username . ' has been updated!');
            } else {
                return back()->with('error', 'Your Password wrong!');
            }


            return back()->with('success', 'Your Account ' . $request->username . ' has been updated!');
        }


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
                    ->where('id_pelanggan', $userPelanggan->id_pelanggan)
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
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...



        }
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
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...
        }


        $cluster = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->select('cluster.nama_cluster', 'cluster.codecluster', DB::raw('COUNT(rumah.id_rumah) as count'))
            ->where('status', '=', 'available')
            ->groupBy('cluster.nama_cluster')
            ->get();
        // dd($cluster);
        //     die();
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();
            return view('simCluster', compact('user'), compact('cluster'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simCluster', compact('userPelanggan'), compact('cluster'));
        }
        return view('simCluster', compact('cluster'));
        # code...
    }

    public function SimSelectUnit($codecluster)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.codecluster', '=', $codecluster)
            ->get();
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();
            return view('simSelectUnit', compact('user'), compact('rumah'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();



            return view('simSelectUnit', compact('userPelanggan'), ['rumah' => $rumah]);
        }


        return view('simSelectUnit', compact('rumah'));
        # code...
    }

    public function getomah()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();
            return view('simSelectUnit', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();

            $omah = DB::table('rumah')->select('id_rumah', 'blok', 'nomor', 'status')->get();

            // dd($userPelanggan);
            // die();
            return view('simSelectUnit', compact('userPelanggan'));
        }


        // if (isset($_POST['getem'])) {
        //     $data = \App\Models\UserAdmin::where('id_rumah,blok,nomor,status', 'rumah')->result_array();
        //     echo json_encode($data);
        // }
    }


    public function SimType($id_rumah)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        // dd($rumah);
        // die();
        $tipe = DB::table('tipe_rumah')->get();

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();
            return view('simType', compact('user', 'tipe', 'rumah'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simType', compact('userPelanggan', 'tipe', 'rumah'));
        }
        return view('simType', compact('tipe'), compact('rumah'));
        # code...
    }

    public function SimModif()
    {

        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();
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

    public function SimPayment($id_rumah, $id_tipe)
    {

        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $skBunga = DB::table('sk_bunga')->where([
            'status_bunga' => "aktif"
        ])->get();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        // $data= 'tipe','rumah';
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();

        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();

            // dd($userPelanggan);
            // die();

            return view('simPayment', compact('userPelanggan', 'tipeRumah', 'rumah'));
        }
        return view('simPayment', 'tipeRumah', 'rumah');

        # code...
    }

    public function SimPrice(Request $request, $id_rumah, $id_tipe)

    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $skBunga = DB::table('sk_bunga')->where([
            'status_bunga' => "aktif"
        ])->get();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        $payment = $request->payment;
        if (!empty($payment)) {
            return redirect('/simulation-price-payment/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $payment);
        } else {
            return back()->with('error', 'You not select payment method!');
        }
        // if (session()->has('user')) {
        //     $user = \App\Models\UserAdmin::where([
        //         'id_user_admin' => session::get('user'),
        //     ])

        //         ->first();

        //     // dd($user);
        //     // die();
        //     return view('simPrice', compact('user','tipeRumah','rumah','payment'));
        // }
        // if (session()->has('guest')) {
        //     $userPelanggan = \App\Models\UserPelanggan::where([
        //         'id_pelanggan' => session::get('guest'),
        //     ])->first();
        //     // dd($userPelanggan);
        //     // die();
        //     return view('simPrice', compact('userPelanggan','tipeRumah','rumah','payment'));
        // }
        // return view('simPrice','tipeRumah','rumah','payment');
        # code...
    }
    public function SimPricePayment($id_rumah, $id_tipe, $payment)

    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $skBunga = DB::table('sk_bunga')->where([
            'status_bunga' => "aktif"
        ])->get();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();

        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();

            return view('simPrice', compact('userPelanggan', 'tipeRumah', 'rumah', 'payment', 'skBunga'));
        }
        return view('simPrice', 'tipeRumah', 'rumah', 'payment');
        # code...
    }



    public function SimPricePaymentAction(Request $request, $id_rumah, $id_tipe, $payment)

    {
        $skBunga = DB::table('sk_bunga')->where([
            'status_bunga' => "aktif"
        ])->get();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();


        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();

        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            if ($payment == "KPR") {
                $dataInput = array(
                    'id_bank'           => $request->bank,
                    'uang_muka'         => preg_replace('/\D/', '', $request->uangMuka),
                    'harga_awal'        => preg_replace('/\D/', '', $request->jumlah),
                    'bunga'             => $request->sukuBunga,
                    'cicilan'           => ($request->tahun * 12) . "|" . $request->tahun
                );
                // dd($dataInput);
                // die();
            }

            if ($payment == "Cicilan") {
                $dataInput = array(

                    'cicilan'         => ($request->tahun * 12) . "|" . $request->tahun
                );
            }
            $id = DB::table('kalkulator_kpr')->insertGetId(
                $dataInput
            );
            return redirect('/simulation-order/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $payment . '/' . $id);
        }

        # code...
    }

    public function SimOrder($id_rumah, $id_tipe, $payment, $id_kkpr)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }
        $kkpr = DB::table('kalkulator_kpr')->where([
            'id_kkpr' => $id_kkpr
        ])->first();
        // dd($kkpr);
        // die();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        $promo = DB::table('promo')
            ->where('status', '=', "aktif")
            // ->where('tgl_aktif', '<=', NOW())
            ->where('tgl_berakhir', '>=', NOW())
            ->get();
        // dd($promo);
        // die();
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();

        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();

            return view('simOrder', compact('userPelanggan', 'tipeRumah', 'rumah', 'promo', 'payment'));
        }
        return view('simOrder', compact('tipeRumah', 'rumah', 'promo', 'payment'));

        # code...
    }

    public function SimOrderAction(Request $request, $id_rumah, $id_tipe, $payment)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        $promo = DB::table('promo')
            ->where('status', '=', "aktif")
            // ->where('tgl_aktif', '<=', NOW())
            ->where('tgl_berakhir', '>=', NOW())
            ->get();

        $voucher = $request->promo;

        // dd($request->all());
        // die();
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();
            $this->validate($request, [
                'nama'      => 'required|min:3',

                'email' => 'required',
                // 'user'  => 'required'
                // 'phone' => 'required|numeric',

                // 'kelamin'   => 'required',

            ]);


            $dataInput = array(
                'nama_plgn'             => $request->nama,
                'id_user_admin'         => session::get('user'),
                'no_ktp_plgn'           => $request->nik,
                'no_telp_plgn'          => $request->telp,
                'no_wa_plgn'            => $request->wa,
                'alamat_plgn'           => $request->alamat,
                'email_plgn'            => $request->email,
                'npwp_plgn'             => $request->npwp,
                'jenis_kelamin_status'  => $request->kelamin

            );

            $id = DB::table('user_pelanggan')->insertGetId(
                $dataInput
            );
            return redirect('/simulation-summary/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $payment . '/' . $voucher . '/' . $id);

            // dd($dataInput);
            // die();

        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            $this->validate($request, [
                'nama'      => 'required|min:3',

                'email' => 'required',
                // 'phone' => 'required|numeric',

                // 'kelamin'   => 'required',

            ]);


            $dataInput = array(
                'nama_plgn'             => $request->nama,
                'no_ktp_plgn'           => $request->nik,
                'no_telp_plgn'          => $request->telp,
                'no_wa_plgn'            => $request->wa,
                'alamat_plgn'           => $request->alamat,
                'email_plgn'            => $request->email,
                'npwp_plgn'             => $request->npwp,
                'jenis_kelamin_status'  => $request->kelamin

            );
            DB::table('user_pelanggan')
                ->where('id_pelanggan', session::get('guest'))
                ->update(
                    $dataInput
                );
            return redirect('/simulation-summary/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $payment . '/' . $voucher . '/' . session::get('guest'));
        }
        // return view('simOrder',compact('tipeRumah','rumah','promo'));
        # code...
    }

    public function SimSummary($id_rumah, $id_tipe, $payment, $voucher, $id_pelanggan)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $pelanggan = DB::table('user_pelanggan')->where([
            'id_pelanggan' => $id_pelanggan
        ])->first();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        $promo = DB::table('promo')
            ->where('kode_promo', '=', $voucher)
            // ->where('tgl_aktif', '<=', NOW())

            ->first();

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();
            return view('simSummary', compact('user', 'tipeRumah', 'rumah', 'promo', 'payment', 'voucher', 'pelanggan'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simSummary', compact('userPelanggan', 'tipeRumah', 'rumah', 'promo', 'payment', 'voucher', 'pelanggan'));
        }
        return view('simSummary');
        # code...
    }
    public function SimSummaryAction(Request $request, $id_rumah, $id_tipe, $payment, $voucher, $id_pelanggan)
    {
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();
        $pelanggan = DB::table('user_pelanggan')->where([
            'id_pelanggan' => $id_pelanggan
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        $promo = DB::table('promo')
            ->where('kode_promo', '=', $voucher)
            // ->where('tgl_aktif', '<=', NOW())

            ->first();

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();
            $this->validate($request, [
                'harga'      => 'required',


                // 'phone' => 'required|numeric',

                // 'kelamin'   => 'required',

            ]);
            if (!empty($promo)) {
                $dataInputDetail = array(
                    'luas_tanah_kkpr'           => $rumah->luas_tanah,
                    'tipe_kkpr'                 => $tipeRumah->jenis_tr,
                    'harga_awal'                => $tipeRumah->harga_tr,
                    'total_diskon'              => $promo->diskon_promo,
                    'total_harga'               => $tipeRumah->harga_tr
                );
            }
            if (empty($promo)) {
                $dataInputDetail = array(
                    'luas_tanah_kkpr'           => $rumah->luas_tanah,
                    'tipe_kkpr'                 => $tipeRumah->jenis_tr,
                    'harga_awal'                => $tipeRumah->harga_tr,

                    'total_harga'               => $tipeRumah->harga_tr
                );
            }

            $id = DB::table('kalkulator_kpr')->insertGetId(
                $dataInputDetail
            );
            if (!empty($promo)) {
                $dataInput = array(
                    'id_pelanggan'              => $pelanggan->id_pelanggan,
                    'id_user_admin'             => session::get('user'),
                    'id_kkpr'                   => $id,
                    'id_rumah'                  => $id_rumah,
                    'id_tipe_rumah'             => $id_tipe,
                    'jenis_pembayaran_fp'       => $payment,
                    'id_promo'                  => $promo->id_promo,

                );
            }
            if (empty($promo)) {
                $dataInput = array(
                    'id_pelanggan'              => $pelanggan->id_pelanggan,
                    'id_user_admin'             => session::get('user'),
                    'id_kkpr'                   => $id,
                    'id_rumah'                  => $id_rumah,
                    'id_tipe_rumah'             => $id_tipe,
                    'jenis_pembayaran_fp'       => $payment,


                );
            }
            DB::table('formulir_pesanan')->insert(
                $dataInput
            );
            return redirect('/congratulation')->with('success', 'Data has been send!');
            // dd($user);
            // die();

        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            $this->validate($request, [
                'harga'      => 'required',


                // 'phone' => 'required|numeric',

                // 'kelamin'   => 'required',

            ]);
            if (!empty($promo)) {
                $dataInputDetail = array(
                    'luas_tanah_kkpr'           => $rumah->luas_tanah,
                    'tipe_kkpr'                 => $tipeRumah->jenis_tr,
                    'harga_awal'                => $tipeRumah->harga_tr,
                    'total_diskon'              => $promo->diskon_promo,
                    'total_harga'               => $tipeRumah->harga_tr
                );
            }
            if (empty($promo)) {
                $dataInputDetail = array(
                    'luas_tanah_kkpr'           => $rumah->luas_tanah,
                    'tipe_kkpr'                 => $tipeRumah->jenis_tr,
                    'harga_awal'                => $tipeRumah->harga_tr,

                    'total_harga'               => $tipeRumah->harga_tr
                );
            }

            $id = DB::table('kalkulator_kpr')->insertGetId(
                $dataInputDetail
            );
            if (!empty($promo)) {
                $dataInput = array(
                    'id_pelanggan'              => session::get('guest'),
                    'id_kkpr'                   => $id,
                    'id_rumah'                  => $id_rumah,
                    'id_tipe_rumah'             => $id_tipe,
                    'jenis_pembayaran_fp'       => $payment,
                    'id_promo'                  => $promo->id_promo,

                );
            }
            if (empty($promo)) {
                $dataInput = array(
                    'id_pelanggan'              => session::get('guest'),
                    'id_kkpr'                   => $id,
                    'id_rumah'                  => $id_rumah,
                    'id_tipe_rumah'             => $id_tipe,
                    'jenis_pembayaran_fp'       => $payment,


                );
            }
            DB::table('formulir_pesanan')->insert(
                $dataInput
            );
            return redirect('/congratulation')->with('success', 'Data has been send!');
            // dd($dataInput);
            // die();

            // DB::table('user_pelanggan')
            // ->where('id_pelanggan', session::get('guest'))
            // ->update(
            //     $dataInput
            // );

        }
        return view('simSummary');
        # code...
    }
    public function Congratulation()
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();
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
