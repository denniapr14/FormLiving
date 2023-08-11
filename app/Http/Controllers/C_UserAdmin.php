<?php

namespace App\Http\Controllers;

use App\Models\UserAdmin;
use App\Models\UserProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class C_UserAdmin extends Controller
{
    public $userAdmin;
    public $userProjek;

    public function __construct() {
        $this->userAdmin = new UserAdmin;
        $this->userProjek  = new UserProjek;
    }
    function userAdminSalesAgent() {

        $whereUserAdmin = [
           'Agent','SalesAgent','AgentCompany','AdminAgentCompany'
        ];
        $getUserSales = $this->userAdmin->getUserAdminWhereIn('*', 'ktgr_admin.kategori',$whereUserAdmin);
        // dd($getUserSales);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
//   dd($user);
            return view('V_Admin.userListSalesAgent',
                compact(
                    'user',
                    'projekUser',
                    'getUserSales'
                )
            );
        } else {
            return redirect('/login');
        }

    }

    function UserAdminAll() {

    }
    function updateUserProfile() {
        $getUser = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
//   dd($user);
            return view('V_Admin.editUserProfile',
                compact(
                    'user',
                    'projekUser',
                    'getUser'

                )
            );
        } else {
            return redirect('/login');
        }
    }
    function updateUserProfileAction(Request $request,$id) {

        $decryptedID = Crypt::decrypt($id);
        $getUser = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
//   dd($user);

            $filename = $getUser->foto_ua;
            if ($request->file('image') ) {
                $img = $request->file('image');

            // Generate a unique filename based on the current timestamp and the original file extension
            $filename = $request->username.'-'.time().'.'.$img->getClientOriginalExtension();

            // Store the image in the 'images' folder under the 'public' disk
            $path = 'Home/images/foto/';
            $img = Image::make($img);
            $img->save(public_path($path.$filename));
            }



            $dataUserAdmin = [

                'nama_ua'           => $request->nama,
                'email_ua'          => $request->email,
                'no_tlp_ua'         => $request->no_telp,
                'alamat_ua'         => $request->alamat,
                'tempat_lahir_ua'   => $request->tempat_lahir,
                'tgl_lahir_ua'      => $request->tgl_lahir,
                'foto_ua'           => $filename
            ];
            // dd($dataUserAdmin);
            DB::table('user_admin')
            ->where('id_user_admin', $decryptedID)
            ->update(
                $dataUserAdmin
            );

            return redirect()->back()->with('success','Data profile berhasil diubah');


        } else {
            return redirect('/login');
        }
    }
    //
}