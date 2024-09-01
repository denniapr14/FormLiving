<?php

namespace App\Http\Controllers;

// use App\Models\FormulirPesanan;

// use Spatie\PdfToText\Pdf;
//
// Model
use App\Models\Projek;
use App\Models\Rumah;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserProjek;
use App\Models\FormulirPesanan;
use App\Models\UserPelanggan;
use App\Models\PelangganProjek;
use App\Models\PembayaranRumah;

// =======================
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class C_Profile extends Controller
{

    public $rumah;
    public $formulirPesanan;
    public $userAdmin;
    public $userProject;
    public $projek;
    public $userMenu;
    public $userPelanggan;
    public $pelangganProjek;
    public $pembayaranRumah;
    public function __construct()
    {
        $this->rumah = new Rumah;
        $this->formulirPesanan = new FormulirPesanan;
        $this->userAdmin = new UserAdmin;
        $this->userProject = new UserProjek;
        $this->projek = new Projek;
        $this->userMenu = new UserMenu;
        $this->userPelanggan = new UserPelanggan;
        $this->pelangganProjek = new PelangganProjek;
        $this->pembayaranRumah = new PembayaranRumah;
    }

    public function ChangePasswordUserPelanggan($projek){
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere('id_pelanggan', '=', session::get('guest'));
            $getPelangganProjek = $this->pelangganProjek->getProjectPelangganWhere('user_pelanggan.id_pelanggan', '=', $userPelanggan->id_pelanggan);
            $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);


            return view('V_Guest.changePassword',
                compact(
                    'userPelanggan',
                    'getProjek',
                    'getPelangganProjek',




                )
            );
        }
        // CHECK AS GUEST


        return redirect('/login');
    }
    public function ChangePasswordUserPelangganAction(Request $request, $projek)
    {
        // $decryptedID = Crypt::decrypt($id);
        // dd($request->all()); // Correct usage of $request object

        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere('id_pelanggan', '=', session::get('guest'));
            $getPelangganProjek = $this->pelangganProjek->getProjectPelangganWhere('user_pelanggan.id_pelanggan', '=', $userPelanggan->id_pelanggan);
            $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

            $checkPassword = $this->userPelanggan->firstUserPelangganWhereArr('*', [
                'id_pelanggan' => session::get('guest'),
                'password_plgn' => md5($request->currentPassword),
            ]);
            // dd($checkPassword);
            if ($checkPassword != null) {
                DB::table('user_pelanggan')
                ->where('id_pelanggan', session::get('guest'))
                ->update([
                    'password_plgn' => md5($request->newPassword),
                ]);

            }
            return redirect()->back()->with('success','Kata kunci berhasil diubah');

            // return view('V_Guest.dashboard',
            //     compact(
            //         'userPelanggan',
            //         'getProjek',
            //         'getPelangganProjek',
            //     )
            // );
        }
        // CHECK AS GUEST

        return redirect('/login');
    }
    public function editUserPelanggan($projek){
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere('id_pelanggan', '=', session::get('guest'));
            $getPelangganProjek = $this->pelangganProjek->getProjectPelangganWhere('user_pelanggan.id_pelanggan', '=', $userPelanggan->id_pelanggan);
            $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);


            return view('V_Guest.editProfile',
                compact(
                    'userPelanggan',
                    'getProjek',
                    'getPelangganProjek',



                )
            );
        }
        // CHECK AS GUEST


        return redirect('/login');
    }
    public function editUserPelangganAction(Request $request, $projek){
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere('id_pelanggan', '=', session::get('guest'));
            $getPelangganProjek = $this->pelangganProjek->getProjectPelangganWhere('user_pelanggan.id_pelanggan', '=', $userPelanggan->id_pelanggan);
            $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

            $dataPelanggan= [
                'nama_plgn' => $request->nama_plgn,
                'email_plgn' => $request->email_plgn,
                'no_telp_plgn' => $request->no_hp_plgn,
                'alamat_plgn' => $request->alamat_plgn,
                'no_wa_plgn' => $request->no_wa_plgn,
                'id_ig_plgn' => $request->id_ig_plgn,
                'pekerjaan_plgn' => $request->pekerjaan_plgn,
                'tempat_lahir_plgn' => $request->tempat_lahir_plgn,
                'tgl_lahir_plgn' => $request->tgl_lahir_plgn,
                'jenis_kelamin_status' => $request->jenis_kelamin_status,
                'pekerjaan_plgn' => $request->pekerjaan_plgn,
                'status_pernikahan_plgn' => $request->status_pernikahan_plgn,
                'npwp_plgn' => $request->npwp_plgn,
                'sumber_dana_plgn' => $request->sumber_dana_plgn,

            ];

            DB::table('user_pelanggan')
            ->where('id_pelanggan', session::get('guest'))
            ->update($dataPelanggan);
            return redirect()->back()->with('success','Data pribadi berhasil diubah.');
            // return view('V_Guest.dashboard',
            //     compact(
            //         'userPelanggan',
            //         'getProjek',
            //         'getPelangganProjek',
            //         'getBillMonthNow',
            //         'getBillNextMonth'


            //     )
            // );
        }
        // CHECK AS GUEST


        return redirect('/login');
    }
}
