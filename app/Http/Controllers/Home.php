<?php

namespace App\Http\Controllers;


use App\Mail\MailAttachment;
use App\Mail\MailNotify;
// use App\Mail\MailAttachment;
// use Spatie\PdfToText\Pdf;
// use PDF;

// Model
use App\Models\Promo;
use App\Models\Departemen;
use App\Models\Rumah;
use App\Models\UserPelanggan;
use Illuminate\Contracts\Auth\Guard;

// Controller
// =======================
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Mail;
use PDF;

class Home extends Controller
{
    public $clusterList;
    public  $promoList;
    public $userList;
    public function __construct()
    {
        $this->clusterList = new Rumah();
        $this->promoList = new Promo();
        $this->userList = new UserPelanggan();
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:admin')->except('logout');
        // // $this->middleware('guest:writer')->except('logout');
    }
    //

    public function index()
    {
        $promo = $this->promoList->getPromoWhereAll('*', 'status', '=', 'aktif');

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])->first();

            // dd($user);
            // die();
            return view('home', compact('user', 'promo'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest', 'promo'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('home', compact('userPelanggan', 'promo'));
        }
        // end sess
        return view('home', compact('promo'));
    }

    public function housing($dataProjek)
    {
        $cluster1 = $this->clusterList->getRumahBaseProjekClusterCount($dataProjek);
        // $cluster1 = DB::table('rumah')
        //     ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
        //     ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
        //     ->select('logo_img', 'nama_img', 'cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
        //     ->where('status', '=', 'available')
        //     ->where('projek.nama_projek','=','Greenland')
        //     ->groupBy('cluster.nama_cluster')
        //     ->get();
        // dd($cluster1);
        // die();
        // dd($cluster1);
        $namaPage = ($dataProjek == "Greenland") ? 'housing' : 'housingKalm';

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
            return view($namaPage, compact('user', 'cluster1', 'dataProjek'));
        }
        return view($namaPage, compact('cluster1', 'dataProjek'));
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
                        return redirect('/')->with('success', "You're Sign in!");
                        break;
                    case 'Admin':
                        return redirect('/')->with('success', "You're Sign in!");
                        break;

                    case 'CEO':
                        return redirect('/')->with('success', "You're Sign in!");
                        break;

                    case 'SuperAdmin':
                        return redirect('/dasboard')->with('success', "You're Sign in!");
                        break;
                    case 'AdminFormsLiving':
                        return redirect('AdminFormsLiving/dasboard')->with('success', "You're Sign in!");
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
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->select('projek.nama_projek', 'logo_img', 'nama_img', 'cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
            ->where('cluster.codecluster', '=', $id_cluster)
            ->where('projek.nama_projek', '=', 'Greenland')
            ->groupBy('cluster.nama_cluster')
            ->first();

        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->where('status', '=', 'available')
            ->where('rumah.codecluster', '=', $id_cluster)
            ->where('projek.nama_projek', '=', 'Greenland')
            ->get();
        dd($cluster);
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
        $data = $this->userList->getAllUserPelangganFirst();
        return view('mail.mailFP', compact('data'));
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

            // $lastMonth = \Carbon\Carbon::now()->subMonth();

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
                    'formulir_pesanan.id_user_admin' => session::get('user'),
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
                    'formulir_pesanan.id_user_admin' => session::get('user'),
                ])
                ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month)
                ->first();

            $fpCountLast = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->select(DB::raw('COUNT(rumah.id_rumah) as count'))
                ->where([
                    'formulir_pesanan.id_user_admin' => session::get('user'),
                ])
                ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month - 1)
                ->first();

            $fpCountAll = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->select(DB::raw('COUNT(rumah.id_rumah) as count'))
                ->where([
                    'formulir_pesanan.id_user_admin' => session::get('user'),
                ])

                ->first();

            // dd($fpCount);
            // die();
            return view('profileSetting', compact('user', 'fp', 'fpCount', 'fpCountLast', 'fpCountAll'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            $fp = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                // ->select('logo_img','nama_img','cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
                // ->groupBy('cluster.nama_cluster')
                ->where([
                    'formulir_pesanan.id_formulir' => session::get('guest'),
                ])
                // ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month)
                // ->where(
                //         "MONTH('formulir_pesanan'.'tgl_input_fp')",'=','MONTH(CURRENT_DATE())'
                //         )
                ->get();
            // dd($userPelanggan);
            // die();
            return view('profileSetting', compact('userPelanggan', 'fp'));
        }

        return view('profileSetting');
        # code...
    }

    public function Search(Request $request)
    {

        if (session()->has('user')) {

            // $lastMonth = \Carbon\Carbon::now()->subMonth();

            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where(['id_user_admin' => session::get('user')])
                ->first();

            $bulan = now();
            $tahun = now();
            $status = null;
            if (!empty($request->month)) {
                $bulan = $request->month;
            }
            if (!empty($request->year)) {
                $tahun = $request->year;
            }
            if (!empty($request->status)) {
                $status = $request->status;
            }
            $fp = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                // ->select('logo_img','nama_img','cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
                // ->groupBy('cluster.nama_cluster')
                ->where([
                    'formulir_pesanan.id_user_admin' => session::get('user'),
                ])
                ->whereMonth('formulir_pesanan.tgl_input_fp', $bulan)
                ->whereYear('formulir_pesanan.tgl_input_fp', $tahun)
                ->where([
                    'formulir_pesanan.status_fp' => $status,
                ])
                // ->where(
                //         "MONTH('formulir_pesanan'.'tgl_input_fp')",'=','MONTH(CURRENT_DATE())'
                //         )
                ->get();
            $fpCount = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->select(DB::raw('COUNT(rumah.id_rumah) as count'))
                ->where([
                    'formulir_pesanan.id_user_admin' => session::get('user'),
                ])
                ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month)
                ->first();

            $fpCountLast = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->select(DB::raw('COUNT(rumah.id_rumah) as count'))
                ->where([
                    'formulir_pesanan.id_user_admin' => session::get('user'),
                ])
                ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month - 1)
                ->first();

            $fpCountAll = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->select(DB::raw('COUNT(rumah.id_rumah) as count'))
                ->where([
                    'formulir_pesanan.id_user_admin' => session::get('user'),
                ])

                ->first();

            // dd($bulan);
            // dd($tahun);
            // dd($fp);
            // die();
            return view('dashboardProfile', compact('user', 'fp', 'fpCount', 'fpCountLast', 'fpCountAll'));
        }
        if (session()->has('guest')) {

            // $lastMonth = \Carbon\Carbon::now()->subMonth();

            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            $bulan = now();
            $tahun = now();
            $status = null;
            if (!empty($request->month)) {
                $bulan = $request->month;
            }
            if (!empty($request->year)) {
                $tahun = $request->year;
            }
            if (!empty($request->status)) {
                $status = $request->status;
            }
            $fp = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                // ->select('logo_img','nama_img','cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
                // ->groupBy('cluster.nama_cluster')
                ->where([
                    'formulir_pesanan.id_pelanggan' => session::get('guest'),
                ])
                ->whereMonth('formulir_pesanan.tgl_input_fp', $bulan)
                ->whereYear('formulir_pesanan.tgl_input_fp', $tahun)
                ->where([
                    'formulir_pesanan.status_fp' => $status,
                ])
                // ->where(
                //         "MONTH('formulir_pesanan'.'tgl_input_fp')",'=','MONTH(CURRENT_DATE())'
                //         )
                ->get();

            // dd($bulan);
            // dd($tahun);
            // dd($fp);
            // die();
            return view('dashboardProfile', compact('userPelanggan', 'fp'));
        } else {
            return redirect()->route('login');
        }
    }

    public function ProfileSettingAction(Request $request)
    {
        if (session()->has('user')) {

            // dd($userPelanggan);
            // die();
            $this->validate($request, [
                'username' => 'required',
                'nama' => 'required',
                'email' => 'required',

                'password' => 'required|min:6',
            ]);

            $user = \App\Models\UserAdmin::where([
                'username_ua' => $request->username,
                'password_ua' => md5($request->password),
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
                'nama_ua' => $request->nama,
                // 'password_plgn'         => md5($request->password),
                'email_ua' => $request->email,
                'no_tlp_ua' => $request->telp,

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
                'username' => 'required',
                'nama' => 'required',
                'email' => 'required',
                'telp' => 'required',
                'wa' => 'required',
                'password' => 'required|min:6',
            ]);

            $userPelanggan = \App\Models\UserPelanggan::where([
                'username_plgn' => $request->username,
                'password_plgn' => md5($request->password),
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
                'nama_plgn' => $request->nama,
                // 'password_plgn'         => md5($request->password),
                'email_plgn' => $request->email,
                'no_telp_plgn' => $request->telp,
                'no_wa_plgn' => $request->wa,

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

    function Commission()
    {
        if (session()->has('user')) {

            // $lastMonth = \Carbon\Carbon::now()->subMonth();
            $fp = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                // ->select('logo_img','nama_img','cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
                // ->groupBy('cluster.nama_cluster')
                ->where([
                    'formulir_pesanan.id_user_admin' => session::get('user'),
                ])
                ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month)
                // ->where(
                //         "MONTH('formulir_pesanan'.'tgl_input_fp')",'=','MONTH(CURRENT_DATE())'
                //         )
                ->get();
            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where(['id_user_admin' => session::get('user')])
                ->first();


            // dd($bulan);
            // dd($tahun);
            // dd($fp);
            // die();
            return view('commission', compact('user', 'fp'));
        }
        if (session()->has('guest')) {

            // $lastMonth = \Carbon\Carbon::now()->subMonth();

            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();



            // dd($bulan);
            // dd($tahun);
            // dd($fp);
            // die();
            return view('commission', compact('userPelanggan', 'fp'));
        } else {
            return redirect()->route('login');
        }
    }
    public function SearchItem()
    {
        return view('searchItem');
        # code...
    }

    public function SignUp()
    {
        return view('signUp');
    }
    public function SignUpAction(Request $request)
    {
        $validasi = $this->validate($request, [
            'nama' => 'required|min:3',
            'username_ua' => 'required|min:5|max:20|unique:user_admin',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'kelamin' => 'required',
            'password' => 'required|min:6',
        ], [
            'username_ua.unique' => 'Username sudah ada, Harap menggunakan Username yang lain'
        ]);

        $userP = \App\Models\UserPelanggan::where([
            'username_plgn' => $request->username,
        ])->first();
        $userUA = DB::table('user_admin')
            ->where('username_ua', '=', $request->username)
            ->first();

        $userEmail = \App\Models\UserPelanggan::where([
            'email_plgn' => $request->email,
        ])->first();
        $userUAEmail = DB::table('user_admin')
            ->where('email_ua', '=', $request->email)
            ->first();

        if (!empty($userP) && !empty($userUA)) {
            return redirect('/sign-up')->with('error', 'Username is use!');
        }
        if (!empty($userEmail) && !empty($userUAEmail)) {
            return redirect('/sign-up')->with('error', 'Email is use!');
        }
        if ($request->userTipe == "pelanggan") {
            $dataInput = array(
                'nama_plgn' => $request->nama,
                'username_plgn' => $request->username,
                'password_plgn' => md5($request->password),
                'email_plgn' => $request->email,
                'no_telp_plgn' => $request->phone,
                // 'no_wa_plgn'            => $request->wa,
                'kategori_plgn' => "guest",
                'jenis_kelamin_status' => $request->kelamin,

            );

            // dd($dataInput);
            // die();

            $getIDUser = DB::table('user_admin')->insertGetId(
                $dataInput
            );

            $dataUserMenu =   [
                'id_menu' => 1,
                'id_user_admin' => $getIDUser,
                'status_um' => 'aktif'
            ];
            $dataUserProjek =  [
                'id_projek'    => 1,
                'id_user_admin' => $getIDUser
            ];

            DB::table('user_menu')->insert(
                $dataUserMenu
            );
            DB::table('user_projek')->insert(
                $dataUserProjek
            );
        }
        if ($request->userTipe == "agentWithCompany") {
            $dataInput = array(
                'id_kategori' => 24,
                'code_id_ua' => "XMP" . date("dmy", strtotime($request->tanggalLahir)) . "AGC",
                'username_ua' => $request->username,
                'nama_ua' => $request->nama,
                'tgl_lahir_ua' => $request->tanggalLahir,
                'password_ua' => md5($request->password),
                'email_ua' => $request->email,
                'no_tlp_ua' => $request->phone,
                'status_ua' => "Aktif",
                // 'no_wa_plgn'            => $request->wa,
                // 'jenis_kelamin_status' => $request->kelamin,
            );
            $getIDUser = DB::table('user_admin')->insertGetId(
                $dataInput
            );

            $dataUserMenu =   [
                'id_menu' => 1,
                'id_user_admin' => $getIDUser,
                'status_um' => 'aktif'
            ];
            $dataUserProjek =  [
                'id_projek'    => 1,
                'id_user_admin' => $getIDUser
            ];

            DB::table('user_menu')->insert(
                $dataUserMenu
            );
            DB::table('user_projek')->insert(
                $dataUserProjek
            );
        }
        if ($request->userTipe == "agentWithoutCompany") {
            $dataInput = array(
                'id_kategori' => 5,
                'code_id_ua' => "MDT" . date("dmy", strtotime($request->tanggalLahir)) . "AG",
                'username_ua' => $request->username,
                'nama_ua' => $request->nama,
                'tgl_lahir_ua' => $request->tanggalLahir,
                'password_ua' => md5($request->password),
                'email_ua' => $request->email,
                'no_tlp_ua' => $request->phone,
                'status_ua' => "Aktif",
                // 'no_wa_plgn'            => $request->wa,
                // 'jenis_kelamin_status' => $request->kelamin,
            );
            $getIDUser = DB::table('user_admin')->insertGetId(
                $dataInput
            );

            $dataUserMenu =   [
                'id_menu' => 1,
                'id_user_admin' => $getIDUser,
                'status_um' => 'aktif'
            ];
            $dataUserProjek =  [
                'id_projek'    => 1,
                'id_user_admin' => $getIDUser
            ];

            DB::table('user_menu')->insert(
                $dataUserMenu
            );
            DB::table('user_projek')->insert(
                $dataUserProjek
            );
        }
        if ($request->userTipe == "sales") {
            $dataInput = array(
                'id_kategori' => 4,
                'code_id_ua' => "GL" . date("dmy", strtotime($request->tanggalLahir)) . "SL",
                'username_ua' => $request->username,
                'nama_ua' => $request->nama,
                'tgl_lahir_ua' => $request->tanggalLahir,
                'password_ua' => md5($request->password),
                'email_ua' => $request->email,
                'no_tlp_ua' => $request->phone,
                'status_ua' => "Aktif",
                // 'no_wa_plgn'            => $request->wa,
                // 'jenis_kelamin_status' => $request->kelamin,
            );
            $getIDUser = DB::table('user_admin')->insertGetId(
                $dataInput
            );

            $dataUserMenu =   [
                'id_menu' => 1,
                'id_user_admin' => $getIDUser,
                'status_um' => 'aktif'
            ];
            $dataUserProjek =  [
                'id_projek'    => 1,
                'id_user_admin' => $getIDUser
            ];

            DB::table('user_menu')->insert(
                $dataUserMenu
            );
            DB::table('user_projek')->insert(
                $dataUserProjek
            );
        }
        $data = [
            "subject" => "Form Living",
            "body" => "Form Living",
            "nama" => $request->nama,

        ];
        $template = 'mail.mailRegister';
        // MailNotify class that is extend from Mailable class.
        try {
            Mail::to($request->email)->send(new MailNotify($data, $template));
            // return response()->json(['Great! Successfully send in your mail']);
        } catch (Exception $e) {
            // return response()->json(['Sorry! Please try again latter']);
        }
        return redirect('/login')->with('success', 'Your Account ' . $request->username . ' has been created');
        // return view('signUp');
        # code...
    }

    public function DashboardProfile()
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...

        }

        if (session()->has('user')) {

            // $lastMonth = \Carbon\Carbon::now()->subMonth();

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
                    'formulir_pesanan.id_user_admin' => session::get('user'),
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
                    'formulir_pesanan.id_user_admin' => session::get('user'),
                ])
                ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month)
                ->first();

            $fpCountLast = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->select(DB::raw('COUNT(rumah.id_rumah) as count'))
                ->where([
                    'formulir_pesanan.id_user_admin' => session::get('user'),
                ])
                ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month - 1)
                ->first();

            $fpCountAll = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->select(DB::raw('COUNT(rumah.id_rumah) as count'))
                ->where([
                    'formulir_pesanan.id_user_admin' => session::get('user'),
                ])

                ->first();

            // dd($fpCount);
            // die();
            return view('dashboardProfile', compact('user', 'fp', 'fpCount', 'fpCountLast', 'fpCountAll'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            $fp = DB::table('formulir_pesanan')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                // ->select('logo_img','nama_img','cluster.nama_cluster', 'cluster.codecluster', 'cluster.nama_img', DB::raw('COUNT(rumah.id_rumah) as count'))
                // ->groupBy('cluster.nama_cluster')
                ->where([
                    'formulir_pesanan.id_pelanggan' => session::get('guest'),
                ])
                // ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month)
                // ->where(
                //         "MONTH('formulir_pesanan'.'tgl_input_fp')",'=','MONTH(CURRENT_DATE())'
                //         )
                ->get();
            // dd($userPelanggan);
            // die();
            return view('dashboardProfile', compact('userPelanggan', 'fp'));
        }

        return view('login');
        # code...
    }
    public function formulirPesanan($id_formulir)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...

        }

        if (session()->has('user')) {

            // $lastMonth = \Carbon\Carbon::now()->subMonth();

            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where(['id_user_admin' => session::get('user')])
                ->first();

            $fp = DB::table('formulir_pesanan')
                ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'formulir_pesanan.id_rumah')
                ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
                ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where('id_formulir', '=', $id_formulir)
                ->first();
            $promo = "";
            $dtPembayaran = DB::table('pembayaran_rumah')
                ->where('id_formulir', '=', $id_formulir)
                ->get();

            // dd($fpCount);
            // die();
            return view('formulirPesanan', compact('user', 'fp', 'dtPembayaran', 'promo'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where(['id_user_admin' => session::get('user')])
                ->first();

            $fp = DB::table('formulir_pesanan')
                ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'formulir_pesanan.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
                // ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
                // ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where('id_formulir', '=', $id_formulir)
                ->first();
            $dtPembayaran = DB::table('pembayaran_rumah')
                ->where('id_formulir', '=', $id_formulir)
                ->get();

            // dd($fp);
            // die();
            return view('formulirPesanan', compact('userPelanggan', 'fp', 'dtPembayaran'));
        }

        return view('login');
        # code...
    }
    public function Cetak($id_formulir)
    {
        if (session()->has('user')) {
            $fp = DB::table('formulir_pesanan')
                ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'formulir_pesanan.id_rumah')
                ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
                ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where('id_formulir', '=', $id_formulir)
                ->first();
            $dtPembayaran = DB::table('pembayaran_rumah')
                ->where('id_formulir', '=', $id_formulir)
                ->get();

            $dtPem = "";
            // for ($i = 0; $i < count($dtPembayaran); $i++) {
            //     # code...
            // }
            ob_start();
            echo "<tbody>";
            foreach ($dtPembayaran as $pem) {
                echo "<tr style='border: 1px solid; font-size:12px'>" .
                    "<td style='border: 1px solid; width:70%'> " . $pem->detail_pr . " </td>" .
                    "<td style='border: 1px solid;width:30%'> " . date("d M Y", strtotime($pem->tgl_pr)) . " <a href='
                https://calendar.google.com/calendar/render?action=TEMPLATE&text=Pembayaran Tagihan " . $pem->detail_pr . "&dates=" . date("Ymd", strtotime($pem->tgl_pr)) . "T193000Z/" . date("Ymd", strtotime($pem->tgl_pr)) . "T223000Z&details=Pembayaran Tagihan " . $pem->detail_pr . " sejumlah " . $this->rupiah($pem->harga_pr) . "&location=Jakarta
                ' style='border-radius:5px;
                border:1px solid #a37343;
                display:inline-block;
                cursor:pointer;
                color:#a37343;' > Simpan </a>  </td>"
                    . "</tr>";
            }
            echo "</tbody>";
            $dtPem = ob_get_clean();

            $data = [
                "subject" => "Form Living",
                "body" => "Form Living",
                "dataFP" => array($fp),
                "dataPembayaran" => $dtPem,
                "hargaAwal" => $fp->harga_awal,
                "promo" => "Tidak Ada Promo",
                "tgl_input" => date("d M Y", strtotime($fp->tgl_input_fp)),
            ];
            // echo $dtPem;
            // die();
            // dd($data);
            // die();
            // view()->share('data',$data);
            $pdf = PDF::loadView('pdf.printSPR-ttd-non-promo', ['fp' => $fp, 'dtPembayaran' => $dtPembayaran]);
            // $pdf = PDF::loadView('mail.index');
            $pdf->setPaper('F4', 'potrait');
            // Storage::put('public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf', $pdf->output());
            // $pdf->render();
            // $pdfData = $pdf->output();
            // $filename = 'public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf';
            // Storage::put($filename, $pdfData);
            // dd($fp);
            // $path = 'Home/pdf/';
            // $pdf->save($path . 'FP-'.$fp->blok."-".$fp->nomor.'-'.$fp->id_formulir.'.pdf');
            return $pdf->download('FP-' . $fp->blok . "-" . $fp->nomor . '.pdf');
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();

            $fp = DB::table('formulir_pesanan')
                ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'formulir_pesanan.id_rumah')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
                // ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
                // ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where('id_formulir', '=', $id_formulir)
                ->first();
            $dtPembayaran = DB::table('pembayaran_rumah')
                ->where('id_formulir', '=', $id_formulir)
                ->get();

            $dtPem = "";
            // for ($i = 0; $i < count($dtPembayaran); $i++) {
            //     # code...
            // }
            ob_start();
            echo "<tbody>";
            foreach ($dtPembayaran as $pem) {
                echo "<tr style='border: 1px solid; font-size:12px'>" .
                    "<td style='border: 1px solid; width:70%'> " . $pem->detail_pr . " </td>" .
                    "<td style='border: 1px solid;width:30%'> " . date("d M Y", strtotime($pem->tgl_pr)) . " <a href='
            https://calendar.google.com/calendar/render?action=TEMPLATE&text=Pembayaran Tagihan " . $pem->detail_pr . "&dates=" . date("Ymd", strtotime($pem->tgl_pr)) . "T193000Z/" . date("Ymd", strtotime($pem->tgl_pr)) . "T223000Z&details=Pembayaran Tagihan " . $pem->detail_pr . " sejumlah " . $this->rupiah($pem->harga_pr) . "&location=Jakarta
            ' style='border-radius:5px;
            border:1px solid #a37343;
            display:inline-block;
            cursor:pointer;
            color:#a37343;' > Simpan </a>  </td>"
                    . "</tr>";
            }
            echo "</tbody>";
            $dtPem = ob_get_clean();

            $data = [
                "subject" => "Form Living",
                "body" => "Form Living",
                "dataFP" => array($fp),
                "dataPembayaran" => $dtPem,
                "hargaAwal" => $fp->harga_awal,
                "promo" => "Tidak Ada Promo",
                "tgl_input" => date("d M Y", strtotime($fp->tgl_input_fp)),
            ];
            // echo $dtPem;
            // die();\
            // MASIH LOADING EXPORT PDFF YA SABAR
            // dd($data);
            // die();
            // view()->share('data',$data);
            $pdf = PDF::loadView('pdf.printSPR', ['fp' => $fp, 'dtPembayaran' => $dtPembayaran]);
            // $pdf = PDF::loadView('mail.index');
            $pdf->setPaper('F4', 'potrait');
            // Storage::put('public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf', $pdf->output());
            // $pdf->render();
            // $pdfData = $pdf->output();
            // $filename = 'public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf';
            // Storage::put($filename, $pdfData);
            // dd($fp);
            // $path = 'Home/pdf/';
            // $pdf->save($path . 'FP-'.$fp->blok."-".$fp->nomor.'-'.$fp->id_formulir.'.pdf');
            set_time_limit(2000);
            return $pdf->download('FP-' . $fp->blok . "-" . $fp->nomor . '.pdf');
        } else {

            return view('login');
        }

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
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            // ->select()
            ->select('*', Rumah::raw('COUNT(rumah.id_rumah) as count'))
            ->where('status', '=', 'available')
            ->where('projek.nama_projek', '=', 'Greenland')
            ->groupBy('cluster.nama_cluster')

            ->get();
        $rumah = DB::table('rumah')
            ->select('*')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('projek.nama_projek', '=', 'Greenland')
            ->where('status', '=', 'available')
            // ->groupBy('cluster.nama_cluster')
            ->get();

        //session check untuk user
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])
                ->first();
            return view('simCluster', compact('user', 'cluster', 'rumah'));
        }
        // session check untuk pelanggan
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            return view('simCluster', compact('userPelanggan', 'cluster', 'rumah'));
        }
        return view('simCluster', compact('cluster', 'rumah'));
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
            'id_tipe_rumah' => $id_tipe,
        ])->first();
        // dd($tipeRumah);
        // die();
        $imgRumahSingle = DB::table('gambar_rumah')
            ->where([
                'id_rumah' => $id_rumah,
            ])
            ->where([
                'id_tipe' => $id_tipe,
            ])
            ->first();
        $imgRumah = DB::table('gambar_rumah')
            ->where([
                'id_rumah' => $id_rumah,
            ])
            ->where([
                'id_tipe' => $id_tipe,
            ])
            ->where([
                'jenis_img' => 'gambar',
            ])
            ->where('status_gr', '=', 'aktif')
            ->get();

        $imgRumah2 = DB::table('gambar_rumah')
            ->where([
                'id_rumah' => $id_rumah,
            ])
            ->where([
                'id_tipe' => $id_tipe,
            ])
            ->where([
                'jenis_img' => 'gambar',
            ])
            ->where('status_gr', '=', 'aktif')
            ->get();
            // dd($imgRumah2);
        $imgDenah = DB::table('gambar_rumah')
            ->where([
                'id_rumah' => $id_rumah,
            ])
            ->where([
                'id_tipe' => $id_tipe,
            ])
            ->where([
                'jenis_img' => 'denah',
            ])
            ->get();
        // dd($imgDenah);
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
            // return view('underMT');
            return view('simDetailType', compact(
                'user',
                'rumah',
                'tipeRumah',
                'imgRumahSingle',
                'imgRumah',
                'imgRumah2',
                'imgDenah'
            ));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();

            // dd($userPelanggan);
            // die();
            // return view('underMT');
            return view('simDetailType', compact(
                'userPelanggan',
                'rumah',
                'tipeRumah',
                'imgRumahSingle',
                'imgRumah',
                'imgRumah2',
                'imgDenah'
            ));
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
            ])->first();

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
    public function SimDataPelanggan($id_rumah, $id_tipe)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        // dd($kkpr);
        // die();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe,
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        $promo = DB::table('promo')
            ->join('list_promo', 'promo.id_promo', '=', 'list_promo.id_promo')
            ->where('promo.status', '=', "aktif")
            ->where('promo.tipe_promo', '=', "standart")
            ->whereOr('list_promo.codecluster', '=', $rumah->codecluster)
            ->where('list_promo.id_rumah', '=', null)
            ->where('tgl_aktif', '<=', NOW())
            ->where('tgl_berakhir', '>=', NOW())
            ->get();
        $promoRumah = DB::table('promo')
            ->join('list_promo', 'promo.id_promo', '=', 'list_promo.id_promo')
            ->where('promo.status', '=', "aktif")
            ->where('promo.tipe_promo', '=', "standart")
            ->whereOr('list_promo.codecluster', '=', null)
            ->where('list_promo.id_rumah', '=', $rumah->id_rumah)
            ->where('tgl_aktif', '<=', NOW())
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
            // return view('underMT', compact('rumah', 'tipeRumah'));
            return view('simDataPelanggan', compact('user', 'tipeRumah', 'rumah', 'promo', 'promoRumah'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            // return view('underMT', compact('rumah', 'tipeRumah'));
            return view('simDataPelanggan', compact('userPelanggan', 'tipeRumah', 'rumah', 'promo'));
        }
        return view('login');

        # code...
    }

    public function SumDataPelangganAction(Request $request, $id_rumah, $id_tipe)
    {
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe,
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

            $checkPelanggan = DB::table('user_pelanggan')
                ->where('no_ktp_plgn', '=', $request->nik)
                ->first();
            // dd($checkPelanggan);
            $id = null;
            if (!empty($checkPelanggan)) {
                $id = $checkPelanggan->id_pelanggan;
            }
            if (empty($checkPelanggan)) {
                $dataInput = array(
                    'nama_plgn' => $request->nama,
                    'id_user_admin' => session::get('user'),
                    'pekerjaan_plgn' => $request->pekerjaan,
                    // 'id_sales'              => session::get('user'),
                    'no_ktp_plgn' => $request->nik,
                    'no_telp_plgn' => $request->telp,
                    'no_wa_plgn' => $request->wa,
                    'alamat_plgn' => $request->jalan . ', ' . $request->kelurahan . ', ' . $request->kecamatan . ', ' . $request->kota . ', ' . $request->pulau,
                    'email_plgn' => $request->email,
                    'npwp_plgn' => $request->npwp,
                    'jenis_kelamin_status' => $request->gender,
                    'status_pernikahan_plgn' => $request->statusPernikahan,
                    // 'id_kkpr'               => $kkpr->id_kkpr,

                );
                // dd($dataInput);
                // die();

                $this->validate($request, [
                    'nama' => 'required|min:3',

                    'email' => 'required',
                    // 'user'  => 'required'
                    // 'phone' => 'required|numeric',

                    // 'kelamin'   => 'required',

                ]);

                $id = DB::table('user_pelanggan')->insertGetId(
                    $dataInput
                );
            }

            return redirect('/simulation-payment-option/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $id . '/' . $request->promo);

            // dd($dataInput);
            // die();

        }

        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();

            $checkPelanggan = DB::table('user_pelanggan')
                ->where('no_ktp_plgn', '=', $request->nik)
                ->first();

            $id = null;
            if (!empty($checkPelanggan)) {
                $id = $checkPelanggan->id_pelanggan;
            }
            if (empty($checkPelanggan)) {
                $dataInput = array(
                    'nama_plgn' => $request->nama,
                    'id_user_admin' => session::get('user'),
                    'pekerjaan_plgn' => $request->pekerjaan,
                    // 'id_sales'              => session::get('user'),
                    'no_ktp_plgn' => $request->nik,
                    'no_telp_plgn' => $request->telp,
                    'no_wa_plgn' => $request->wa,
                    'alamat_plgn' => $request->jalan . ', ' . $request->kelurahan . ', ' . $request->kecamatan . ', ' . $request->kota . ', ' . $request->pulau,
                    'email_plgn' => $request->email,
                    'npwp_plgn' => $request->npwp,
                    'jenis_kelamin_status' => $request->gender,
                    'status_pernikahan_plgn' => $request->statusPernikahan,
                    // 'id_kkpr'               => $kkpr->id_kkpr,

                );
                // dd($dataInput);
                // die();

                $this->validate($request, [
                    'nama' => 'required|min:3',

                    'email' => 'required',
                    // 'user'  => 'required'
                    // 'phone' => 'required|numeric',

                    // 'kelamin'   => 'required',

                ]);

                $id = DB::table('user_pelanggan')->insertGetId(
                    $dataInput
                );
            }
            return redirect('/simulation-payment-option/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $id . '/' . $request->promo);

            // dd($dataInput);
            // die();

        }
    }

    public function FindKuponSpesial($id_rumah, $id_tipe, $id_pelanggan, $kode_promo)
    {
        $promo = DB::table('promo')

            ->where('status', '=', "aktif")
            ->where('tipe_promo', '=', "special")
            // ->where('tgl_aktif', '<=', NOW())
            ->where('tgl_berakhir', '>=', NOW())
            ->where([
                'kode_promo' => $kode_promo,
            ])->get();
        // dd($promo);
        // die();
        return response()->json($promo);
    }

    public function SimPayment($id_rumah, $id_tipe, $id_pelanggan, $kdPromo)
    {

        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }
        $promo = DB::table('promo')
            ->where('kode_promo', '=', $kdPromo)
            ->first();
        if ($kdPromo != "Tidak Ada Promo") {
            $kdPromo = $promo->kode_promo;
        }
        $pelanggan = DB::table('user_pelanggan')
            ->where('id_pelanggan', '=', $id_pelanggan)
            ->first();

        $skBunga = DB::table('sk_bunga')->where([
            'status_bunga' => "aktif",
        ])->get();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe,
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
            return view('simPayment', compact('user', 'tipeRumah', 'rumah', 'pelanggan', 'kdPromo'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();

            // dd($userPelanggan);
            // die();

            return view('simPayment', compact('userPelanggan', 'tipeRumah', 'rumah', 'pelanggan', 'kdPromo'));
        }
        return view('simPayment', 'tipeRumah', 'rumah');

        # code...
    }

    public function SimPrice(Request $request, $id_rumah, $id_tipe, $id_pelanggan, $kdPromo)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }
        $promo = DB::table('promo')
            ->where('kode_promo', '=', $kdPromo)
            ->first();
        if ($kdPromo != "Tidak Ada Promo") {
            $kdPromo = $promo->kode_promo;
        }
        $pelanggan = DB::table('user_pelanggan')
            ->where('id_pelanggan', '=', $id_pelanggan)
            ->first();
        $skBunga = DB::table('sk_bunga')
            ->join('list_sk_bunga', 'sk_bunga.id_bunga', '=', 'list_sk_bunga.id_bunga')
            ->where([
                'status_bunga' => "aktif",
            ])
            ->where('list_sk_bunga.id_rumah', '=', $id_rumah)
            ->get();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe,
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        $payment = $request->payment;

        if (!empty($payment)) {

            return redirect('/simulation-price-payment/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $id_pelanggan . '/' . $kdPromo . '/' . $payment);
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
            return view('simPrice', compact('user', 'tipeRumah', 'rumah', 'payment', 'kdPromo', 'promo'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simPrice', compact('userPelanggan', 'tipeRumah', 'rumah', 'payment', 'kdPromo', 'promo'));
        }
        return view('simPrice', 'tipeRumah', 'rumah', 'payment');
        # code...
    }
    public function SimPricePayment($id_rumah, $id_tipe, $id_pelanggan, $kdPromo, $payment)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }
        $promo = DB::table('promo')
            ->where('kode_promo', '=', $kdPromo)
            ->first();
        if ($kdPromo != "Tidak Ada Promo") {
            $kdPromo = $promo->kode_promo;
        }
        $pelanggan = DB::table('user_pelanggan')
            ->where('id_pelanggan', '=', $id_pelanggan)
            ->first();
        $skBunga = DB::table('sk_bunga')->where([
            'status_bunga' => "aktif",
        ])
            ->groupBy('nama_bank')
            ->get();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe,
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
            return view('simPrice', compact('user', 'tipeRumah', 'rumah', 'payment', 'skBunga', 'pelanggan', 'kdPromo', 'promo'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();

            return view('simPrice', compact('userPelanggan', 'tipeRumah', 'rumah', 'payment', 'skBunga', 'pelanggan', 'kdPromo', 'promo'));
        }
        return view('simPrice', 'tipeRumah', 'rumah', 'payment');
        # code...
    }

    // AJAX
    public function getSKBunga($id_rumah, $id_tipe, $id_pelanggan, $kdPromo, $payment, $namaBank = "")
    {
        $skBunga = DB::table('sk_bunga')
            ->select('sk_bunga.id_bunga', 'sk_bunga.nama_bank', 'sk_bunga.persentase')
            ->join('list_sk_bunga', 'sk_bunga.id_bunga', '=', 'list_sk_bunga.id_bunga')

            ->where([
                'list_sk_bunga.id_rumah' => $id_rumah,
                'sk_bunga.status_bunga' => "aktif",
                'nama_bank' => $namaBank,
            ])->get();
        // dd($skBunga);

        return response()->json($skBunga);
    }

    public function SimPricePaymentAction(Request $request, $id_rumah, $id_tipe, $id_pelanggan, $kdPromo, $payment)
    {
        $promo = DB::table('promo')
            ->where('kode_promo', '=', $kdPromo)
            ->first();
        if ($kdPromo != "Tidak Ada Promo") {
            $kdPromo = $promo->kode_promo;
        }
        $pelanggan = DB::table('user_pelanggan')
            ->where('id_pelanggan', '=', $id_pelanggan)
            ->first();

        $skBunga = DB::table('sk_bunga')->where([
            'status_bunga' => "aktif",
        ])->get();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe,
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
                if ($kdPromo == "Tidak Ada Promo") {
                    $dataInput = array(
                        'id_bunga' => $bank[0],
                        'uang_muka' => preg_replace('/\D/', '', $request->uangMuka),
                        'luas_bangunan_kkpr' => $tipeRumah->luas_bangunan_tr,
                        'luas_tanah_kkpr' => $rumah->luas_tanah,
                        'tipe_kkpr' => $tipeRumah->jenis_tr,
                        'harga_awal' =>  preg_replace('/\D/', '', $request->jumlah) +
                            preg_replace('/\D/', '', $request->uangMuka)
                            + 10000000,
                        'total_harga' =>  preg_replace('/\D/', '', $request->jumlah),
                        'bunga' => $bank[1],
                        'cicilan_um' => $request->cicilanUM,

                    );
                }
                if (!empty($promo)) {
                    $dataInput = array(
                        'id_bunga' => $bank[0],
                        'uang_muka' => preg_replace('/\D/', '', $request->uangMuka),
                        'luas_bangunan_kkpr' => $tipeRumah->luas_bangunan_tr,
                        'luas_tanah_kkpr' => $rumah->luas_tanah,
                        'tipe_kkpr' => $tipeRumah->jenis_tr,
                        'harga_awal' => preg_replace('/\D/', '', $request->jumlah) +
                            preg_replace('/\D/', '', $request->uangMuka)
                            + 10000000,
                        'total_harga' =>  preg_replace('/\D/', '', $request->jumlah) - $promo->diskon_promo,
                        'total_diskon' => $promo->diskon_promo,
                        'bunga' => $bank[1],
                        'cicilan_um' => $request->cicilanUM,

                    );
                }
                // dd($dataInput);
            }

            if ($payment == "Cicilan") {
                if ($kdPromo == "Tidak Ada Promo") {
                    $dataInput = array(
                        'harga_awal' => $tipeRumah->harga_tr,
                        'uang_muka' => $tipeRumah->harga_tr * (10 / 100),
                        'luas_bangunan_kkpr' => $tipeRumah->luas_bangunan_tr,
                        'luas_tanah_kkpr' => $rumah->luas_tanah,
                        'tipe_kkpr' => $tipeRumah->jenis_tr,
                        'harga_awal' => $tipeRumah->harga_tr,
                        'total_harga' => $tipeRumah->harga_tr,

                        'cicilan' => $request->cicilan,
                    );
                }
                if (!empty($promo)) {
                    $dataInput = array(
                        'harga_awal' => $tipeRumah->harga_tr,
                        'uang_muka' => $tipeRumah->harga_tr * (10 / 100),
                        'luas_bangunan_kkpr' => $tipeRumah->luas_bangunan_tr,
                        'luas_tanah_kkpr' => $rumah->luas_tanah,
                        'tipe_kkpr' => $tipeRumah->jenis_tr,
                        'harga_awal' => $tipeRumah->harga_tr,
                        'total_harga' => $tipeRumah->harga_tr - $promo->diskon_promo,
                        'total_diskon' => $promo->diskon_promo,
                        'cicilan' => $request->cicilan,
                    );
                }
            }
            // dd($dataInput);
            $id = DB::table('kalkulator_kpr')->insertGetId(
                $dataInput
            );
            return redirect('/simulation-summary/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $id_pelanggan . '/' . $kdPromo . '/' . $payment . '/' . $id);
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
                    'id_bunga' => $bank[0],
                    'uang_muka' => preg_replace('/\D/', '', $request->uangMuka),
                    'harga_awal' => (int) preg_replace('/\D/', '', $request->jumlah) +
                        (int) preg_replace('/\D/', '', $request->uangMuka)
                        + 10000000,
                    'bunga' => $bank[1],

                );
            }

            if ($payment == "Cicilan") {
                $dataInput = array(

                    'cicilan' => $request->cicilan,
                );
            }
            // dd($dataInput);
            //     die();
            $id = DB::table('kalkulator_kpr')->insertGetId(
                $dataInput
            );
            return redirect('/simulation-summary/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $id_pelanggan . '/' . $kdPromo . '/' . $payment . '/' . $id);
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
            'id_kkpr' => $id_kkpr,
        ])->first();
        // dd($kkpr);
        // die();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe,
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
                'kode_promo' => $kode_promo,
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
            'id_tipe_rumah' => $id_tipe,
        ])->first();
        $kkpr = DB::table('kalkulator_kpr')->where([
            'id_kkpr' => $id_kkpr,
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
                'nama' => 'required|min:3',

                'email' => 'required',
                // 'user'  => 'required'
                // 'phone' => 'required|numeric',

                // 'kelamin'   => 'required',

            ]);

            $dataInput = array(
                'nama_plgn' => $request->nama,
                'id_user_admin' => session::get('user'),
                // 'id_sales'              => session::get('user'),
                'no_ktp_plgn' => $request->nik,
                'no_telp_plgn' => $request->telp,
                'no_wa_plgn' => $request->wa,
                'alamat_plgn' => $request->jalan . ', ' . $request->kelurahan . ', ' . $request->kecamatan . ', ' . $request->kota . ', ' . $request->pulau,
                'email_plgn' => $request->email,
                'npwp_plgn' => $request->npwp,
                'jenis_kelamin_status' => $request->gender,
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
                'nama' => 'required|min:3',

                'email' => 'required',
                // 'phone' => 'required|numeric',

                // 'kelamin'   => 'required',

            ]);

            $dataInput = array(
                'nama_plgn' => $request->nama,
                'no_ktp_plgn' => $request->nik,
                'no_telp_plgn' => $request->telp,
                'no_wa_plgn' => $request->wa,
                'alamat_plgn' => $request->jalan . ', ' . $request->kelurahan . ', ' . $request->kecamatan . ', ' . $request->kota . ', ' . $request->pulau,
                'email_plgn' => $request->email,
                'npwp_plgn' => $request->npwp,
                'jenis_kelamin_status' => $request->gender,
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

    public function SimSummary($id_rumah, $id_tipe, $id_pelanggan, $voucher, $payment, $id_kkpr)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $pelanggan = DB::table('user_pelanggan')->where([
            'id_pelanggan' => $id_pelanggan,
        ])->first();
        $kkpr = DB::table('kalkulator_kpr')->where([
            'id_kkpr' => $id_kkpr,
        ])->first();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe,
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
                'kuota_promo' => $promo->kuota_promo - 1,

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
            'id_tipe_rumah' => $id_tipe,
        ])->first();

        $pelanggan = DB::table('user_pelanggan')->where([
            'id_pelanggan' => $id_pelanggan,
        ])->first();
        $kkpr = DB::table('kalkulator_kpr')->where([
            'id_kkpr' => $id_kkpr,
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
        $template = 'mail.mailFP';
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();
            $this->validate($request, [
                'harga' => 'required',

                // 'phone' => 'required|numeric',

                // 'kelamin'   => 'required',

            ]);
            // if (!empty($promo)) {
            //     $dataInputDetail = array(
            //         'luas_tanah_kkpr' => $rumah->luas_tanah,
            //         'tipe_kkpr' => $tipeRumah->jenis_tr,
            //         'harga_awal' => $tipeRumah->harga_tr,
            //         'total_diskon' => $promo->diskon_promo,
            //         'uang_muka' => $request->harga * (10 / 100),
            //         'total_harga' => $request->harga,

            //     );
            // }
            // if (empty($promo)) {
            //     $dataInputDetail = array(
            //         'luas_tanah_kkpr' => $rumah->luas_tanah,
            //         'tipe_kkpr' => $tipeRumah->jenis_tr,
            //         'harga_awal' => $tipeRumah->harga_tr,
            //         'uang_muka' => $request->harga * (10 / 100),
            //         'total_harga' => $request->harga,
            //     );
            // }
            // DB::table('kalkulator_kpr')
            //     ->where('id_kkpr', $id_kkpr)
            //     ->update(
            //         $dataInputDetail
            //     );

            // $id = DB::table('kalkulator_kpr')->insertGetId(
            //     $dataInputDetail
            // );

            if (!empty($promo)) {
                $dataInput = array(
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'id_user_admin' => session::get('user'),
                    'id_kkpr' => $id_kkpr,
                    'id_rumah' => $id_rumah,
                    'id_tipe_rumah' => $id_tipe,
                    'jenis_pembayaran_fp' => $payment,
                    'id_promo' => $promo->id_promo,
                    'id_sales' => session::get('user'),
                    'promo_fp' => $promo->keterangan,

                );
            }
            if (empty($promo)) {
                $dataInput = array(
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'id_user_admin' => session::get('user'),
                    'id_kkpr' => $id_kkpr,
                    'id_rumah' => $id_rumah,
                    'id_tipe_rumah' => $id_tipe,
                    'jenis_pembayaran_fp' => $payment,
                    'id_sales' => session::get('user'),

                );
            }
            $fp = DB::table('formulir_pesanan')->insertGetId(
                $dataInput
            );

            $dtPembayaran = [];
            $now = Carbon::now();

            if ($payment == "Cicilan") {
                # code...
                $dtPembayaran[] = array(
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => "Booking Fee",
                    'harga_pr' => 10000000,
                    'sisa_pr' => 10000000,
                    'tgl_pr' => $now->addDays(7)->format("Y-m-d"),
                    'status_pr' => "belum",
                );

                $dtPembayaran[] = array(
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => "Uang Muka ",
                    'harga_pr' => (float) $kkpr->uang_muka - 10000000,
                    'sisa_pr' => (float) $kkpr->uang_muka - 10000000,
                    'tgl_pr' => $now->addMonth()->format("Y-m-d"),
                    'status_pr' => "belum",
                );

                for ($i = 1; $i < $kkpr->cicilan + 1; $i++) {

                    if (!empty($promo)) {
                        $dtPembayaran[] = array(
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => "Cicilan " . $i,
                            'harga_pr' => (float) ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100) + $kkpr->total_diskon)) / $kkpr->cicilan,
                            'sisa_pr' =>  (float) ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100) + $kkpr->total_diskon)) / $kkpr->cicilan,
                            'tgl_pr' =>  $now->addMonth()->format("Y-m-d"),
                            'status_pr' => "belum",
                        );
                    }
                    if (empty($promo)) {
                        $dtPembayaran[] = array(
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => "Cicilan " . $i,
                            'harga_pr' => (float) ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100))) / $kkpr->cicilan,
                            'sisa_pr' => (float) ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100))) / $kkpr->cicilan,
                            'tgl_pr' =>  $now->addMonth()->format("Y-m-d"),
                            'status_pr' => "belum",
                        );
                    }
                }
            }
            if ($payment == "KPR") {
                $dtPembayaran[] = array(
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => "Booking Fee",
                    'harga_pr' => 10000000,
                    'sisa_pr' => 10000000,
                    'tgl_pr' => $now->addDays(7)->format("Y-m-d"),
                    'status_pr' => "belum",
                );
                $dtPembayaran[] = array(
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => "Cicilan Uang Muka " . 1,
                    'harga_pr' => ($kkpr->uang_muka - 10000000) / $kkpr->cicilan_um,
                    'sisa_pr' => ($kkpr->uang_muka - 10000000) / $kkpr->cicilan_um,
                    'tgl_pr' => $now->addMonth()->format("Y-m-d"),
                    'status_pr' => "belum",
                );
                for ($k = 1; $k < $kkpr->cicilan_um; $k++) {

                    $dtPembayaran[] = array(
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => "Cicilan Uang Muka " . 1 + $k,
                        'harga_pr' => ($kkpr->uang_muka - 10000000) / $kkpr->cicilan_um,
                        'sisa_pr' => ($kkpr->uang_muka - 10000000) / $kkpr->cicilan_um,
                        'tgl_pr' => $now->addMonth()->format("Y-m-d"),
                        'status_pr' => "belum",
                    );
                }
                if (!empty($promo)) {
                    $dtPembayaran[] = array(
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => "KPR",
                        'harga_pr' => (float) ($kkpr->total_harga) - ($kkpr->uang_muka + $kkpr->total_diskon),
                        'sisa_pr' => (float)($kkpr->total_harga) - ($kkpr->uang_muka + $kkpr->total_diskon),
                        'tgl_pr' => $now->addYears(5)->format("Y-m-d"),
                        'status_pr' => "belum",
                    );
                }
                if (empty($promo)) {
                    $dtPembayaran[] = array(
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => "KPR",

                        'harga_pr' =>  (float) ($kkpr->total_harga) - $kkpr->uang_muka,
                        'sisa_pr' => (float) ($kkpr->total_harga) - $kkpr->uang_muka,
                        'tgl_pr' => $now->addYears(5)->format("Y-m-d"),
                        'status_pr' => "belum",
                    );
                }
            }
            // dd($dtPembayaran);
            DB::table('pembayaran_rumah')->insert(
                $dtPembayaran
            );

            $fpJadi = DB::table('formulir_pesanan')
                ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
                ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
                ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where('id_formulir', '=', $fp)
                ->first();

            // dd($fpJadi);
            $dataPembayaran = DB::table('pembayaran_rumah')
                ->where('id_formulir', '=', $fp)
                ->get();
            $promo = "";
            if (!empty($fpJadi->id_promo)) {
                $promo = DB::table('promo')
                    ->where('id_promo', '=', $fpJadi->id_promo)
                    ->first();
            }

            // $dtUpdate = [
            //     'status' => "Keep"
            // ];
            // DB::table('rumah')
            // ->where('id_rumah',"=",$id_rumah)
            // ->update(
            //     $dtUpdate
            // );

            $accounting = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->join('departemen', 'ktgr_admin.id_departemen', '=', 'departemen.id_departemen')
                ->where('departemen.departemen', '=', "Accounting")
                ->where('user_admin.email_ua', '!=', null)
                ->get();

            // ->where('tgl_aktif', '<=', NOW())
            // dd($fpJadi);

            // return view('pdf.PrintSPR', compact('fp','dtPembayaran'));

            $pdf = PDF::loadView('pdf.printSPR-ttd-non-promo', ['fp' => $fpJadi, 'dtPembayaran' => $dataPembayaran, 'promo' => $promo]);
            // $pdf = PDF::loadView('mail.index');
            $pdf->setPaper('F4', 'potrait');
            // Storage::put('public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf', $pdf->output());
            $pdf->render();
            $pdfData = $pdf->output();
            // $filename = 'public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf';
            // Storage::put($filename, $pdfData);
            // dd($filename);
            $path = './Home/pdf/';
            $pdf->save($path . 'FP-' . $fpJadi->blok . "-" . $fpJadi->nomor . '-' . $fpJadi->id_formulir . '.pdf');
            $filename = $path . 'FP-' . $fpJadi->blok . "-" . $fpJadi->nomor . '-' . $fpJadi->id_formulir . '.pdf';

            $dataEmail1 = [
                'to' => $pelanggan->email_plgn,
                "subject" => "Form Living",
                "body" => "",
                'nama' => $pelanggan->nama_plgn,
                'attachment' => $filename,
            ];
            $dataEmail2 = [
                'to' => $user->email_ua,
                "subject" => "Form Living",
                "body" => "",
                "body" => "",
                'nama' => $pelanggan->nama_plgn,
                'attachment' => $filename,
            ];
            $dataEmail3 = null;
            foreach ($accounting as $accounting) {
                $dataEmail3 = [
                    'to' => $accounting->email_ua,
                    "subject" => "Form Living",
                    "body" => "",
                    "body" => "",
                    'nama' => $pelanggan->nama_plgn,
                    'attachment' => $filename,
                ];
                try {
                    // $MailAtt = ();
                    // Mail::to($pelanggan->email_plgn)->send(new MailAttachment($dataEmail1, $template));

                    Mail::to($accounting->email_ua)->send(new MailAttachment($dataEmail3, $template));
                } catch (Exception $e) {
                    // return response()->json(['Sorry! Please try again latter']);
                }
            }

            // $template = 'mail.mailFP';
            // $template2 = 'pdf.salesFP';
            // MailNotify class that is extend from Mailable class.
            try {
                // $MailAtt = ();
                Mail::to($pelanggan->email_plgn)->send(new MailAttachment($dataEmail1, $template));

                Mail::to($user->email_ua)->send(new MailAttachment($dataEmail2, $template));
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
                'harga' => 'required',

                // 'phone' => 'required|numeric',

                // 'kelamin'   => 'required',

            ]);
            // if (!empty($promo)) {
            //     $dataInputDetail = array(
            //         'luas_tanah_kkpr' => $rumah->luas_tanah,
            //         'tipe_kkpr' => $tipeRumah->jenis_tr,
            //         'harga_awal' => $tipeRumah->harga_tr,
            //         'total_diskon' => $promo->diskon_promo,
            //         'uang_muka' => $request->harga * (10 / 100),
            //         'total_harga' => $request->harga,
            //     );
            // }
            // if (empty($promo)) {
            //     $dataInputDetail = array(
            //         'luas_tanah_kkpr' => $rumah->luas_tanah,
            //         'tipe_kkpr' => $tipeRumah->jenis_tr,
            //         'harga_awal' => $tipeRumah->harga_tr,
            //         'uang_muka' => $request->harga * (10 / 100),

            //         'total_harga' => $request->harga,
            //     );
            // }

            // DB::table('kalkulator_kpr')
            //     ->where('id_kkpr', $id_kkpr)
            //     ->update(
            //         $dataInputDetail
            //     );
            if (!empty($promo)) {
                $dataInput = array(
                    'id_pelanggan' => session::get('guest'),
                    'id_kkpr' => $id_kkpr,
                    'id_rumah' => $id_rumah,
                    'id_tipe_rumah' => $id_tipe,
                    'jenis_pembayaran_fp' => $payment,
                    'id_promo' => $promo->id_promo,
                    'promo_fp' => $promo->keterangan,

                );
            }
            if (empty($promo)) {
                $dataInput = array(
                    'id_pelanggan' => session::get('guest'),
                    'id_kkpr' => $id_kkpr,
                    'id_rumah' => $id_rumah,
                    'id_tipe_rumah' => $id_tipe,
                    'jenis_pembayaran_fp' => $payment,

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
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => "Uang Muka",
                    'harga_pr' => $kkpr->uang_muka,
                    'sisa_pr' => $kkpr->uang_muka,
                    'tgl_pr' => date("Y-m-d", strtotime("+7 days")),
                    'status_pr' => "belum",
                );

                for ($i = 1; $i < $kkpr->cicilan + 1; $i++) {

                    if (!empty($promo)) {
                        $dtPembayaran[] = array(
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => "Cicilan " . $i,
                            'harga_pr' => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100) + $kkpr->total_diskon)) / $kkpr->cicilan,
                            'sisa_pr' => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100) + $kkpr->total_diskon)) / $kkpr->cicilan,
                            'tgl_pr' => date("Y-m-d", strtotime("+1 month")),
                            'status_pr' => "belum",
                        );
                    }
                    if (empty($promo)) {
                        $dtPembayaran[] = array(
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => "Cicilan " . $i,
                            'harga_pr' => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100))) / $kkpr->cicilan,
                            'sisa_pr' => ($kkpr->total_harga - ($kkpr->total_harga * (10 / 100))) / $kkpr->cicilan,
                            'tgl_pr' => date("Y-m-d", strtotime("+1 month")),
                            'status_pr' => "belum",
                        );
                    }
                }
            }
            if ($payment == "KPR") {
                $dtPembayaran[] = array(
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => "Cicilan Uang Muka " . 1,
                    'harga_pr' => $kkpr->uang_muka / $kkpr->cicilan_um,
                    'sisa_pr' => $kkpr->uang_muka / $kkpr->cicilan_um,
                    'tgl_pr' => date("Y-m-d", strtotime("+7 days")),
                    'status_pr' => "belum",
                );
                for ($k = 1; $k < $kkpr->cicilan_um; $k++) {

                    $dtPembayaran[] = array(
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => "Cicilan Uang Muka " . 1 + $k,
                        'harga_pr' => $kkpr->uang_muka / $kkpr->cicilan_um,
                        'sisa_pr' => $kkpr->uang_muka / $kkpr->cicilan_um,
                        'tgl_pr' => date("Y-m-d", strtotime("+1 month")),
                        'status_pr' => "belum",
                    );
                }
                if (!empty($promo)) {
                    $dtPembayaran[] = array(
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => "Uang Muka",
                        'harga_pr' => $kkpr->total_harga - ($kkpr->uang_muka + $kkpr->total_diskon),
                        'sisa_pr' => $kkpr->total_harga - ($kkpr->uang_muka + $kkpr->total_diskon),
                        'tgl_pr' => date("Y-m-d", strtotime("+5 years")),
                        'status_pr' => "belum",
                    );
                }
                if (empty($promo)) {
                    $dtPembayaran[] = array(
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => "KPR",
                        'harga_pr' => $kkpr->total_harga - $kkpr->uang_muka,
                        'sisa_pr' => $kkpr->total_harga - $kkpr->uang_muka,
                        'tgl_pr' => date("Y-m-d", strtotime("+5 years")),
                        'status_pr' => "belum",
                    );
                }
            }

            $fpJadi = DB::table('formulir_pesanan')
                ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
                ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'formulir_pesanan.id_rumah')
                ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
                ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
                ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
                ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->where('id_formulir', '=', $fp)
                ->first();
            $dtPembayaran = DB::table('pembayaran_rumah')
                ->where('id_formulir', '=', $fp)
                ->get();
            $promo = "";
            if (!empty($fpJadi->id_promo)) {
                $promo = DB::table('promo')
                    ->where('id_promo', '=', $fpJadi->id_promo)
                    ->first();
            }

            // ->where('tgl_aktif', '<=', NOW())

            // return view('pdf.PrintSPR', compact('fp','dtPembayaran'));
            $pdf = PDF::loadView('pdf.PrintSPR', ['fp' => $fpJadi, 'dtPembayaran' => $dtPembayaran, 'promo' => $promo]);
            // $pdf = PDF::loadView('mail.index');
            $pdf->setPaper('F4', 'potrait');
            // Storage::put('public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf', $pdf->output());
            $pdf->render();
            $pdfData = $pdf->output();
            // $filename = 'public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf';
            // Storage::put($filename, $pdfData);
            // dd($filename);
            $path = './Home/pdf/';
            $pdf->save($path . 'FP-' . $fpJadi->blok . "-" . $fpJadi->nomor . '-' . $fpJadi->id_formulir . '.pdf');
            $filename = $path . 'FP-' . $fpJadi->blok . "-" . $fpJadi->nomor . '-' . $fpJadi->id_formulir . '.pdf';

            $dataEmail1 = [
                'to' => $pelanggan->email_plgn,
                "subject" => "Form Living",
                "body" => "",
                'nama' => $pelanggan->nama_plgn,
                'attachment' => $filename,
            ];

            $template = 'mail.mailFP';
            // $template2 = 'pdf.salesFP';
            // MailNotify class that is extend from Mailable class.
            try {
                // $MailAtt = ();
                Mail::to($pelanggan->email_plgn)->send(new MailAttachment($dataEmail1, $template));
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
            ])->first();

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
    public function email($id_formulir)
    {
        $fp = DB::table('formulir_pesanan')
            ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'formulir_pesanan.id_rumah')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->where('id_formulir', '=', $id_formulir)
            ->first();
        $dtPembayaran = DB::table('pembayaran_rumah')
            ->where('id_formulir', '=', $id_formulir)
            ->get();

        $dtPem = "";
        // for ($i = 0; $i < count($dtPembayaran); $i++) {
        //     # code...
        // }
        ob_start();
        echo "<tbody>";
        foreach ($dtPembayaran as $pem) {
            echo "<tr style='border: 1px solid; font-size:12px'>" .
                "<td style='border: 1px solid; width:70%'> " . $pem->detail_pr . " </td>" .
                "<td style='border: 1px solid;width:30%'> " . date("d M Y", strtotime($pem->tgl_pr)) . " <a href='
                https://calendar.google.com/calendar/render?action=TEMPLATE&text=Pembayaran Tagihan " . $pem->detail_pr . "&dates=" . date("Ymd", strtotime($pem->tgl_pr)) . "T193000Z/" . date("Ymd", strtotime($pem->tgl_pr)) . "T223000Z&details=Pembayaran Tagihan " . $pem->detail_pr . " sejumlah " . $this->rupiah($pem->harga_pr) . "&location=Jakarta
                ' style='border-radius:5px;
                border:1px solid #a37343;
                display:inline-block;
                cursor:pointer;
                color:#a37343;' > Simpan </a>  </td>"
                . "</tr>";
        }
        echo "</tbody>";
        $dtPem = ob_get_clean();

        $data = [
            "subject" => "Form Living",
            "body" => "Form Living",
            "dataFP" => array($fp),
            "dataPembayaran" => $dtPem,
            "hargaAwal" => $this->rupiah($fp->harga_awal),
            "promo" => "Tidak Ada Promo",
            "tgl_input" => date("d M Y", strtotime($fp->tgl_input_fp)),
        ];
        // echo $dtPem;
        // die();
        // dd($data);
        // die();
        // view()->share('data',$data);
        $pdf = PDF::loadView('pdf.printFP', ['fp' => $fp, 'dtPembayaran' => $dtPembayaran]);
        // $pdf = PDF::loadView('mail.index');
        $pdf->setPaper('F4', 'potrait');
        // Storage::put('public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf', $pdf->output());
        $pdf->render();
        $pdfData = $pdf->output();
        // $filename = 'public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf';
        // Storage::put($filename, $pdfData);
        // dd($filename);
        $path = 'Home/pdf/';
        $pdf->save($path . 'FP-' . $fp->blok . "-" . $fp->nomor . '-' . $fp->id_formulir . '.pdf');
        // $pdf->download('FP-'.$fp->blok."-".$fp->nomor.'.pdf');
        // // set_time_limit(300);
        // dd($dtPembayaran);
        // die();
        // return view('mail.index', compact('data'));
    }
    public function printFP($id_formulir)
    {
        $fp = DB::table('formulir_pesanan')
            ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->where('id_formulir', '=', $id_formulir)
            ->first();
        $dtPembayaran = DB::table('pembayaran_rumah')
            ->where('id_formulir', '=', $id_formulir)
            ->get();
        if (!empty($fp->id_promo)) {
            $promo = DB::table('promo')
                ->where('id_promo', '=', $fp->id_promo)
                // ->where('tgl_aktif', '<=', NOW())

                ->first();
        } else {
            $promo = "";
        }
        // dd($fp);

        // return view('pdf.PrintSPR', compact('fp','dtPembayaran'));
        $pdf = PDF::loadView('pdf.printSPR-ttd-non-promo', ['fp' => $fp, 'dtPembayaran' => $dtPembayaran, 'promo' => $promo]);
        $pdf->setPaper('F4', 'potrait');
        return $pdf->download('SPR-' . $fp->blok . "-" . $fp->nomor . '.pdf');
    }

    public function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.') . ',-';
        return $hasil_rupiah;
    }
}