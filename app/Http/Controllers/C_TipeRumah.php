<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
// use App\Mail\MailAttachment;

// use Spatie\PdfToText\Pdf;
// use PDF;

// Model
use App\Models\GambarRumah;
use App\Models\Projek;
use App\Models\Rumah;
use App\Models\TipeRumah;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserProjek;
use Illuminate\Http\Request;
// =======================

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use PDF;

class C_TipeRumah extends Controller
{
    public $tipeRumah;
    public $rumah;
    public $gambarRumah;

    public $userAdmin;
    public $userProjek;
    public $projek;
    public $userMenu;

    public function __construct()
    {
        $this->projek = new Projek();
        $this->rumah = new Rumah();
        $this->tipeRumah = new TipeRumah();
        $this->gambarRumah = new GambarRumah();
        $this->userAdmin = new UserAdmin();
        $this->userProjek = new UserProjek();
        $this->userMenu = new UserMenu();
        // $this->cluster = new Cluster;
    }

    public function tipeRumah($projek, $id)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $decryptedID = Crypt::decrypt($id);

        $getRumah = $this->rumah->getRumahJoinClusterWhere('*', 'id_rumah', '=', $decryptedID);
        $getTipeRumah = $this->tipeRumah->getGambarTipeRumahSelectCountGroupByWhere('rumah.id_rumah', '=', $decryptedID)->collect();
        $getTipeRumah = $getTipeRumah->where('deleted_tr', 'false');
        $getVideoTipeRumah = $this->gambarRumah->getGambarRumahWhereArr('*',['id_rumah' => $decryptedID, 'jenis_img' => "Video"]);
        // dd($getVideoTipeRumah);
        $whereGambar = [
            // 'status_gr' => "aktif",
            'id_rumah' => $decryptedID,
        ];
        $getGambar = $this->gambarRumah->getGambarRumahWhereArr('*', $whereGambar);
        // dd($getGambar);



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

