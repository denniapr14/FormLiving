<?php

namespace App\Http\Controllers;

use App\Models\PembayaranRumah;
use App\Models\Projek;
use App\Models\RincianPembayaran;
use App\Models\Rumah;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class C_PembayaranRumah extends Controller
{
    public $pembayaranRumah;
    public $userAdmin;
    public $userProjek;
    public $projek;
    public $rincianPembayaran;
    public $rumah;
    public $userMenu;

    public function __construct()
    {
        $this->rumah = new Rumah();
        $this->pembayaranRumah = new PembayaranRumah();
        $this->userAdmin = new UserAdmin();
        $this->userProjek = new UserProjek();
        $this->projek = new Projek();
        $this->rincianPembayaran = new RincianPembayaran();
        $this->userMenu = new UserMenu();
    }

    public function pembayaranRumah($projek, $id)
    {


        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $decryptedID = Crypt::decrypt($id);
        $getPembayaranRumah = $this->pembayaranRumah->firstPembayaranRumahWhere('*', 'id_pem_rumah', '=', $decryptedID);
        $getRumah = $this->rumah->getRumahWhere('id_rumah', '=', $getPembayaranRumah->id_rumah);
        $getRincianPembayaran = $this->pembayaranRumah->getPembayaranRumahRincianJoinWhereAll('*', 'pembayaran_rumah.id_pem_rumah', '=', $decryptedID);
        // dd($getPembayaranRumah);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
                'user_menu.status_um' => 'aktif',
                'user_menu.id_kategori' => $user->id_kategori
            ])->collect();
            // dd($getUserMenu);
            $foundMatchingMenu = false;


            foreach ($getUserMenu as $menu) {
                if ($menu->url_menu == request()->segment(1)) {
                    $foundMatchingMenu = true;
                    break;
                }
            }

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }
            return view('V_Admin.pembayaranRumah', compact(
                'user',
                'projekUser',
                'getPembayaranRumah',
                'getProjek',
                'getRincianPembayaran',
                'getRumah',
                'getUserMenu'

            ));
        } else {
            return redirect('/login');
        }
    }

    public function pembayaranRumahAction(Request $request, $projek, $id)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $decryptedID = Crypt::decrypt($id);
        $getPembayaranRumah = $this->pembayaranRumah->firstPembayaranRumahWhere('*', 'id_pem_rumah', '=', $decryptedID);
        $getRumah = $this->rumah->getRumahWhere('id_rumah', '=', $getPembayaranRumah->id_rumah);
        // dd($getPembayaranRumah);

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            // $filename = $getRumah->img_rumah;
            if ($request->file('image')) {
                $img = $request->file('image');

                // Generate a unique filename based on the current timestamp and the original file extension
                $filename = $getRumah->blok.'-'.$getRumah->nomor.'-pembayaran-'.time().'.'.$img->getClientOriginalExtension();

                // Store the image in the 'images' folder under the 'public' disk
                $path = 'Home/images/pembayaran/';
                $img = Image::make($img);
                $img->save(public_path($path.$filename));
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.'/'.$filename);
            }
            $getSisa = $getPembayaranRumah->sisa_pr - $request->harga;
            $statusSisa = 'kurang';
            if ($getSisa == 0 || $getSisa <= 0) {
                $statusSisa = 'sudah';
            }
            $dataPembayaran = [
                'sisa_pr' => $getPembayaranRumah->sisa_pr - $request->harga,
                'status_pr' => $statusSisa,
            ];

            $dataRincianPembayaran = [
                'id_pem_rumah' => $getPembayaranRumah->id_pem_rumah,
                'nominal_rp' => $request->harga,
                'sisa_rp' => $getPembayaranRumah->sisa_pr - $request->harga,
                'keterangan_rp' => $request->detail,
                'bukti_rp' => $filename,
                'tgl_bayar_rp' => $request->tanggal,
                'status_rp' => $statusSisa,
            ];

            // echo "<pre>";
            // print_r ($dataPembayaran);
            // echo "</pre>";
            // dd($dataRincianPembayaran);

            DB::table('pembayaran_rumah')
            ->where('id_pem_rumah', $getPembayaranRumah->id_pem_rumah)
            ->update(
                $dataPembayaran
            );

            $this->rincianPembayaran->insertRincianPembayaran($dataRincianPembayaran);

            return redirect()->route('editSuratPemesananRumah.admin', ['projek' => $getProjek->nama_projek, 'id' => Crypt::encrypt($getPembayaranRumah->id_formulir)])->with('success', 'Pembayaran Rumah '.$getRumah->blok.'-'.$getRumah->nomor.' berhasil di simpan');
        } else {
            return redirect('/login');
        }
    }

    public function updatePembayaranRumah($projek, $id)
    {

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $decryptedID = Crypt::decrypt($id);
        $getPembayaranRumah = $this->pembayaranRumah->firstPembayaranRumahWhere('*', 'id_pem_rumah', '=', $decryptedID);
        // dd($getPembayaranRumah);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
                'user_menu.status_um' => 'aktif',
                'user_menu.id_kategori' => $user->id_kategori
            ])->collect();
            // dd($getUserMenu);
            $foundMatchingMenu = false;


            foreach ($getUserMenu as $menu) {
                if ($menu->url_menu == request()->segment(1)) {
                    $foundMatchingMenu = true;
                    break;
                }
            }

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }
            return view('V_Admin.editPembayaranRumah', compact(
                'user',
                'projekUser',
                'getPembayaranRumah',
                'getProjek',
                'getUserMenu'

            ));
        } else {
            return redirect('/login');
        }
    }

    public function updatePembayaranRumahAction(Request $request, $projek, $id)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $decryptedID = Crypt::decrypt($id);

        $dtPembayaran = DB::table('pembayaran_rumah')
            ->where('id_pem_rumah', '=', $decryptedID)
            ->first();

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            $dataUpdate = [
                'detail_pr' => $request->detail,
                'harga_pr' => $request->harga,
                'sisa_pr' => $request->sisa,
                'status_pr' => $request->status,
                'tgl_pr' => $request->tanggal,
            ];

            // dd($dataUpdate);
            // die();

            DB::table('pembayaran_rumah')
                ->where('id_pem_rumah', $decryptedID)
                ->update(
                    $dataUpdate
                );

            return redirect('/ubah-surat-pemesanan-rumah/'.$getProjek->nama_projek.'/'.
            Crypt::encrypt($dtPembayaran->id_formulir)
            )->with('success', 'Jumlah pembayaran rumah telah terupdate');
        } else {
            return redirect('/login');
        }
    }
}
