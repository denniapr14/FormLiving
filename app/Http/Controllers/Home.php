<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

// Model
use App\Models\UserAdmin;
use App\Models\UserPelanggan;
// =======================

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Hash;


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
        return view('home');
    }

    public function housing()
    {
        return view('housing');
    }

// ===========================================================

// LOGIN
    public function Login()
    {
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

                return redirect('/');

                // return "Daaaaa";
                // return redirect()->intended('dashboard')
                //             ->withSuccess('Signed in');
            }
        }
        if (!empty($userPelanggan)) {
            if (Auth::guard('guest')->attempt(['username_plgn' => $request->username, 'password' => md5($request->password)], $request->get('remember'))) {

                return redirect('/housing');

                // return "Daaaaa";
                // return redirect()->intended('dashboard')
                //             ->withSuccess('Signed in');
            }
        }
        // return "salah";


        return redirect("login")->withSuccess('Login details are not valid');



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
        return view('cluster');
        # code...
    }
    public function DetailCluster()
    {
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
        return view('profileSetting');
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


// ===================== End Profile ============================


// =======================- SIMULATION -======================

    public function SimCluster()
    {
        return view('simCluster');
        # code...
    }

    public function SimSelectUnit()
    {
        return view('simSelectUnit');
        # code...
    }

    public function SimType()
    {
        return view('simType');
        # code...
    }

    public function SimModif()
    {
        return view('simModification');
        # code...
    }

    public function SimPayment()
    {
        return view('simPayment');
        # code...
    }

    public function SimPrice()
    {
        return view('simPrice');
        # code...
    }

    public function SimOrder()
    {
        return view('simOrder');
        # code...
    }

    public function SimSummary()
    {
        return view('simSummary');
        # code...
    }
    public function Congratulation()
    {
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