            return view('V_Admin.tipeRumah',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                    'getTipeRumah',
                    'getGambar',
                    'getProjek',
                    'getUserMenu',
                    'getVideoTipeRumah'

                )
            );
        } else {
            redirect('/login');
        }
    }

    public function storeTipeRumah($projek, $id)
    {

        $decryptedID = Crypt::decrypt($id);
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getRumah = $this->rumah->getRumahJoinClusterWhere('*', 'id_rumah', '=', $decryptedID);
        // dd($getRumah);
        $getTipeRumah = $this->tipeRumah->getTipeRumahWhere('*', 'id_rumah', '=', $decryptedID);

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
            return view(
                'V_Admin.addTipeRumah',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                    'getTipeRumah',
                    'getProjek',
                    'getUserMenu'

                )
            );
        } else {
            redirect('/login');
        }
    }

    public function storeTipeRumahAction(Request $request, $projek)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);

        if (session()->has('user')) {
            $dataTipeRumah = [];
            $dataidTipeRumah = [];
            for ($i = 0; $i < count($request->tipe); ++$i) {
                $dataTipeRumah[] = [
                    'id_rumah' => $request->inputID,
                    'jenis_tr' => $request->tipe[$i],
                    'luas_bangunan_tr' => $request->luasBangunan[$i],
                    'kmr_mandi_tr' => $request->kamarMandi[$i],
                    'kmr_tidur_tr' => $request->kamarTidur[$i],
                    'harga_tr' => $request->harga[$i],
                    'harga_text_tr' => $request->hargaText[$i],
                    'pondasi_tr' => $request->pondasi[$i],
                    'struktur_tr' => $request->struktur[$i],
                    'dinding_dlm_tr' => $request->dindingDalam[$i],
                    'dinding_luar_tr' => $request->dindingLuar[$i],
                    'dinding_kmr_mnd_tr' => $request->dindingKamarMandi[$i],
                    'dd_meja_dapur_tr' => $request->dindingMejaDapur[$i],
                    'lt_ruang_tidur_tr' => $request->lantaiRuangTidur[$i],
                    'lt_ruang_keluarga_tr' => $request->lantaiRuangKeluarga[$i],
                    'lt_kmr_mnd_utama_tr' => $request->lantaiKamarMandiUtama[$i],
                    'lt_teras_utama_tr'   => $request->lantaiTerasUtama[$i],
                    'rangka_atap_tr' => $request->rangkaAtap[$i],
                    'penutup_atap_tr' => $request->penutupAtap[$i],
                    'kusen_tr' => $request->kusen[$i],
                    'daun_pintu_tr' => $request->daunPintu[$i],
                    'sanitary_tr' => $request->sanitary[$i],
                    'plafon_dlm_tr' => $request->plafonDalam[$i],
                    'handle_tr' => $request->handle[$i],
                    'lighting_tr' => $request->lighting[$i],
                    'daya_listrik_tr' => $request->dayaListrik[$i],
                    'carport_tr' => $request->carport[$i],
                    'tangga_tr' => $request->tangga[$i],
                ];

                $dataidTipeRumah[] =
                    [
                        'no' => $i,
                        'id_tipe_rumah' => DB::table('tipe_rumah')->insertGetId($dataTipeRumah[$i]),
                    ];
            }

            $dataGambarTipe = [];

            if ($request->hasFile('fileInput')) {
                $images = $request->file('fileInput');
                for ($i = 0; $i < count($dataidTipeRumah); ++$i) {
                    for ($counter = 0; $counter < count($request->counter); ++$counter) {
                        $image = $images[$counter];
                        // Move the image to the desired location (e.g., public/images folder).
                        if ($request->jenisGambar[$counter] == 'Denah') {
                            // code...
                            // $destinationPath = public_path('public/Home/denah/');
                            $destinationPath = public_path('/Home/images/denah');
                            // Generate a unique filename
                            $filename = time() . '.' . $image->getClientOriginalExtension();

                            // Resize the image
                            // $resizedImage = Image::make($image)->fit(300);
                            $img = Image::make($image->path());
                            $img->save($destinationPath . '/' . $filename);
                            // $path = '/Home/images/denah/';
                            // // Save the resized image to disk
                            // Storage::put($path . $filename, $img);

                            // Generate a unique filename
                            // $filename = time() . '.' . $image->getClientOriginalExtension();
                            // $path = $images->store('');
                            // $filename = basename($path);

                            // Save image information to the database with the status
                            // $imageModel = new Image();
                        } else {
                            $destinationPath = public_path('/Home/images/tipe');
                            // Generate a unique filename
                            $filename = time() . '.' . $image->getClientOriginalExtension();

                            // Resize the image
                            // $resizedImage = Image::make($image)->fit(300);
                            $img = Image::make($image->path());
                            $img->save($destinationPath . '/' . $filename);

                            // Save the resized image to disk
                            // $path = '/Home/images/tipe/';
                            // Storage::put($path . $filename, $img);
                            // $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

                            // $img = $image->save($path.$fileName);

                            // // Get the filename from the path
                            // $filename = basename($fileName);
                            // Storage::put($path . $filename,$img);
                            // $destinationPath = public_path('public/Home/tipe/');
                            // $filename = time() . '.' . $image->getClientOriginalExtension();
                            // // $filename = basename($path);
                        }

                        if ($request->counter[$counter] == $dataidTipeRumah[$i]['no']) {
                            // echo "<pre>";
                            // echo "ada yang sama cook";
                            // print_r($dataidTipeRumah[$i]["id_tipe_rumah"]);
                            // echo "</pre>";

                            $dataGambarTipe[] = [
                                'id_rumah' => $request->inputID,
                                'id_tipe' => $dataidTipeRumah[$i]['id_tipe_rumah'],
                                'jenis_img' => $request->jenisGambar[$counter],
                                'status_gr' => 'aktif',
                                'img_rumah' => $filename,
                            ];
                        }
                    }
                }
            }
            $this->gambarRumah->insertGambarRumah($dataGambarTipe);
            // echo "<pre>";
            // print_r($dataTipeRumah);
            // dd($dataGambarTipe);
            // dd($dataGambarTipe);
            return redirect('/rumah-admin/' . $projek)->with('success', 'Data rumah dan tipe rumah telah berhasil di simpan');
        } else {
            return redirect('/login');
        }
    }

    public function updateTipeRumah($projek, $id_tipe)
    {
        $decryptID = Crypt::decrypt($id_tipe);
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getRumah = $this->rumah->getRumahJoinClusterWhere('*', 'id_rumah', '=', $decryptID);
        $getTipeRumah = $this->tipeRumah->getTipeRumahWhere('*', 'id_tipe_rumah', '=', $decryptID);
        $getGambar = $this->gambarRumah->getGambarRumahWhereAll('*', 'id_tipe', '=', $decryptID);
        // dd($decryptID);
        // $getImgTipe = $this->gambarRumah->getGamba
        // dd($decryptID);
        // dd($getTipeRumah);


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
                'V_Admin.editTipeRumah',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                    'getTipeRumah',
                    'getGambar',
                    'getProjek',
                    'getUserMenu'

                )
            );
        } else {
            return redirect('/login');
        }
    }

    public function updateTipeRumahAction(Request $request, $projek, $id_tipe)
    {
        $decryptID = Crypt::decrypt($id_tipe);
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getTipe = $this->tipeRumah->firstTipeRumah('*', ['id_tipe_rumah' => $decryptID]);


        if (session()->has('user')) {
            $imageTipe = "";
            $filenameTipe = "";

            if ($request->hasFile('gambarTipe')) {
                foreach ($request->file('gambarTipe') as $image) {
                    // Get the uploaded image file
                    $destinationPath = public_path('/Home/images/tipe');

                    // Generate a unique filename
                    $filenameTipe = time() . '.' . $image->getClientOriginalExtension();

                    // Resize and save the image
                    $img = Image::make($image->path());
                    $img->save($destinationPath . '/' . $filenameTipe);
                }
            } else {
                $filenameTipe = $getTipe->img_tr;
            }

            // dd($imageTipe);
            $dataTipeRumah = [];
            $dataidTipeRumah = [];
            for ($i = 0; $i < count($request->tipe); ++$i) {
                $dataTipeRumah[] = [
                    'id_rumah' => $request->id_rumah,
                    'jenis_tr' => $request->tipe[$i],
                    'luas_bangunan_tr' => $request->luasBangunan[$i],
                    'kmr_mandi_tr' => $request->kamarMandi[$i],
                    'kmr_tidur_tr' => $request->kamarTidur[$i],
                    'harga_tr' => $request->harga[$i],
                    'harga_text_tr' => $request->hargaText[$i],
                    'pondasi_tr' => $request->pondasi[$i],
                    'struktur_tr' => $request->struktur[$i],
                    'dinding_dlm_tr' => $request->dindingDalam[$i],
                    'dinding_luar_tr' => $request->dindingLuar[$i],
                    'dinding_kmr_mnd_tr' => $request->dindingKamarMandi[$i],
                    'dd_meja_dapur_tr' => $request->dindingMejaDapur[$i],
                    'lt_ruang_tidur_tr' => $request->lantaiRuangTidur[$i],
                    'lt_ruang_keluarga_tr' => $request->lantaiRuangKeluarga[$i],
                    'lt_kmr_mnd_utama_tr' => $request->lantaiKamarMandiUtama[$i],
                    'lt_teras_utama_tr'   => $request->lantaiTerasUtama[$i],
                    'rangka_atap_tr' => $request->rangkaAtap[$i],
                    'penutup_atap_tr' => $request->penutupAtap[$i],
                    'kusen_tr' => $request->kusen[$i],
                    'daun_pintu_tr' => $request->daunPintu[$i],
                    'sanitary_tr' => $request->sanitary[$i],
                    'plafon_dlm_tr' => $request->plafonDalam[$i],
                    'handle_tr' => $request->handle[$i],
                    'lighting_tr' => $request->lighting[$i],
                    'daya_listrik_tr' => $request->dayaListrik[$i],
                    'carport_tr' => $request->carport[$i],
                    'tangga_tr' => $request->tangga[$i],
                    'img_tr'    => $filenameTipe,
                    'tgl_update_tr' => date('Y-m-d H:i:s'),
                ];
                // dd($dataTipeRumah);

                DB::table('tipe_rumah')
                    ->where('id_tipe_rumah', $decryptID)
                    ->update(
                        $dataTipeRumah[$i]
                    );
            }


            if ($request->hasFile('fileInput')) {
                $images = $request->file('fileInput');
                for ($counter = 0; $counter < count($request->counter); ++$counter) {
                    $image = $images[$counter];
                    // Move the image to the desired location (e.g., public/images folder).
                    if ($request->jenisGambar[$counter] == 'Denah') {
                        // code...
                        // $destinationPath = public_path('public/Home/denah/');
                        $destinationPath = public_path('/Home/images/denah');
                        // Generate a unique filename
                        $filename = time() . '.' . $image->getClientOriginalExtension();

                        // Resize the image
                        // $resizedImage = Image::make($image)->fit(300);
                        $img = Image::make($image->path());
                        $img->save($destinationPath . '/' . $filename);
                        // $path = '/Home/images/denah/';
                        // // Save the resized image to disk
                        // Storage::put($path . $filename, $img);

                        // Generate a unique filename
                        // $filename = time() . '.' . $image->getClientOriginalExtension();
                        // $path = $images->store('');
                        // $filename = basename($path);

                        // Save image information to the database with the status
                        // $imageModel = new Image();
                    } else {
                        $destinationPath = public_path('/Home/images/tipe');
                        // Generate a unique filename
                        $filename = time() . '.' . $image->getClientOriginalExtension();

                        // Resize the image
                        // $resizedImage = Image::make($image)->fit(300);
                        $img = Image::make($image->path());
                        $img->save($destinationPath . '/' . $filename);

                        // Save the resized image to disk
                        // $path = '/Home/images/tipe/';
                        // Storage::put($path . $filename, $img);
                        // $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

                        // $img = $image->save($path.$fileName);

                        // // Get the filename from the path
                        // $filename = basename($fileName);
                        // Storage::put($path . $filename,$img);
                        // $destinationPath = public_path('public/Home/tipe/');
                        // $filename = time() . '.' . $image->getClientOriginalExtension();
                        // // $filename = basename($path);
                    }

                    // echo "<pre>";
                    // echo "ada yang sama cook";
                    // print_r($request->counter[$counter]);

                    // // print_r(array_keys($dataidTipeRumah[$i]));
                    // echo "</pre>";

                    $dataGambarTipe[] = [
                        'id_tipe' => $decryptID,
                        'id_rumah' => $request->id_rumah,
                        'jenis_img' => $request->jenisGambar[$counter],
                        'status_gr' => 'aktif',
                        'img_rumah' => $filename,
                    ];

                    $this->gambarRumah->insertGambarRumah($dataGambarTipe);
                }
            }
            // dd($dataGambarTipe);
            // dd($dataGambarTipe);
            return redirect('/tipe-rumah-admin/' . $getProjek->nama_projek . '/' .
                Crypt::encrypt($request->id_rumah))->with('success', 'Data tipe rumah telah berhasil diubah');
        } else {
            return redirect('/login');
        }
    }

    public function updateImageTipeRumahAction(Request $request, $projek, $id, $id_gambar)
    {
        // $decryptID = Crypt::decrypt($id_tipe);
        // $decryptIDGambar = Crypt::decrypt($id_gambar);
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getGambar = $this->gambarRumah->getGambarRumahWhere('*', 'gambar_rumah.id_gambar_rumah', '=', $id_gambar);

        $filename = $getGambar->img_rumah;
        $jenis_img = trim($getGambar->jenis_img);
        $path = "";


        if ($request->file('img') != null) {

            $img = $request->file('img');

            // Generate a unique filename based on the current timestamp and the original file extension
            $filename = time() . '.' . $img->getClientOriginalExtension();

            // Store the image in the 'images' folder under the 'public' disk
            if ($jenis_img == "gambar") {
                # code...
                $path = 'Home/images/tipe/';
            } else {
                $path = 'Home/images/denah/';
            }
            $img = Image::make($img);
            $img->save(public_path($path . $filename));
        }

        $dataGambarTipe = [
            'img_rumah' => $filename,
        ];

        // dd($dataGambarTipe);
        DB::table('gambar_rumah')
            ->where('id_gambar_rumah', $id_gambar)
            ->update($dataGambarTipe);

        return response()->json($dataGambarTipe);
    }
    function deleteTipeRumahAction($id)
    {

        $decryptedID = Crypt::decrypt($id);

        $getTipeRumah = $this->tipeRumah->firstTipeRumah('*', [
            'id_tipe_rumah' => $decryptedID
        ]);

        $dtDelete = [
            'deleted_tr'    => 'true',
            'deleted_tr_at' => Carbon::now()
        ];
        DB::table('tipe_rumah')
            ->where('id_tipe_rumah', $decryptedID)
            ->update($dtDelete);
        return redirect()->back()->with('success', 'Data tipe rumah telah berhasil dihapus');
    }
    function addVideoTipeRumahAction(Request $request, $projek, $id) {
        $decryptedID = Crypt::decrypt($id);
        $getTipeRumah = $this->tipeRumah->firstTipeRumah('*',['tipe_rumah.id_tipe_rumah'  => $decryptedID]);
        $dataGambarTipe =
        [
            'id_rumah' => $getTipeRumah->id_rumah,
            'id_tipe' => $getTipeRumah->id_tipe_rumah,
            'jenis_img' => $request->jenis_img,
            'img_rumah'     => $request->img_rumah
        ];

        // dd($dataGambarTipe);
        $this->gambarRumah->insertGambarRumah($dataGambarTipe);
        return redirect()->back( )->with('success','Berhasil Menambahkan Video Tipe Rumah');

    }

    function updateVideoTipeRumahAction(Request $request,$projek,$id_tipe,$id_gambar) {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $decryptID = Crypt::decrypt($id_tipe);
        $decryptID_gambar = Crypt::decrypt($id_gambar);

        $videoUrl = $request->input('videoUrl');
        $dataVideo = ['img_rumah' => $request->input('videoUrl')];
        DB::table('gambar_rumah')
        ->where('id_gambar_rumah', $request->input('formId'))
        ->update($dataVideo);


        // Process the data, e.g., update the video URL in the database
        // You can also return a response if needed
        return response()->json(['success' => true]);
    }

    public function deleteVideoTipeRumahAction(Request $request, $projek, $id_tipe, $id_gambar)
    {
        // Decrypt IDs
        $decryptID_tipe = Crypt::decrypt($id_tipe);
        $decryptID_gambar = Crypt::decrypt($id_gambar);

        // Update status_gr to "nonaktif" to simulate deletion
        $dataVideo = ['status_gr' => "nonaktif"];
        DB::table('gambar_rumah')
            ->where('id_gambar_rumah', $decryptID_gambar)
            ->update($dataVideo);

        // Return success response
        return response()->json(['success' => true]);
    }
}
