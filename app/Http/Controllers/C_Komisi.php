<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Clusters;

use App\Models\FormulirPesanan;
use App\Models\PembayaranRumah;
use App\Models\Projek;
use App\Models\Promo;
use App\Models\Rumah;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;

class C_Komisi extends Controller
{
    public $cluster;
    public $rumah;
    public $userAdmin;
    public $userNotif;
    public $userProjek;
    public $formulirPesanan;
    public $promo;
    public $pembayaranRumah;
    public $projek;
    public $userMenu;

    public function __construct()
    {
        $this->cluster = new Clusters();
        $this->rumah = new Rumah();
        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->formulirPesanan = new FormulirPesanan();
        $this->promo = new Promo();
        $this->pembayaranRumah = new PembayaranRumah();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
    }

    function Komisi($projek)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        //

        $getKomisi = DB::table('komisi')
            ->select('*')
            ->join('formulir_pesanan', 'komisi.id_formulir', '=', 'formulir_pesanan.id_formulir')
            ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->join('user_admin', 'komisi.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('user_pelanggan','formulir_pesanan.id_pelanggan','=','user_pelanggan.id_pelanggan')
            // ->where('id_projek', $getProjek->id_projek)
            ->get();
        // dd($getKomisi);
        // $getDataPembayaran = DB::table('pembayaran_rumah')
        //     ->select( '*')
        //     ->join('rumah', 'pembayaran_rumah.id_rumah', '=', 'rumah.id_rumah')
        //     // ->where('pembayaran_rumah.id_rumah', $getProjek->id_projek)
        //     ->groupBy('pembayaran_rumah.id_rumah')
        //     ->get();
        // $getDataPembayaran = DB::table('pembayaran_rumah')
        //     ->select(DB::raw('*, SUM(harga_pr) as total_harga_pr'))
        //     ->join('rumah', 'pembayaran_rumah.id_rumah', '=', 'rumah.id_rumah')
        //     ->groupBy('pembayaran_rumah.id_rumah')
        //     ->get();


        $getDataPembayaranPersentase = DB::table('pembayaran_rumah')
            ->select(DB::raw('*, SUM(harga_pr) as total_harga_pr, SUM(sisa_pr) as total_sisa_pr'))
            ->join('rumah', 'pembayaran_rumah.id_rumah', '=', 'rumah.id_rumah')

            ->groupBy('pembayaran_rumah.id_rumah')
            ->get();

        // $getDataPembayaranPersentase = $getDataPembayaran->map(function ($item) {
        //     $item->persentase = ($item->total_harga_pr / $item->harga_tr) * 100;
        //     return $item;
        // });



        // $persentase = $getDataPembayaran->total_harga_rumah / $getDataPembayaran->harga_tr * 100;
        // dd($getDataPembayaranPersentase);
        // dd($getDataPembayaran);

        // $getKomisi ="";

        // dd($getChecklist);
        // $getJob = $getJob->where('id_projek',$getProjek->id_projek)->groupBy('termin_job')->sortBy('termin_job');
        // dd($getJob);
        if (session()->has('user')) {

            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
                'user_menu.status_um' => 'aktif',
                'user_menu.id_kategori' => $user->id_kategori
            ])->collect();
            // dd($getUserMenu);
            $foundMatchingMenu = false;

            $getChecklist = "";


            foreach ($getUserMenu as $menu) {
                if ($menu->url_menu == request()->segment(1)) {
                    $foundMatchingMenu = true;
                    break;
                }
            }
            if (!$foundMatchingMenu) {
                return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            }


            return view(
                'V_Admin.komisi',
                compact(
                    'user',
                    'projekUser',
                    'getProjek',
                    'getUserMenu',
                    'getKomisi',
                    'getDataPembayaranPersentase',
                    'getKomisi'

                )
            );
        } else {
            return redirect('/login');
        }
    }


        public function addKomisiAction($projek, $idFormulir, Request $request)
        {

            $getFP = $this->formulirPesanan->getFormulirPesananJoin7Where($idFormulir);
            $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

            // dd($getFP);
            $komisiRumah = $getFP->harga_awal * 0.01;
            $data = [
                'id_user_admin' => $getFP->id_user_admin,
                'id_formulir' => $idFormulir,
                'harga_rumah_komisi' => $getFP->harga_awal,
                'komisi_rumah' => $komisiRumah,

                'komisi1' => $request->komisi1,
                'komisi2' => $request->komisi2,
                'komisi3' => $request->komisi3,
                'total_komisi1' => $komisiRumah * 0.35,
                'total_komisi2' => $komisiRumah * 0.30,
                'total_komisi3' => $komisiRumah * 0.30,
                'tgl_input' => Carbon::now()
            ];

            DB::table('komisi')->insert($data);



            return redirect()->back()->with('success', 'Komisi berhasil ditambahkan');
        }
        public function editKomisiAction($projek, $id_komisi, Request $request)
        {


            $decryptedIdKomisi = Crypt::decrypt($id_komisi);
            $getKomisi = DB::table('komisi')->where('id_komisi', $decryptedIdKomisi)->first();

            $data = [
                'komisi1' => $request->komisi1,
                'komisi2' => $request->komisi2,
                'komisi3' => $request->komisi3,
            ];

            DB::table('komisi')->where('id_komisi', $decryptedIdKomisi)->update($data);



            return redirect()->back()->with('success', 'Komisi berhasil diubah');
        }

}
