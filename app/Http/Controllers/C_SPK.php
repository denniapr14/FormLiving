<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use App\Models\Rumah;
use App\Models\SPP;
use App\Models\SPK;
use App\Models\Image_SPK;
use App\Models\CicilanSPK;
use App\Models\Subkon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class C_SPK extends Controller
{
    //

    public $userAdmin;
    public $userNotif;
    public $userProjek;
    public $projek;
    public $userMenu;
    public $rumah;
    public $spp;
    public $spk;
    public $img_spk;
    public $cicilanspk;
    public $subkon;
    public function __construct()
    {

        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
        $this->rumah = new Rumah();
        $this->spp = new SPP();
        $this->spk =  new SPK();
        $this->img_spk = new Image_SPK();
        $this->cicilanspk = new CicilanSPK();
        $this->subkon = new Subkon();
    }
    public function getSPK($projek)
    {


        $getSPP = $this->spp->getSPPJoinRumahFormulirPelangganOrder(
            [
                'projek.nama_projek' => $projek,
                'stats_spk' => "spk"
            ],
            'spp.tgl_input_spp',
            'desc'
        );
        // dd($getSPP);
        $getSPK = $this->spk->getSPKOrder('tgl_input_spk', 'desc');

        $getTambahanSPK = $this->spk->getSPKWhereJoinRumahPelanggan(['spk.tambah_bangunan_spk' => "Ada"]);
        // dd($getTambahanSPK);
        $getCicilanSPK = $this->cicilanspk->getCicilanSPK();
        // dd($getCicilanSPK);
        $getRumah = $this->rumah->getRumahSelectCountGroupByWhereAll('projek.nama_projek', '=', $projek)->collect();
        $getRumah = $getRumah->where('status', 'Sold');
        $getImageSPK = $this->img_spk->getImageSPK(['status_ipk' => 'Aktif']);
        // dd($getRumah);

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

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

            if (!$foundMatchingMenu) {
                return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            }

            return view(
                'V_Admin.spk',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                    'getProjek',
                    'getUserMenu',
                    'getSPP',
                    'getSPK',
                    'getImageSPK',
                    'getTambahanSPK',
                    'getCicilanSPK'

                )
            );
        } else {
            return redirect('/login');
        }
    }
    public function addSPK($projek, $id_spp)
    {

        $decryptedID = Crypt::decrypt($id_spp);

        $getSPPAdd = $this->spp->firstSPP(['id_spp' => $decryptedID]);
        // dd($getSPP);
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getSPP = $this->spp->getSPPJoinRumahFormulirPelangganOrder(
            [
                'projek.nama_projek' => $projek,
                'stats_spk' => "spk"
            ],
            'spp.tgl_input_spp',
            'desc'
        );
        $getRumah = $this->rumah->getRumahSelectJoinClusterProjek('*', [
            'rumah.id_projek' => $getProjek->id_projek,
            'rumah.status' => "Sold"
        ]);
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

            return view(
                'V_Admin.addSPK',
                compact(
                    'user',
                    'projekUser',
                    'getProjek',
                    'getUserMenu',
                    'getSPP',
                    'getRumah',
                    'getSPP',
                    'getSPPAdd'

                )
            );
        } else {
            return redirect('/login');
        }
    }
    public function addSPKAction(Request $request, $projek, $id_spp)
    {
        $decryptedID = Crypt::decrypt($id_spp);

        $getSPPAdd = $this->spp->firstSPPjoinRumahFormulirWhere(['id_spp' => $decryptedID]);
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
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
            $filenameSPK = "";
            if (!empty($request->file('file_spk'))) {
                $file_spk = $request->file('file_spk');
                $fileName = time() . '.' . $file_spk->getClientOriginalExtension();

                // Upload original image
                $file_spk->move(public_path('File/file_spk'), $fileName);

                // Compress and save a new version


                $filenameSPK = $fileName;
            } else {
                $filenameSPK = "";
            }



            $dataInputSPK =
                [
                    'id_spp' => $getSPPAdd->id_spp,
                    'id_formulir' => $getSPPAdd->id_formulir,
                    'id_pelanggan' => $getSPPAdd->id_pelanggan,
                    'id_rumah'      => $getSPPAdd->id_rumah,
                    'id_subkon'     => $getSPPAdd->id_subkon,
                    'file_spk'      => $filenameSPK,
                    'no_surat_spk'  => $request->no_surat_spk,
                    'total_spk'     => $request->total_spk,
                    'cicilan_spk'   => $request->cicilan == null ? 0 : $request->cicilan,
                    'status_spk'    => "pengajuan",
                    'tambah_bangunan_spk' => $request->tambah_bangunan_spk == null ? "tidak ada" : $request->tambah_bangunan_spk,
                    'ket_tambah_bangunan' => $request->keterangan,

                ];
            $getInputSPK = $this->spk->getInsertSPK($dataInputSPK);


            $dataImage = array();
            if ($request->hasFile('denah')) {
                $images = $request->file('denah');

                foreach ($images as $image) {
                    // Check if the file is valid
                    if ($image->isValid()) {
                        // Generate a unique filename for each image
                        $filename = uniqid() . '_' . $image->getClientOriginalName();

                        // Customize the storage path according to your needs
                        $path = $image->storeAs('File/denah_spk', $filename, 'public'); // Changed storage path
                        $image->move(public_path('File/denah_spk'), $filename);
                        // Save the filename and SPK ID to the array
                        $dataImage[] = [
                            'id_spk' => $getInputSPK,
                            'img_spk' => $filename,

                        ];

                        // You can save $path and $filename to your database if needed
                    }
                }
                // dd($dataImage);
                // Insert the data into the database table
                DB::table('img_spk')->insert($dataImage);

                // You can return or do something with $dataImage here if necessary
            }



            $dataCicilan = array();
            if ($request->tambah_bangunan_spk == "ada") {


                $cicilanSPK = $request->input('cicilanSPK'); // Array of installment amounts
                $tanggalBayar = $request->input('tanggal_bayar'); // Array of payment dates



                // Loop through each installment amount and corresponding payment date
                for ($i = 0; $i < count($cicilanSPK); $i++) {
                    $cicilan = $cicilanSPK[$i];
                    $tanggal = $tanggalBayar[$i];

                    // Assuming $getInputSPK is already defined
                    $dataCicilan[] = [
                        'id_spk' => $getInputSPK,
                        'pembayaran_cs' => $cicilan,
                        'sisa_cs' => $cicilan, // Assuming sisa_cs has the same value as pembayaran_cs initially
                        'tgl_bayar_cs' => $tanggal // Add the payment date to the array

                    ];

                    // Save $cicilan and $tanggal to your database or perform any other operations
                }
                // dd($dataCicilan);
                DB::table('cicilan_spk')->insert($dataCicilan);
            }
            return redirect()->route('spk.admin', [$getProjek->nama_projek])->with('success', 'SPK telah di buat');

            // if (!$foundMatchingMenu) {
            //     return redirect('/login')->with('danger', 'anda tidak dapat mengakses halaman ini');
            // }

        } else {
            return redirect('/login');
        }
    }

    function editSPK($projek, $id_spk)  {
            $decryptedID = Crypt::decrypt($id_spk);

            $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

            $getPengawas= $this->userAdmin->getUserAdminWhere('*',['ktgr_admin.kategori' => 'Pengawas']);
            $getSubkon = $this->subkon->getSubkonWhere(['status_subkon' => "Aktif"]);

            $getSPK = $this->spk->firstSPK(['id_spk' => $decryptedID]);
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

                return view('V_Admin.editSPK',
                    compact(
                        'user',
                        'projekUser',
                        'getProjek',
                        'getUserMenu',
                        'getSPK',
                        'getPengawas',
                        'getSubkon',

                    )
                );
            } else {
                return redirect('/login');
            }
    }

}
