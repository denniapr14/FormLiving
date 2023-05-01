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

class Home extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:admin')->except('logout');
        // // $this->middleware('guest:writer')->except('logout');
    }
    //



    public function index()
    {
        // Session
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])->first();

            // dd($user);
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
            ->select('logo_img', 'nama_img', 'cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
            ->where('status', '=', 'available')
            ->groupBy('cluster.nama_cluster')
            ->get();
        //   dd($cluster);
        // die();
        $cluster2 = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->select('logo_img', 'nama_img', 'cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
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


    // KALM SEMENTARA
    public function kalm()
    {
        $cluster = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->select('logo_img', 'nama_img', 'cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
            ->where('status', '=', 'available')
            ->groupBy('cluster.nama_cluster')
            ->get();
        //   dd($cluster);
        // die();
        $cluster2 = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->select('logo_img', 'nama_img', 'cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
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
            return view('kalm', compact('user', 'cluster', 'cluster2'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('kalm', compact('userPelanggan', 'cluster', 'cluster2'));
        }
        return view('kalm', 'cluster', 'cluster2');
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


        if (!empty($user)) {
            if (Auth::guard('admin')->attempt(['username_ua' => $request->username, 'password' => md5($request->password)], $request->get('remember'))) {

                Session::put('user', $user->id_user_admin);
                $hasilSess = Session::get('user');


                $userRole = $this->Role(Session::get('user'));

                switch ($userRole) {
                    case 'AdminAccounting':
                        return redirect('/profile-setting');
                        break;

                    default:
                        return redirect('/');
                        break;
                }

            }
        }

        if (!empty($userPelanggan)) {
            if (Auth::guard('guest')->attempt(['username_plgn' => $request->username, 'password' => md5($request->password)], $request->get('remember'))) {

                Session::put('guest', $userPelanggan->id_pelanggan);

                return redirect('/housing')

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

    public function Cluster($id_cluster)
    {

        $cluster = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->select('logo_img', 'nama_img', 'cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
            ->where('cluster.codecluster', '=', $id_cluster)
            ->groupBy('cluster.nama_cluster')
            ->first();

        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.codecluster', '=', $id_cluster)
            ->get();

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();


            return view('cluster', compact('user', 'rumah', 'cluster'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('cluster', compact('userPelanggan', 'rumah', 'cluster'));
        }

        return view('cluster', 'rumah');
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

            $fp = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                // ->select('logo_img','nama_img','cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
                // ->groupBy('cluster.nama_cluster')
                ->where([
                    'formulir_pesanan.id_user_admin' => session::get('user')
                ])
                ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month)
                // ->where(
                //         "MONTH('formulir_pesanan'.'tgl_input_fp')",'=','MONTH(CURRENT_DATE())'
                //         )
                ->get();
            $fpCount = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->select(DB::raw('COUNT(rumah.id_rumah) as count'))
                ->where([
                    'formulir_pesanan.id_user_admin' => session::get('user')
                ])
                ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month)
                ->first();
            // dd($fpCount);
            // die();
            return view('profileSetting', compact('user', 'fp', 'fpCount'));
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
        // if (!session()->has('guest') && !session()->has('user')) {
        //     // $hasilSess = Session::get('guest');
        //     // response()->json('hasilSess');
        //     return redirect("/login")->with('error', "You not sign in or sign up!");
        //     # code...



        // }
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
        return redirect('/login')->with('success', 'Your Account ' . $request->username . ' has been created');
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
            ->select('nama_img', 'cluster.nama_cluster', 'cluster.codecluster', DB::raw('COUNT(rumah.id_rumah) as count'))
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
        $cluster = DB::table('cluster')


            ->where('codecluster', '=', $codecluster)
            ->first();
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
            return view('simSelectUnit', compact('user', 'rumah', 'cluster'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();



            return view('simSelectUnit', compact('userPelanggan', 'rumah', 'cluster'));
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
        $tipe = DB::table('tipe_rumah')
            ->where('id_rumah', '=', $id_rumah)
            ->get();
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

    public function SimDetailType($id_rumah, $id_tipe)
    {
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();
        // dd($tipeRumah);
        // die();
        $imgRumahSingle = DB::table('gambar_rumah')
            ->where([
                'id_rumah' => $id_rumah
            ])
            ->where([
                'id_tipe' => $id_tipe
            ])
            ->first();
        $imgRumah = DB::table('gambar_rumah')
            ->where([
                'id_rumah' => $id_rumah
            ])
            ->where([
                'id_tipe' => $id_tipe
            ])
            ->where([
                'jenis_img' => 'gambar'
            ])
            ->get();
        $imgRumah2 = DB::table('gambar_rumah')
            ->where([
                'id_rumah' => $id_rumah
            ])
            ->where([
                'id_tipe' => $id_tipe
            ])
            ->where([
                'jenis_img' => 'gambar'
            ])
            ->get();
        $imgDenah = DB::table('gambar_rumah')
            ->where([
                'id_rumah' => $id_rumah
            ])
            ->where([
                'id_tipe' => $id_tipe
            ])
            ->where([
                'jenis_img' => 'denah'
            ])
            ->get();
        // dd($imgRumah);
        // die();

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
            return view('simDetailType', compact('user', 'rumah', 'tipeRumah', 'imgRumahSingle', 'imgRumah', 'imgRumah2', 'imgDenah'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();


            // dd($userPelanggan);
            // die();
            return view('simDetailType', compact('userPelanggan', 'rumah', 'tipeRumah', 'imgRumahSingle', 'imgRumah', 'imgRumah2', 'imgDenah'));
        }
        return view('simDetailType', 'rumah', 'tipeRumah', 'imgRumahSingle', 'imgRumah', 'imgDenah');

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
            return view('simPayment', compact('user', 'tipeRumah', 'rumah'));
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
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();
            return view('simPrice', compact('user', 'tipeRumah', 'rumah', 'payment'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simPrice', compact('userPelanggan', 'tipeRumah', 'rumah', 'payment'));
        }
        return view('simPrice', 'tipeRumah', 'rumah', 'payment');
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
        ])
            ->groupBy('nama_bank')
            ->get();
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
            return view('simPrice', compact('user', 'tipeRumah', 'rumah', 'payment', 'skBunga'));
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


    // AJAX
    public function getSKBunga($id_rumah, $id_tipe, $payment, $namaBank = "")
    {
        $skBunga = DB::table('sk_bunga')
            ->select('id_bunga', 'nama_bank', 'persentase')
            ->where([
                'nama_bank' => $namaBank
            ])->get();
        return response()->json($skBunga);
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
            if ($payment == "KPR") {
                // dd( $request->namaBank);
                // die();
                $bank = explode("|", $request->namaBank);
                $dataInput = array(
                    'id_bunga'          => $bank[0],
                    'uang_muka'         => preg_replace('/\D/', '', $request->uangMuka),
                    'harga_awal'        => (int)preg_replace('/\D/', '', $request->jumlah) +
                        (int)preg_replace('/\D/', '', $request->uangMuka)
                        + 10000000,
                    'bunga'             => $bank[1],
                    'cicilan_um'        => $request->cicilanUM,



                );
            }

            if ($payment == "Cicilan") {
                $dataInput = array(

                    'cicilan'         => $request->cicilan
                );
            }
            $id = DB::table('kalkulator_kpr')->insertGetId(
                $dataInput
            );
            return redirect('/simulation-order/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $payment . '/' . $id);
            // dd($user);
            // die();

        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();

            if ($payment == "KPR") {
                // dd( $request->namaBank);
                // die();
                $bank = explode("|", $request->namaBank);
                $dataInput = array(
                    'id_bunga'          => $bank[0],
                    'uang_muka'         => preg_replace('/\D/', '', $request->uangMuka),
                    'harga_awal'        => (int)preg_replace('/\D/', '', $request->jumlah) +
                        (int)preg_replace('/\D/', '', $request->uangMuka)
                        + 10000000,
                    'bunga'             => $bank[1],


                );
            }

            if ($payment == "Cicilan") {
                $dataInput = array(

                    'cicilan'         => $request->cicilan
                );
            }
            // dd($dataInput);
            //     die();
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
            ->where('tipe_promo', '=', "standart")
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
            return view('simOrder', compact('user', 'tipeRumah', 'rumah', 'promo', 'payment', 'kkpr'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();

            return view('simOrder', compact('userPelanggan', 'tipeRumah', 'rumah', 'promo', 'payment', 'kkpr'));
        }
        return view('simOrder', compact('tipeRumah', 'rumah', 'promo', 'payment', 'kkpr'));

        # code...
    }

    public function FindKupon($id_rumah, $id_tipe, $payment, $id_kkpr, $kode_promo)
    {
        $promo = DB::table('promo')

            ->where('status', '=', "aktif")
            ->where('tipe_promo', '=', "spesial")
            // ->where('tgl_aktif', '<=', NOW())
            ->where('tgl_berakhir', '>=', NOW())
            ->where([
                'kode_promo' => $kode_promo
            ])->get();
        // dd($promo);
        // die();
        return response()->json($promo);
    }


    public function SimOrderAction(Request $request, $id_rumah, $id_tipe, $payment, $id_kkpr)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();
        $kkpr = DB::table('kalkulator_kpr')->where([
            'id_kkpr' => $id_kkpr
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
                // 'id_sales'              => session::get('user'),
                'no_ktp_plgn'           => $request->nik,
                'no_telp_plgn'          => $request->telp,
                'no_wa_plgn'            => $request->wa,
                'alamat_plgn'           => $request->jalan . ', ' . $request->kelurahan . ', ' . $request->kecamatan . ', ' . $request->kota . ', ' . $request->pulau,
                'email_plgn'            => $request->email,
                'npwp_plgn'             => $request->npwp,
                'jenis_kelamin_status'  => $request->gender,
                // 'id_kkpr'               => $kkpr->id_kkpr,

            );

            $id = DB::table('user_pelanggan')->insertGetId(
                $dataInput
            );
            return redirect('/simulation-summary/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $payment . '/' . $kkpr->id_kkpr . '/' . $voucher . '/' . $id);

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
                'alamat_plgn'           => $request->jalan . ', ' . $request->kelurahan . ', ' . $request->kecamatan . ', ' . $request->kota . ', ' . $request->pulau,
                'email_plgn'            => $request->email,
                'npwp_plgn'             => $request->npwp,
                'jenis_kelamin_status'  => $request->gender,
                // 'id_kkpr'               => $kkpr->id_kkpr,

            );
            // dd($dataInput);
            // die();
            DB::table('user_pelanggan')
                ->where('id_pelanggan', session::get('guest'))
                ->update(
                    $dataInput
                );
            return redirect('/simulation-summary/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $payment . '/' . $kkpr->id_kkpr . '/' . $voucher . '/' . session::get('guest'));
        }
        // return view('simOrder',compact('tipeRumah','rumah','promo'));
        # code...
    }

    public function SimSummary($id_rumah, $id_tipe, $payment, $id_kkpr, $voucher, $id_pelanggan)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $pelanggan = DB::table('user_pelanggan')->where([
            'id_pelanggan' => $id_pelanggan
        ])->first();
        $kkpr = DB::table('kalkulator_kpr')->where([
            'id_kkpr' => $id_kkpr
        ])->first();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        if ($voucher != "Tidak Ada Promo") {
            $promo = DB::table('promo')
                ->where('kode_promo', '=', $voucher)
                // ->where('tgl_aktif', '<=', NOW())

                ->first();
            $dataUpdatePromo = array(
                'kuota_promo' => $promo->kuota_promo - 1


            );
            DB::table('promo')
                ->where('kode_promo', '=', $voucher)
                ->update(
                    $dataUpdatePromo
                );
        }

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            // dd($user);
            // die();
            if ($voucher != "Tidak Ada Promo") {
                return view('simSummary', compact('user', 'tipeRumah', 'rumah', 'promo', 'payment', 'voucher', 'pelanggan', 'kkpr'));
            } else {
                return view('simSummary', compact('user', 'tipeRumah', 'rumah', 'payment', 'voucher', 'pelanggan', 'kkpr'));
            }
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            if ($voucher != "Tidak Ada Promo") {
                return view('simSummary', compact('userPelanggan', 'tipeRumah', 'rumah', 'promo', 'payment', 'voucher', 'pelanggan', 'kkpr'));
            } else {
                return view('simSummary', compact('userPelanggan', 'tipeRumah', 'rumah', 'payment', 'voucher', 'pelanggan', 'kkpr'));
            }
            return view('simSummary');
            # code...
        }
    }
    public function SimSummaryAction(Request $request, $id_rumah, $id_tipe, $payment, $id_kkpr, $voucher, $id_pelanggan)
    {
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe
        ])->first();

        $pelanggan = DB::table('user_pelanggan')->where([
            'id_pelanggan' => $id_pelanggan
        ])->first();
        $kkpr = DB::table('kalkulator_kpr')->where([
            'id_kkpr' => $id_kkpr
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        if ($voucher != "Tidak Ada Promo") {
            $promo = DB::table('promo')
                ->where('kode_promo', '=', $voucher)
                // ->where('tgl_aktif', '<=', NOW())

                ->first();
        }
        $template = 'mail.coba';
        $template2 = 'mail.salesFP';
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
                    'uang_muka'                 => $request->harga * (10 / 100),
                    'total_harga'               => $request->harga,

                );
            }
            if (empty($promo)) {
                $dataInputDetail = array(
                    'luas_tanah_kkpr'           => $rumah->luas_tanah,
                    'tipe_kkpr'                 => $tipeRumah->jenis_tr,
                    'harga_awal'                => $tipeRumah->harga_tr,
                    'uang_muka'                 => $request->harga * (10 / 100),
                    'total_harga'               => $request->harga
                );
            }
            DB::table('kalkulator_kpr')
                ->where('id_kkpr', $id_kkpr)
                ->update(
                    $dataInputDetail
                );



            // $id = DB::table('kalkulator_kpr')->insertGetId(
            //     $dataInputDetail
            // );
            if (!empty($promo)) {
                $dataInput = array(
                    'id_pelanggan'              => $pelanggan->id_pelanggan,
                    'id_user_admin'             => session::get('user'),
                    'id_kkpr'                   => $id_kkpr,
                    'id_rumah'                  => $id_rumah,
                    'id_tipe_rumah'             => $id_tipe,
                    'jenis_pembayaran_fp'       => $payment,
                    'id_promo'                  => $promo->id_promo,
                    'id_sales'                  => session::get('user'),
                    'promo_fp'                  => $promo->keterangan

                );
            }
            if (empty($promo)) {
                $dataInput = array(
                    'id_pelanggan'              => $pelanggan->id_pelanggan,
                    'id_user_admin'             => session::get('user'),
                    'id_kkpr'                   => $id_kkpr,
                    'id_rumah'                  => $id_rumah,
                    'id_tipe_rumah'             => $id_tipe,
                    'jenis_pembayaran_fp'       => $payment,
                    'id_sales'                  => session::get('user')


                );
            }
            $fp = DB::table('formulir_pesanan')->insertGetId(
                $dataInput
            );


            $dtPembayaran = [];
            if ($payment == "Cicilan") {
                # code...
                $dtPembayaran[] = array(
                    'id_rumah'      =>  $id_rumah,
                    'id_formulir'   =>  $fp,
                    'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                    'detail_pr'     =>  "Uang Muka",
                    'harga_pr'      =>  $kkpr->uang_muka,
                    'sisa_pr'       =>  $kkpr->uang_muka,
                    'tgl_pr'        =>  date("Y-m-d", strtotime("+7 days")),
                    'status_pr'     =>  "belum"
                );

                for ($i = 1; $i < $kkpr->cicilan + 1; $i++) {

                    if (!empty($promo)) {
                        $dtPembayaran[] = array(
                            'id_rumah'      =>  $id_rumah,
                            'id_formulir'   =>  $fp,
                            'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                            'detail_pr'     =>  "Cicilan " . $i,
                            'harga_pr'      => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100) + $kkpr->total_diskon)) / $kkpr->cicilan,
                            'sisa_pr'       => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100) + $kkpr->total_diskon)) / $kkpr->cicilan,
                            'tgl_pr'        =>  date("Y-m-d", strtotime("+1 month")),
                            'status_pr'     =>  "belum"
                        );
                    }
                    if (empty($promo)) {
                        $dtPembayaran[] = array(
                            'id_rumah'      =>  $id_rumah,
                            'id_formulir'   =>  $fp,
                            'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                            'detail_pr'     =>  "Cicilan " . $i,
                            'harga_pr'      => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100))) / $kkpr->cicilan,
                            'sisa_pr'       => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100))) / $kkpr->cicilan,
                            'tgl_pr'        =>  date("Y-m-d", strtotime("+1 month")),
                            'status_pr'     =>  "belum"
                        );
                    }
                }
            }
            if ($payment == "KPR") {
                $dtPembayaran[] = array(
                    'id_rumah'      =>  $id_rumah,
                    'id_formulir'   =>  $fp,
                    'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                    'detail_pr'     =>  "Cicilan Uang Muka " . 1,
                    'harga_pr'      =>  $kkpr->uang_muka / $kkpr->cicilan_um,
                    'sisa_pr'       =>  $kkpr->uang_muka / $kkpr->cicilan_um,
                    'tgl_pr'        =>  date("Y-m-d", strtotime("+7 days")),
                    'status_pr'     =>  "belum"
                );
                for ($k = 1; $k < $kkpr->cicilan_um; $k++) {

                    $dtPembayaran[] = array(
                        'id_rumah'      =>  $id_rumah,
                        'id_formulir'   =>  $fp,
                        'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                        'detail_pr'     =>  "Cicilan Uang Muka " . 1 + $k,
                        'harga_pr'      =>  $kkpr->uang_muka / $kkpr->cicilan_um,
                        'sisa_pr'       =>  $kkpr->uang_muka / $kkpr->cicilan_um,
                        'tgl_pr'        =>  date("Y-m-d", strtotime("+1 month")),
                        'status_pr'     =>  "belum"
                    );
                }
                if (!empty($promo)) {
                    $dtPembayaran[] = array(
                        'id_rumah'      =>  $id_rumah,
                        'id_formulir'   =>  $fp,
                        'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                        'detail_pr'     =>  "Uang Muka",
                        'harga_pr'      =>  $kkpr->total_harga - ($kkpr->uang_muka + $kkpr->total_diskon),
                        'sisa_pr'       =>  $kkpr->total_harga - ($kkpr->uang_muka + $kkpr->total_diskon),
                        'tgl_pr'        =>  date("Y-m-d", strtotime("+5 years")),
                        'status_pr'     =>  "belum"
                    );
                }
                if (empty($promo)) {
                    $dtPembayaran[] = array(
                        'id_rumah'      =>  $id_rumah,
                        'id_formulir'   =>  $fp,
                        'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                        'detail_pr'     =>  "KPR",
                        'harga_pr'      =>  $kkpr->total_harga - $kkpr->uang_muka,
                        'sisa_pr'       =>  $kkpr->total_harga - $kkpr->uang_muka,
                        'tgl_pr'        =>  date("Y-m-d", strtotime("+5 years")),
                        'status_pr'     =>  "belum"
                    );
                }
            }
            dd($dtPembayaran);
            die();




            $data = [
                "subject"       => "Form Living",
                "body"          => "",
                "nama_plgn"     => $pelanggan->nama_plgn,
                "nik"           => $pelanggan->no_ktp_plgn,
                "no_wa"         => $pelanggan->no_wa_plgn,
                "alamat"        => $pelanggan->alamat_plgn,
                "cluster"       => $rumah->nama_cluster . " / " . $rumah->blok . " - " . $rumah->nomor,
                "luas_tanah"    => $rumah->luas_tanah,
                "tipe"          => $tipeRumah->jenis_tr,
                "harga"          => $tipeRumah->harga_tr,
                'tgl_beli'      => date("d M Y"),
                'uang_muka'     => $kkpr->uang_muka
            ];
            // MailNotify class that is extend from Mailable class.
            try {
                Mail::to($pelanggan->email_plgn)->send(new MailNotify($data, $template));
                Mail::to($user->email_ua)->send(new MailNotify($data, $template2));
                // return response()->json(['Great! Successfully send in your mail']);
            } catch (Exception $e) {
                // return response()->json(['Sorry! Please try again latter']);
            }

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
                    'uang_muka'                 => $request->harga * (10 / 100),
                    'total_harga'               => $request->harga
                );
            }
            if (empty($promo)) {
                $dataInputDetail = array(
                    'luas_tanah_kkpr'           => $rumah->luas_tanah,
                    'tipe_kkpr'                 => $tipeRumah->jenis_tr,
                    'harga_awal'                => $tipeRumah->harga_tr,
                    'uang_muka'                 => $request->harga * (10 / 100),

                    'total_harga'               => $request->harga
                );
            }

            DB::table('kalkulator_kpr')
                ->where('id_kkpr', $id_kkpr)
                ->update(
                    $dataInputDetail
                );
            if (!empty($promo)) {
                $dataInput = array(
                    'id_pelanggan'              => session::get('guest'),
                    'id_kkpr'                   => $id_kkpr,
                    'id_rumah'                  => $id_rumah,
                    'id_tipe_rumah'             => $id_tipe,
                    'jenis_pembayaran_fp'       => $payment,
                    'id_promo'                  => $promo->id_promo,
                    'promo_fp'                  => $promo->keterangan

                );
            }
            if (empty($promo)) {
                $dataInput = array(
                    'id_pelanggan'              => session::get('guest'),
                    'id_kkpr'                   => $id_kkpr,
                    'id_rumah'                  => $id_rumah,
                    'id_tipe_rumah'             => $id_tipe,
                    'jenis_pembayaran_fp'       => $payment,


                );
            }
            // dd($pelanggan);
            $fp = DB::table('formulir_pesanan')->insertGetId(
                $dataInput
            );


            $dtPembayaran = [];
            if ($payment == "Cicilan") {
                # code...
                $dtPembayaran[] = array(
                    'id_rumah'      =>  $id_rumah,
                    'id_formulir'   =>  $fp,
                    'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                    'detail_pr'     =>  "Uang Muka",
                    'harga_pr'      =>  $kkpr->uang_muka,
                    'sisa_pr'       =>  $kkpr->uang_muka,
                    'tgl_pr'        =>  date("Y-m-d", strtotime("+7 days")),
                    'status_pr'     =>  "belum"
                );

                for ($i = 1; $i < $kkpr->cicilan + 1; $i++) {

                    if (!empty($promo)) {
                        $dtPembayaran[] = array(
                            'id_rumah'      =>  $id_rumah,
                            'id_formulir'   =>  $fp,
                            'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                            'detail_pr'     =>  "Cicilan " . $i,
                            'harga_pr'      => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100) + $kkpr->total_diskon)) / $kkpr->cicilan,
                            'sisa_pr'       => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100) + $kkpr->total_diskon)) / $kkpr->cicilan,
                            'tgl_pr'        =>  date("Y-m-d", strtotime("+1 month")),
                            'status_pr'     =>  "belum"
                        );
                    }
                    if (empty($promo)) {
                        $dtPembayaran[] = array(
                            'id_rumah'      =>  $id_rumah,
                            'id_formulir'   =>  $fp,
                            'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                            'detail_pr'     =>  "Cicilan " . $i,
                            'harga_pr'      => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100))) / $kkpr->cicilan,
                            'sisa_pr'       => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100))) / $kkpr->cicilan,
                            'tgl_pr'        =>  date("Y-m-d", strtotime("+1 month")),
                            'status_pr'     =>  "belum"
                        );
                    }
                }
            }
            if ($payment == "KPR") {
                $dtPembayaran[] = array(
                    'id_rumah'      =>  $id_rumah,
                    'id_formulir'   =>  $fp,
                    'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                    'detail_pr'     =>  "Cicilan Uang Muka " . 1,
                    'harga_pr'      =>  $kkpr->uang_muka / $kkpr->cicilan_um,
                    'sisa_pr'       =>  $kkpr->uang_muka / $kkpr->cicilan_um,
                    'tgl_pr'        =>  date("Y-m-d", strtotime("+7 days")),
                    'status_pr'     =>  "belum"
                );
                for ($k = 1; $k < $kkpr->cicilan_um; $k++) {

                    $dtPembayaran[] = array(
                        'id_rumah'      =>  $id_rumah,
                        'id_formulir'   =>  $fp,
                        'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                        'detail_pr'     =>  "Cicilan Uang Muka " . 1 + $k,
                        'harga_pr'      =>  $kkpr->uang_muka / $kkpr->cicilan_um,
                        'sisa_pr'       =>  $kkpr->uang_muka / $kkpr->cicilan_um,
                        'tgl_pr'        =>  date("Y-m-d", strtotime("+1 month")),
                        'status_pr'     =>  "belum"
                    );
                }
                if (!empty($promo)) {
                    $dtPembayaran[] = array(
                        'id_rumah'      =>  $id_rumah,
                        'id_formulir'   =>  $fp,
                        'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                        'detail_pr'     =>  "Uang Muka",
                        'harga_pr'      =>  $kkpr->total_harga - ($kkpr->uang_muka + $kkpr->total_diskon),
                        'sisa_pr'       =>  $kkpr->total_harga - ($kkpr->uang_muka + $kkpr->total_diskon),
                        'tgl_pr'        =>  date("Y-m-d", strtotime("+5 years")),
                        'status_pr'     =>  "belum"
                    );
                }
                if (empty($promo)) {
                    $dtPembayaran[] = array(
                        'id_rumah'      =>  $id_rumah,
                        'id_formulir'   =>  $fp,
                        'id_pelanggan'  =>  $pelanggan->id_pelanggan,
                        'detail_pr'     =>  "KPR",
                        'harga_pr'      =>  $kkpr->total_harga - $kkpr->uang_muka,
                        'sisa_pr'       =>  $kkpr->total_harga - $kkpr->uang_muka,
                        'tgl_pr'        =>  date("Y-m-d", strtotime("+5 years")),
                        'status_pr'     =>  "belum"
                    );
                }
            }

            $data = [
                "subject"       => "Form Living",
                "body"          => "Form Living",
                "nama_plgn"     => $pelanggan->nama_plgn,
                "nik"           => $pelanggan->no_ktp_plgn,
                "no_wa"         => $pelanggan->no_wa_plgn,
                "alamat"        => $pelanggan->alamat_plgn,
                "cluster"       => $rumah->nama_cluster . " / " . $rumah->blok . " - " . $rumah->nomor,
                "luas_tanah"    => $rumah->luas_tanah,
                "tipe"          => $tipeRumah->jenis_tr,
                "harga"         => $tipeRumah->harga_tr,
                'tgl_beli'      => date("d M Y"),
                'uang_muka'     => $kkpr->uang_muka
            ];
            // MailNotify class that is extend from Mailable class.
            try {
                Mail::to($pelanggan->email_plgn)->send(new MailNotify($data, $template));
                // return response()->json(['Great! Successfully send in your mail']);
            } catch (Exception $e) {
                // return response()->json(['Sorry! Please try again latter']);
            }

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
    public function About()
    {
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])->first();

            // dd($user);
            // die();
            return view('about', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('about', compact('userPelanggan'));
        }
        return view('about');
    }

    // ======================= END FOOTER ========================


    // public function Send()
    // {

    //     // $email = new MailNotify();
    //     // Mail::to('denniapr14@gmail.com')->send($email);

    //     // return "Email sent successfully!";
    //     // $mailData = [
    //     //     'subject' => 'Mail from ItSolutionStuff.com',
    //     //     'body' => 'This is for testing email using smtp.'
    //     // ];

    //     // Mail::to('denniapr14@gmail.com')->send(new MailNotify($mailData));

    //     // dd("Email is sent successfully.");
    //     $data = [
    //         "subject"=>"Cambo Tutorial Mail",
    //         "body"=>"Hello friends, Welcome to Cambo Tutorial Mail Delivery!"
    //         ];
    //       // MailNotify class that is extend from Mailable class.
    //       try
    //       {
    //         \Mail::to('gamesapr14@gmail.com')->send(new MailNotify($data));
    //         return response()->json(['Great! Successfully send in your mail']);
    //       }
    //       catch(Exception $e)
    //       {
    //         return response()->json(['Sorry! Please try again latter']);
    //       }
    // }

    public function SendWA()
    {
        $WhatsappFun = new WhatsappAPI();
        $status = $WhatsappFun->sendText("+6281227476463", "TEST MESSAGE FROM LARAVEL");
        dd($status);
    }
}
