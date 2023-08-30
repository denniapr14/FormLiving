<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserPelanggan;
use App\Models\UserProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class C_UserPelanggan extends Controller
{
    public $userAdmin;
    public $userNotif;
    public $userProjek;

    public $userPelanggan;
    public $projek;
    public $userMenu;

    public function __construct()
    {
        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->userPelanggan = new UserPelanggan();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
    }

    public function userPelanggan()
    {
        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => Session::get('user'),
        ])->collect();

        $foundMatchingMenu = false;

        foreach ($getUserMenu as $menu) {
            if ($menu->url_menu == request()->segment(1)) {
                $foundMatchingMenu = true;
                break;
            }
        }



        // dd($getUserPelanggan);
        // Surat Pemesanan Rumah == Formulir Pesanan

        // $getRumah = $this->rumah->getRumahSelectCountGroupBy();
        // dd($getRumah);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            $getUserPelanggan = $this->userPelanggan->getUserPelangganOrderByJoinUserAdmin('*', 'tgl_input_plgn', 'desc')->collect();

            if(
                $user->kategori == 'AdminAgentCompany'

            ){
                $getUserPelanggan = $getUserPelanggan->where('id_kepala_ua', $user->id_user_admin);

            }

            if (
                $user->kategori == 'Sales' ||
                $user->kategori == 'SalesAgent' ||
                $user->kategori == 'Agent' ||
                $user->kategori == 'AgentCompany'
            ) {
                # code...
                $getUserPelanggan = $getUserPelanggan->where('id_user_admin', $user->id_user_admin);
            }

            return view(
                'V_Admin.userPelanggan',
                compact(
                    'user',
                    'projekUser',

                    'getUserMenu',
                    'getUserPelanggan'
                )
            );
        } else {
            return redirect('/login');
        }
    }
    function updateUserPelangganAction(Request $request, $id)
    {

        $decryptedID = Crypt::decrypt($id);

        $dataUpdate = array(
            'nama_plgn' => $request->nama,
            'id_user_admin' => session::get('user'),
            'pekerjaan_plgn' => $request->pekerjaan,

            'no_ktp_plgn' => $request->nik,
            'no_telp_plgn' => $request->telp,
            'no_wa_plgn' => $request->wa,
            'alamat_plgn' => $request->alamat,
            'email_plgn' => $request->email,
            'npwp_plgn' => $request->npwp,
            'jenis_kelamin_status' => $request->gender,
            'status_pernikahan_plgn' => $request->statusPernikahan,
            'tempat_lahir_plgn'         => $request->tempatLahir,
            'tgl_lahir_plgn'            => $request->tglLahir,
            'sumber_dana_plgn'               => $request->sumberDana
            // 'id_kkpr'               => $kkpr->id_kkpr,

        );


        DB::table('user_pelanggan')
            ->where('id_pelanggan', $decryptedID)
            ->update($dataUpdate);

        return redirect()->back()->with('success', 'Data pelanggan telah diubah');
    }
}