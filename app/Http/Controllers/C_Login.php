<?php

namespace App\Http\Controllers;

use App\Models\UserAdmin;
// Controller
// =======================
use App\Models\UserProjek;
use App\Models\PelangganProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class C_Login extends Controller
{
    public $userAdmin;
    public $userProjek;
    public $pelangganProjek;
    public function __construct()
    {
        $this->userAdmin = new UserAdmin();
        $this->userProjek = new UserProjek();
        $this->pelangganProjek = new PelangganProjek();
    }
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
                $getProjekUser = $this->userProjek->firstProjectUserWhere(['user_admin.id_user_admin' => $user->id_user_admin]);

                // dd($getProjekUser);
                if (empty($getProjekUser) || $getProjekUser == null) {
                    return back()->with('error', 'Harap hubungi pihak admin projek anda belum ditambahkan ');
                    # code...
                }

                Session::push('selectedProjeks', $getProjekUser->nama_projek);
                $userRole = $this->Role(Session::get('user'));



                switch ($userRole) {
                    case 'AdminAccounting':
                        return redirect('/dashboard-admin/Greenland')->with('success', 'Anda berhasil masuk!');
                        break;
                    case 'Admin':
                        return redirect('/')->with('success', 'Anda berhasil masuk!');
                        break;

                    case 'CEO':
                        return redirect('/')->with('success', 'Anda berhasil masuk!');
                        break;
                    case 'AdminFormsLiving':
                        return redirect('/dashboard-admin/Greenland')->with('success', 'Anda berhasil masuk!');
                        break;
                    case 'SuperAdmin':
                        return redirect('/dashboard-admin/Greenland')->with('success', 'Anda berhasil masuk!');
                        break;

                    default:
                        return redirect('/')->with('success', 'Anda berhasil masuk!');
                        break;
                }
            }
        }

        if (!empty($userPelanggan)) {
            if (Auth::guard('guest')->attempt(['username_plgn' => $request->username, 'password' => md5($request->password)], $request->get('remember'))) {
                Session::put('guest', $userPelanggan->id_pelanggan);


                $getPelangganProjek = $this->pelangganProjek->firstProjectPelangganWhere(['user_pelanggan.id_pelanggan'=>$userPelanggan->id_pelanggan]);

                if ($getPelangganProjek == null) {
                    // Get the project and house ID from the order form
                    $formulirPesanan = DB::table('formulir_pesanan')
                        ->where('id_pelanggan', $userPelanggan->id_pelanggan)
                        ->first();

                    if ($formulirPesanan) {
                        $idRumah = $formulirPesanan->id_rumah;
                        $idProjek = DB::table('rumah')
                            ->where('id_rumah', $idRumah)
                            ->value('id_projek');

                        // Insert new pelanggan projek
                        DB::table('pelanggan_projek')->insert([
                            'id_pelanggan' => $userPelanggan->id_pelanggan,
                            'id_projek' => $idProjek,
                        ]);

                        $getPelangganProjek = DB::table('pelanggan_projek')
                            ->where('id_pelanggan', $userPelanggan->id_pelanggan)
                            ->first();
                    }
                }
                Session::push('selectedProjeks', $getPelangganProjek->nama_projek);
                // dd($getPelangganProjek);
                return redirect('/dashboard-guest/'.$getPelangganProjek->nama_projek)->with('success','')
                    ->with('success', 'Anda berhasil masuk!');
            }
        }

        return redirect('login')->with('error', 'Login details are not valid');
    }

    public function redirectLogin(Request $request){
        //dd($request->all());
        // Attempt to log in using the LoginAction function
        $loginSuccess = $this->LoginAction($request);
        if ($loginSuccess) {
            // Get the redirect URL from the request
            $redirectUrl = $request->input('link-direct');

            // If a redirect URL is provided, redirect to it
            if ($redirectUrl) {
                return redirect($redirectUrl)->with('success', "Berhasil Masuk");
            }


            // If no redirect URL is provided, use role-based redirection

                    // dd($getProjekUser);
                    $userRole = $this->Role(Session::get('user'));

            switch ($userRole) {
                case 'AdminAccounting':
                case 'Admin':
                    return redirect('/dashboard-admin/Greenland')->with('success', "You're signed in!");
                case 'CEO':
                    return redirect('/dashboard-admin/Greenland')->with('success', "You're signed in!");
                case 'SuperAdmin':
                    return redirect('/dashboard-admin/Greenland')->with('success', "You're signed in!");
                case 'AdminFormsLiving':
                    return redirect('/dashboard-admin/Greenland')->with('success', "You're signed in!");
                default:
                    return redirect('/')->with('success', "You're signed in!");
            }
        }

        if (!empty($userPelanggan)) {
                if (Auth::guard('guest')->attempt(['username_plgn' => $request->username, 'password' => md5($request->password)], $request->get('remember'))) {
                    Session::put('guest', $userPelanggan->id_pelanggan);

                    return redirect('/Greenland')

                        ->with('success', 'Anda berhasil masuk!');
                }
            }

        // If login fails, redirect back with an error
        return redirect()->back()->withErrors(['login' => 'Username atau Password Salah, silahkan coba lagi']);
    }

    public function Role($idUser)
    {
        $user = DB::table('user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

            ->where('user_admin.id_user_admin', '=', $idUser)

            ->first();

        // dd($user->kategori);
        // die();
        if(!empty($user)){
            return $user->kategori;
        }

    }

    public function emailForgot()
    {
        return view('mail.mailForgot');
    }

    public function emailForgotAction(Request $request)
    {
        $dataEmail = UserAdmin::where('email_ua', '=', $request->email_ua)->exists();
        $dataEmailList = UserAdmin::where('email_ua', '=', $request->email_ua)->first();
        $template = 'mail.mailForgot';
        $request->validate([
            'email_ua' => ['required', 'email'],
        ], [
            'email_ua.required' => 'Email Perlu Diisi',
        ]);

        if (!$dataEmail) {
            Session::flash('error_message', 'Email belum terdaftar. Silahkan registrasi terlebih dahulu.');

            return redirect()->back();
        } else {
            \Mail::to($dataEmail->email_plgn)->send(new MailNotify($dataEmailList, $template));
        }

        return redirect('/login')->with('success-forgot', 'reset password link telah dikirim ke email Anda');
    }

    // page forgot password
    public function forgotPassword($email)
    {
        // if(!session()->has('guest') || session()->has('user')){
        //     Session::flush('guest');
        //     Session::flush('user');
        // }
        $user = DB::table('user_admin')
            ->where('user_admin.email_ua', '=', $email)
            ->first();

        // dd($user);
        return view('forgotPassword', compact('user'));
    }

    // aksi dari forgot password
    public function forgotAction(request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
            // Add more validation rules as needed
        ]);

        if ($validator->fails()) {
            $customMessages = [
                'required' => ':attribute Masih Kosong',
                'min' => ' :attribute kurang dari 6',
                'confirmed' => ' :attribute tidak sama dengan konfirmasi password',
            ];
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function checkUsernameAvailability(Request $request)
    {
        $username = $request->input('username');
        $user = $this->userAdmin->getUserKategoriWhere(
            'user_admin.username_ua',
            '=',
            $username
        );



        return response()->json($user);
    }

    public function checkEmailAvailability(Request $request)
    {
        $email = $request->input('email');
        $user = $this->userAdmin->getUserKategoriWhere(
            'user_admin.email_ua',
            '=',
            $email
        );

        return response()->json($user);
    }

    public function Logout()
    {
        Session::flush('guest');
        Session::flush('user');

        return redirect('/')->with('success', "You're sign out!");
    }

    public function SignUp()
    {
        return view('signUp');
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
            'nama' => 'required|min:3',
            'username' => 'required|min:5|max:20',
            'email' => 'required',
            'phone' => 'required|numeric',
            'kelamin' => 'required',
            'password' => 'required|min:6',
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
            return redirect('/sign-up')->with('error', 'Username Sudah Dipakai');
        }
        if (!empty($userEmail) && !empty($userUAEmail)) {
            return redirect('/sign-up')->with('error', 'Email sudah terpakai');
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

            DB::table('user_pelanggan')->insert(
                $dataInput
            );
        }
        if ($request->userTipe == "agentWithCompany") {
            $dataInput = array(
                'id_kategori' => 24,
                'code_id_ua' => "XMP" . date("dmy", strtotime($request->tanggalLahir)) . "AGC",
                'username_ua' => $request->username,
                'nama_ua' => $request->nama,
                'tgl_lahir_ua' => $request->tahun . '-' . $request->bulan . '-' . $request->tanggal,
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


            $dataUserProjek =  [
                'id_projek'    => 1,
                'id_user_admin' => $getIDUser
            ];


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
                'tgl_lahir_ua' => $request->tahun . '-' . $request->bulan . '-' . $request->tanggal,
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


            $dataUserProjek =  [
                'id_projek'    => 1,
                'id_user_admin' => $getIDUser
            ];


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
                'tgl_lahir_ua' => $request->tahun . '-' . $request->bulan . '-' . $request->tanggal,
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

            $dataUserProjek =  [
                'id_projek'    => 1,
                'id_user_admin' => $getIDUser
            ];

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
        return redirect('/login')->with('success', 'Your Account ' . $request->username . ' has been created');
        // return view('signUp');
        # code...
    }
}
