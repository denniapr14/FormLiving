<?php

namespace App\Http\Controllers;

use App\Mail\MailAttachment;
use App\Mail\MailNotify;
// use App\Mail\MailAttachment;
// use Spatie\PdfToText\Pdf;
// use PDF;

// Model
use App\Models\Clusters;
use App\Models\FormulirPesanan;
use App\Models\GambarRumah;
use App\Models\KalkulatorKPR;
use App\Models\ListPromo;
use App\Models\PembayaranRumah;
use App\Models\Promo;
use App\Models\Rumah;
use App\Models\TipeRumah;
use App\Models\UserAdmin;
use App\Models\UserPelanggan;
// Controller
// =======================
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;
use PDF;

class C_Simulasi extends Controller
{
    public $rumah;
    public $cluster;
    public $promoList;
    public $userList;
    public $userAdmin;
    public $userPelanggan;
    public $tipeRumah;
    public $gambarRumah;
    public $kalkulatorKPR;
    public $listPromo;
    public $promo;
    public $formulirPesanan;
    public $pembayaranRumah;

    public function __construct()
    {
        $this->rumah = new Rumah();
        $this->promoList = new Promo();
        $this->userList = new UserPelanggan();
        $this->cluster = new Clusters();
        $this->userAdmin = new UserAdmin();
        $this->userPelanggan = new UserPelanggan();
        $this->tipeRumah = new TipeRumah();
        $this->gambarRumah = new GambarRumah();
        $this->kalkulatorKPR = new KalkulatorKPR();
        $this->listPromo = new ListPromo();
        $this->promo = new Promo();
        $this->formulirPesanan = new FormulirPesanan();
        $this->pembayaranRumah = new PembayaranRumah();
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:admin')->except('logout');
        // // $this->middleware('guest:writer')->except('logout');
    }

    public function SimCluster()
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect('/login')->with('error', 'You not sign in or sign up!');
            // code...
        }

        $cluster = $this->cluster->getClusterProjekWhereArrJoinRumah(
            '*',
            [
                'projek.id_projek' => 1,
                'rumah.status' => 'available',
            ]
        );
        $rumahAll = $this->rumah->getRumahAll();
        $rumah = $this->rumah->getRumahSelectJoinClusterProjek(
            '*',
            [
                'rumah.id_projek' => 1,
                'rumah.status' => 'Available',
            ]
        );

        // session check untuk user
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            return view('simCluster', compact(
                'user',
                'cluster',
                'rumah',
                'rumahAll'
            ));
        }
        // session check untuk pelanggan
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );

            return view('simCluster', compact(
                'userPelanggan',
                'cluster',
                'rumah',
                'rumahAll'
            ));
        }

        return view('simCluster', compact(
            'cluster',
            'rumah',
            'rumahAll'
        ));
        // code...
    }

    public function SimType($id_rumah)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect('/login')->with('error', 'You not sign in or sign up!');
        }

        $rumah = $this->rumah->firstRumahWhereJoinCluster('*', 'rumah.id_rumah', '=', $id_rumah);

        // dd($rumah);
        // die();
        $tipe = $this->gambarRumah->getGambarRumahJoinTipeRumahGroupBy(
            '*',
            [
                'gambar_rumah.id_rumah' => $id_rumah,
            ],
            'tipe_rumah.id_tipe_rumah'
        )->collect();
        // dd($tipe);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );
            // dd($user);
            // die();
            return view('simType', compact(
                'user',
                'tipe',
                'rumah'
            ));
        }
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );
            // dd($userPelanggan);
            // die();
            return view('simType', compact(
                'userPelanggan',
                'tipe',
                'rumah'
            ));
        }

        return view('simType', compact('tipe'), compact('rumah'));
        // code...
    }

    public function SimDetailType($id_rumah, $id_tipe)
    {
        $rumah = $this->rumah->firstRumahWhereJoinCluster('*', 'rumah.id_rumah', '=', $id_rumah);

        $tipeRumah = $this->tipeRumah->firstTipeRumah('*', ['id_tipe_rumah' => $id_tipe]);
        // dd($tipeRumah);
        // die();
        $imgRumahSingle = $this->gambarRumah->firstGambarRumah(
            '*',
            [
                'id_tipe' => $id_tipe,
                'jenis_img' => 'gambar',
            ]
        );
        $imgRumah = $this->gambarRumah->getGambarRumahWhereArr(
            '*',
            [
                'id_rumah' => $id_rumah,
                'id_tipe' => $id_tipe,
                'jenis_img' => 'gambar',
                'status_gr' => 'aktif',
            ]
        );
        $imgRumah2 = $this->gambarRumah->getGambarRumahWhereArr(
            '*',
            [
                'id_rumah' => $id_rumah,
                'id_tipe' => $id_tipe,
                'jenis_img' => 'gambar',
                'status_gr' => 'aktif',
            ]
        );
        $imgDenah = $this->gambarRumah->getGambarRumahWhereArr(
            '*',
            [
                'id_rumah' => $id_rumah,
                'id_tipe' => $id_tipe,
                'jenis_img' => 'denah',
                'status_gr' => 'aktif',
            ]
        );

        // dd($imgRumah2);

        // dd($imgDenah);
        // die();

        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect('/login')->with('error', 'You not sign in or sign up!');
        }

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

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
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );
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

        return view('simDetailType', compact(
            'rumah',
            'tipeRumah',
            'imgRumahSingle',
            'imgRumah',
            'imgDenah'
        ));

        // code...
    }

    public function SimPayment($id_rumah, $id_tipe)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect('/login')->with('error', 'You not sign in or sign up!');
        }

        $tipeRumah = $this->gambarRumah->firstGambarRumahJoinTipeRumahGroupBy(
            '*',
            [
                'gambar_rumah.id_rumah' => $id_rumah,
            ],
            'tipe_rumah.id_tipe_rumah'
        );
        // dd($tipeRumah);
        $rumah = $this->rumah->firstRumahWhereJoinClusterArr('*', [
            'status' => 'available',
            'rumah.id_rumah' => $id_rumah,
        ]);
        $promoRumah = $this->listPromo->getListPromoJoinPromoWherePengisianData($id_rumah)->collect();

        // $data= 'tipe','rumah';
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            // dd($user);
            // die();
            return view('simPaymentOption', compact(
                'user',
                'tipeRumah',
                'promoRumah',
                'rumah',
            ));
        }
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );
            // dd($userPelanggan);
            // die();

            return view('simPaymentOption', compact(
                'userPelanggan',
                'tipeRumah',
                'promoRumah',
                'rumah',
            ));
        }

        return view('simPaymentOption', compact(
            'tipeRumah',
            'promoRumah',
            'rumah'
        ));

        // code...
    }

    public function SimPaymentAction(Request $request, $id_rumah, $id_tipe)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect('/login')->with('error', 'You not sign in or sign up!');
        }

        $tipeRumah = $this->gambarRumah->firstGambarRumahJoinTipeRumahGroupBy(
            '*',
            [
                'gambar_rumah.id_rumah' => $id_rumah,
            ],
            'tipe_rumah.id_tipe_rumah'
        );
        // dd($tipeRumah);
        $rumah = $this->rumah->firstRumahWhereJoinCluster('*', 'rumah.id_rumah', '=', $id_rumah);
        // $data= 'tipe','rumah';
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );
            $dataInputKalkulator = '';
            if ($request->jenis == 'KPR') {
                if ($rumah->status_stock == 'Inden') {
                    $dataInputKalkulator = [
                        'luas_tanah_kkpr' => $rumah->luas_tanah,
                        'luas_bangunan_kkpr' => $tipeRumah->luas_bangunan_tr,
                        'harga_awal' => (float) $tipeRumah->harga_tr,
                        'total_harga' => (float) $tipeRumah->harga_tr - ($tipeRumah->harga_tr * ($request->persentase / 100)),
                        'uang_muka' => (float) ($tipeRumah->harga_tr * ($request->persentase / 100)),
                        'kpr' => (float) $tipeRumah->harga_tr - ($tipeRumah->harga_tr * ($request->persentase / 100)),
                        'terbilang' => terbilang($tipeRumah->harga_tr * ($request->persentase / 100)),
                        'cicilan_um' => $request->cicilanUM,
                    ];
                } else {
                    $dataInputKalkulator = [
                        'luas_tanah_kkpr' => $rumah->luas_tanah,
                        'luas_bangunan_kkpr' => $tipeRumah->luas_bangunan_tr,
                        'harga_awal' => (float) $tipeRumah->harga_tr,
                        'total_harga' => (float) $tipeRumah->harga_tr - ($tipeRumah->harga_tr * ($request->persentase / 100)),
                        'uang_muka' => (float) ($tipeRumah->harga_tr * ($request->persentase / 100)),
                        'kpr' => (float) $tipeRumah->harga_tr - ($tipeRumah->harga_tr * ($request->persentase / 100)),
                        'terbilang' => terbilang($tipeRumah->harga_tr * ($request->persentase / 100)),
                        'cicilan_um' => 1,
                    ];
                }
            } else {
                $dataInputKalkulator = [
                    'luas_tanah_kkpr' => $rumah->luas_tanah,
                    'luas_bangunan_kkpr' => $tipeRumah->luas_bangunan_tr,
                    'harga_awal' => (float) $tipeRumah->harga_tr,
                    'total_harga' => (float) $tipeRumah->harga_tr,
                    'uang_muka' => (float) 10000000,
                    'kpr' => 0,
                    'cicilan_um' => 1,
                    'cicilan' => $request->cicilan,
                ];
            }

            $getIDKalkulator = $this->kalkulatorKPR->insertGetIDKalkulatorKPR($dataInputKalkulator);

            return redirect()->route('simulasiPelanggan', [$id_rumah, $id_tipe, $getIDKalkulator, $request->jenis])->with('success', 'silahkan lanjutkan proses');
            // dd($dataInputKalkulator);

            // dd($user);
            // die();
        }
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );

            // dd($userPelanggan);
            // die();
        }

        // code...
    }

    public function SimDataPelanggan($id_rumah, $id_tipe, $id_kpr, $jenis)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect('/login')->with('error', 'You not sign in or sign up!');
        }

        // dd($kkpr);
        // die();
        $tipeRumah = $this->gambarRumah->firstGambarRumahJoinTipeRumahGroupBy(
            '*',
            [
                'gambar_rumah.id_tipe' => $id_tipe,
            ],
            'tipe_rumah.id_tipe_rumah'
        );
        $getKKPR = $this->kalkulatorKPR->firstKalkulatorKPRArr(
            '*',
            ['id_kkpr' => $id_kpr]
        );
        $rumah = $this->rumah->firstRumahWhereJoinClusterArr('*', [
            'status' => 'available',
            'rumah.id_rumah' => $id_rumah,
        ]);

        $promoRumah = $this->listPromo->getListPromoJoinPromoWherePengisianData($id_rumah)->collect();
        // dd($promoRumah);
        // dd($promo);
        // die();
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            // dd($user);
            // die();
            // return view('underMT', compact('rumah', 'tipeRumah'));
            return view('simDataPelanggan', compact(
                'user',
                'tipeRumah',
                'rumah',

                'promoRumah',
                'getKKPR',
                'jenis'
            ));
        }
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );
            // dd($userPelanggan);
            // die();
            // return view('underMT', compact('rumah', 'tipeRumah'));
            return view('simDataPelanggan', compact(
                'userPelanggan',
                'rumah',

                'promoRumah',
                'getKKPR',
                'jenis'
            ));
        }

        return view('login');

        // code...
    }

    public function SimDataPelangganAction(Request $request, $id_rumah, $id_tipe, $id_kpr, $jenis)
    {
        $tipeRumah = $this->gambarRumah->firstGambarRumahJoinTipeRumahGroupBy(
            '*',
            [
                'gambar_rumah.id_tipe' => $id_tipe,
            ],
            'tipe_rumah.id_tipe_rumah'
        );
        $rumah = $this->rumah->firstRumahWhereJoinClusterArr('*', [
            'status' => 'available',
            'rumah.id_rumah' => $id_rumah,
        ]);

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            $checkPelanggan = $this->userPelanggan->firstUserPelangganWhereArr('*', [
                'no_ktp_plgn' => $request->nik,
            ]);
            // dd($checkPelanggan);
            $id = null;

            $this->validate($request, [
                // 'nama' => 'required|min:3',
                // 'pekerjaan' => 'required',
                'email' => 'required',
                // 'nik' => 'required',
                // 'telp' => 'required',
                // 'jalan' => 'required',
                // 'kelurahan' => 'required',
                // 'kecamatan' => 'required',
                // 'kota' => 'required',
                // 'pulau' => 'required',

                // 'npwp' => 'required',
                // 'gender' => 'required',
                // 'statusPernikahan' => 'required',
                // 'tempatLahir' => 'required',
                // 'tanggal' => 'required',
                // 'bulan' => 'required',
                // 'tahun' => 'required',
                // 'user'  => 'required'
                // 'phone' => 'required|numeric',

                // 'kelamin'   => 'required',
            ]);

            if (!empty($checkPelanggan)) {
                $id = $checkPelanggan->id_pelanggan;
            }
            if (empty($checkPelanggan)) {
                $dataInput = [
                    'nama_plgn' => $request->nama,
                    'id_user_admin' => session::get('user'),
                    'pekerjaan_plgn' => $request->pekerjaan,

                    'no_ktp_plgn' => $request->nik,
                    'no_telp_plgn' => $request->telp,
                    'no_wa_plgn' => $request->wa,
                    'alamat_plgn' => $request->jalan.', '.$request->kelurahan.', '.$request->kecamatan.', '.$request->kota.', '.$request->pulau,
                    'email_plgn' => $request->email,
                    'npwp_plgn' => $request->npwp,
                    'jenis_kelamin_status' => $request->gender,
                    'status_pernikahan_plgn' => $request->statusPernikahan,
                    'tempat_lahir_plgn' => $request->tempatLahir,
                    'tgl_lahir_plgn' => $request->tahun.'-'.$request->bulan.'-'.$request->tanggal,
                    'sumber_dana_plgn' => $request->sumberDana,
                    // 'id_kkpr'               => $kkpr->id_kkpr,
                ];
                // dd($dataInput);
                // die();

                $id = $this->userPelanggan->insertGetIDUserPelanggan($dataInput);
            }

            return redirect()->route('simulasiSummary', [$id_rumah, $id_tipe, $id_kpr, $jenis, $id, $request->promo]);

            // dd($dataInput);
            // die();
        }

        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );

            $checkPelanggan = $this->userPelanggan->firstUserPelangganWhereArr('*', [
                'no_ktp_plgn' => $request->nik,
            ]);

            $id = null;
            $this->validate($request, [
                'nama' => 'required|min:3',
                'pekerjaan' => 'required',
                'email' => 'required',
                'nik' => 'required',
                'telp' => 'required',
                'jalan' => 'required',
                'kelurahan' => 'required',
                'kecamatan' => 'required',
                'kota' => 'required',
                'pulau' => 'required',
                'email' => 'required',
                'npwp' => 'required',
                'gender' => 'required',
                'statusPernikahan' => 'required',
                'tempatLahir' => 'required',
                'tanggal' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
            ]);

            if (!empty($checkPelanggan)) {
                $id = $checkPelanggan->id_pelanggan;
            }
            if (empty($checkPelanggan)) {
                $dataInput = [
                    'nama_plgn' => $request->nama,
                    'id_user_admin' => session::get('user'),
                    'pekerjaan_plgn' => $request->pekerjaan,

                    'no_ktp_plgn' => $request->nik,
                    'no_telp_plgn' => $request->telp,
                    'no_wa_plgn' => $request->wa,
                    'alamat_plgn' => $request->jalan.', '.$request->kelurahan.', '.$request->kecamatan.', '.$request->kota.', '.$request->pulau,
                    'email_plgn' => $request->email,
                    'npwp_plgn' => $request->npwp,
                    'jenis_kelamin_status' => $request->gender,
                    'status_pernikahan_plgn' => $request->statusPernikahan,
                    'tempat_lahir_plgn' => $request->tempatLahir,
                    'tgl_lahir_plgn' => $request->tahun.'-'.$request->bulan.'-'.$request->tanggal,
                    // 'id_kkpr'               => $kkpr->id_kkpr,
                ];
                // dd($dataInput);
                // die();

                $id = $this->userPelanggan->insertGetIDUserPelanggan($dataInput);
            }

            return redirect('/simulation-jenis-option/'.$rumah->id_rumah.'/'.$tipeRumah->id_tipe_rumah.'/'.$id.'/'.$request->promo);

            // dd($dataInput);
            // die();
        }
    }

    public function FindKuponSpesial($id_rumah, $id_tipe, $id_formulir, $jenis, $kode_promo)
    {
        $promo = $this->promo->firstPromoDataPelanggan($kode_promo);
        // dd($promo);
        // die();
        return response()->json($promo);
    }

    public function SimSummary($id_rumah, $id_tipe, $id_kkpr, $jenis, $id_pelanggan, $voucher)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect('/login')->with('error', 'You not sign in or sign up!');
        }

        $pelanggan = $this->userPelanggan->firstUserPelangganWhereArr('*', [
            'id_pelanggan' => $id_pelanggan,
        ]);

        $kkpr = $this->kalkulatorKPR->firstKalkulatorKPRArr('*', [
            'id_kkpr' => $id_kkpr,
        ]);

        $tipeRumah = $this->gambarRumah->firstGambarRumahJoinTipeRumahGroupBy(
            '*',
            [
                'gambar_rumah.id_tipe' => $id_tipe,
            ],
            'tipe_rumah.id_tipe_rumah'
        );
        $rumah = $this->rumah->firstRumahWhereJoinClusterArr('*', [
            'status' => 'available',
            'rumah.id_rumah' => $id_rumah,
        ]);
        if ($voucher != 'Tidak Ada Promo') {
            $promo = DB::table('promo')
                ->where('kode_promo', '=', $voucher)
                // ->where('tgl_aktif', '<=', NOW())

                ->first();
            $dataUpdatePromo = [
                'kuota_promo' => $promo->kuota_promo - 1,
            ];
            DB::table('promo')
                ->where('kode_promo', '=', $voucher)
                ->update(
                    $dataUpdatePromo
                );
        }

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            // dd($user);
            // die();
            if ($voucher != 'Tidak Ada Promo') {
                return view('simSummary', compact(
                    'user',
                    'tipeRumah',
                    'rumah',
                    'promo',
                    'jenis',
                    'voucher',
                    'pelanggan',
                    'kkpr'
                ));
            } else {
                return view('simSummary', compact(
                    'user',
                    'tipeRumah',
                    'rumah',
                    'jenis',
                    'voucher',
                    'pelanggan',
                    'kkpr'
                ));
            }
        }
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );
            // dd($userPelanggan);
            // die();
            if ($voucher != 'Tidak Ada Promo') {
                return view('simSummary', compact(
                    'userPelanggan',
                    'tipeRumah',
                    'rumah',
                    'promo',
                    'jenis',
                    'voucher',
                    'pelanggan',
                    'kkpr'
                ));
            } else {
                return view('simSummary', compact(
                    'userPelanggan',
                    'tipeRumah',
                    'rumah',
                    'jenis',
                    'voucher',
                    'pelanggan',
                    'kkpr'
                ));
            }

            return view('simSummary');
            // code...
        }
    }

    public function SimSummaryAction(Request $request, $id_rumah, $id_tipe, $id_kkpr, $jenis, $id_pelanggan, $voucher)
    {
        $tipeRumah = $this->gambarRumah->firstGambarRumahJoinTipeRumahGroupBy(
            '*',
            [
                'gambar_rumah.id_tipe' => $id_tipe,
            ],
            'tipe_rumah.id_tipe_rumah'
        );
        $kkpr = $this->kalkulatorKPR->firstKalkulatorKPRArr('*', [
            'id_kkpr' => $id_kkpr,
        ]);

        $pelanggan = $this->userPelanggan->firstUserPelangganWhereArr('*', [
            'id_pelanggan' => $id_pelanggan,
        ]);

        $rumah = $this->rumah->firstRumahWhereJoinClusterArr('*', [
            'status' => 'available',
            'rumah.id_rumah' => $id_rumah,
        ]);
        if ($voucher != 'Tidak Ada Promo') {
            $promo = DB::table('promo')
                ->where('kode_promo', '=', $voucher)
                // ->where('tgl_aktif', '<=', NOW())

                ->first();
        }
        $template = 'mail.mailFP';
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );
            $this->validate($request, [
                'harga' => 'required',

                // 'phone' => 'required|numeric',

                // 'kelamin'   => 'required',
            ]);
            $dataInputDetail = '';
            $kkpr = '';

            if (!empty($promo)) {
                $dataInputDetail = [
                    'luas_tanah_kkpr' => $rumah->luas_tanah,
                    'tipe_kkpr' => $tipeRumah->jenis_tr,
                    'harga_awal' => (float) $tipeRumah->harga_tr,
                    'total_diskon' => (float) $promo->diskon_promo,

                    'total_harga' => (float) $kkpr->total_harga - $promo->diskon_promo,
                    'terbilang' => terbilang($tipeRumah->harga_tr - $promo->diskon_promo),
                ];
            }
            if (empty($promo)) {
                $dataInputDetail = [
                    'luas_tanah_kkpr' => $rumah->luas_tanah,
                    'tipe_kkpr' => $tipeRumah->jenis_tr,
                    'harga_awal' => (float) $tipeRumah->harga_tr,

                    'terbilang' => terbilang($tipeRumah->harga_tr),
                ];
            }

            // dd($dataInputDetail);
            DB::table('kalkulator_kpr')
                ->where('id_kkpr', $id_kkpr)
                ->update(
                    $dataInputDetail
                );
            $kkpr = $this->kalkulatorKPR->firstKalkulatorKPRArr('*', [
                'id_kkpr' => $id_kkpr,
            ]);
            // $id = DB::table('kalkulator_kpr')->insertGetId(
            //     $dataInputDetail
            // );

            if (!empty($promo)) {
                $dataInput = [
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'id_user_admin' => session::get('user'),
                    'id_kkpr' => $id_kkpr,
                    'id_rumah' => $id_rumah,
                    'id_tipe_rumah' => $id_tipe,
                    'jenis_pembayaran_fp' => $jenis,
                    'id_promo' => $promo->id_promo,
                    'id_sales' => session::get('user'),
                    'promo_fp' => $promo->keterangan,
                ];
            }
            if (empty($promo)) {
                $dataInput = [
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'id_user_admin' => session::get('user'),
                    'id_kkpr' => $id_kkpr,
                    'id_rumah' => $id_rumah,
                    'id_tipe_rumah' => $id_tipe,
                    'jenis_pembayaran_fp' => $jenis,
                    'id_sales' => session::get('user'),
                ];
            }
            $fp = $this->formulirPesanan->insertGetIDFormulirPesanan($dataInput);

            $dtPembayaran = [];
            $now = Carbon::now();

            if ($jenis == 'Cicilan') {
                // code...
                $kurang = $kkpr->total_harga;
                $proporsi = ($kurang / $kkpr->cicilan);
                $dataCicil = $this->round_up($proporsi / 100000, 2) * 100000;
                $sumCicil = $dataCicil * ($kkpr->cicilan - 1);
                $tglPembayaranCicilan = date('d-m-Y', strtotime('-23 days'));
                $dtPembayaran[] = [
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => 'Booking Fee',
                    'harga_pr' => (float) $kkpr->uang_muka,
                    'sisa_pr' => (float) $kkpr->uang_muka,
                    'tgl_pr' => date('Y-m-d'),
                    'status_pr' => 'belum',
                ];
                // $dtPembayaran[] = array(
                //     'id_rumah' => $id_rumah,
                //     'id_formulir' => $fp,
                //     'id_pelanggan' => $pelanggan->id_pelanggan,
                //     'detail_pr' => "Booking Fee",
                //     'harga_pr' => $kkpr->uang_muka,
                //     'sisa_pr' => $kkpr->uang_muka,
                //     'tgl_pr' => date("Y-m-d", strtotime("+1 days")),
                //     'status_pr' => "belum",
                // );
                $sumCicil = $dataCicil * ($kkpr->cicilan - 1);
                for ($i = 1; $i < $kkpr->cicilan; ++$i) {
                    if (!empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'Angsuran '.$i,
                            'harga_pr' => (float) $dataCicil,
                            'sisa_pr' => (float) $dataCicil,
                            'tgl_pr' => Carbon::now()->addMonths($i),
                            'status_pr' => 'belum',
                        ];
                    }
                    if (empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'Angsuran '.$i,
                            'harga_pr' => (float) $dataCicil,
                            'sisa_pr' => (float) $dataCicil,
                            'tgl_pr' => Carbon::now()->addMonths($i),
                            'status_pr' => 'belum',
                        ];
                    }
                }
                $dtPembayaran[] = [
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => 'Angsuran '.$kkpr->cicilan,
                    'harga_pr' => (float) $kkpr->total_harga - $sumCicil - 10000000,
                    'sisa_pr' => (float) $kkpr->total_harga - $sumCicil - 10000000,
                    'tgl_pr' => Carbon::now()->addMonths($kkpr->cicilan),
                    'status_pr' => 'belum',
                ];
                // dd($kurang);
                // dd($dtPembayaran);
                // die();
            }
            if ($jenis == 'KPR') {
                $currentDateTime = Carbon::now();

                $proporsiKPR = ($kkpr->uang_muka / $kkpr->cicilan_um);
                $dataCicilKPR = $this->round_up($proporsiKPR / 100000, 2) * 100000;
                $sumCicilKPR = $dataCicilKPR * ($kkpr->cicilan_um - 1);
                $dataKPR = '';
                if (!empty($promo)) {
                    $dataKPR = $kkpr->kpr - ($promo->diskon_promo + 10000000);
                } else {
                    $dataKPR = $kkpr->kpr - 10000000;
                }
                $dtPembayaran[] = [
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => 'Booking Fee ',
                    'harga_pr' => (float) 10000000,
                    'sisa_pr' => (float) 10000000,
                    'tgl_pr' => date('Y-m-d'),
                    'status_pr' => 'belum',
                ];
                if ($kkpr->cicilan_um != 1) {
                    $tglPembayaranKPR = date('d-m-Y', strtotime('+8 days'));
                    $dtPembayaran[] = [
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => 'Cicilan Uang Muka '. 1,
                        'harga_pr' => (float) $dataCicilKPR,
                        'sisa_pr' => (float) $dataCicilKPR,
                        'tgl_pr' => Carbon::now()->addMonths(1),
                        'status_pr' => 'belum',
                    ];
                    for ($k = 1; $k < $kkpr->cicilan_um - 1; ++$k) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'Cicilan Uang Muka '. 1 + $k,
                            'harga_pr' => (float) $dataCicilKPR,
                            'sisa_pr' => (float) $dataCicilKPR,
                            'tgl_pr' => Carbon::now()->addMonths($k + 1),
                            'status_pr' => 'belum',
                        ];
                    }
                    $dtPembayaran[] = [
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => 'Cicilan Uang Muka '.$kkpr->cicilan_um,
                        'harga_pr' => (float) $kkpr->uang_muka - $sumCicilKPR,
                        'sisa_pr' => (float) $kkpr->uang_muka - $sumCicilKPR,
                        'tgl_pr' => Carbon::now()->addMonths($kkpr->cicilan_um),
                        'status_pr' => 'belum',
                    ];
                    if (!empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'KPR',
                            'harga_pr' => (float) $dataKPR,
                            'sisa_pr' => (float) $dataKPR,
                            'tgl_pr' => '0000-00-00',
                            'status_pr' => 'belum',
                        ];
                    }
                    if (empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'KPR',
                            'harga_pr' => (float) $dataKPR,
                            'sisa_pr' => (float) $dataKPR,
                            'tgl_pr' => '0000-00-00',
                            'status_pr' => 'belum',
                        ];
                    }
                }
                if ($kkpr->cicilan_um == 1) {
                    $tglPembayaranKPR = date('d-m-Y', strtotime('+8 days'));
                    $dtPembayaran[] = [
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => 'Uang Muka ',
                        'harga_pr' => (float) $kkpr->uang_muka,
                        'sisa_pr' => (float) $kkpr->uang_muka,
                        'tgl_pr' => Carbon::now()->addMonths(1),
                        'status_pr' => 'belum',
                    ];

                    if (!empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'KPR',
                            'harga_pr' => (float) $dataKPR,
                            'sisa_pr' => (float) $dataKPR,
                            'tgl_pr' => '0000-00-00',
                            'status_pr' => 'belum',
                        ];
                    }
                    if (empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'KPR',
                            'harga_pr' => (float) $dataKPR,
                            'sisa_pr' => (float) $dataKPR,
                            'tgl_pr' => '0000-00-00',
                            'status_pr' => 'belum',
                        ];
                    }
                }
            }
            // dd($dtPembayaran);
            $this->pembayaranRumah->insertPembayaranRumah($dtPembayaran);

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
            $promo = '';
            if (!empty($fpJadi->id_promo)) {
                $promo = DB::table('promo')
                    ->where('id_promo', '=', $fpJadi->id_promo)
                    ->first();
            }
            // ---------------------- JIKA ONLINE AKTIFKAN INI >>>>>>>>>>>>>>>
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
                ->where('departemen.departemen', '=', 'Accounting')
                ->where('user_admin.email_ua', '!=', null)
                ->get();

            // ->where('tgl_aktif', '<=', NOW())
            // dd($fpJadi);

            // return view('pdf.PrintSPR', compact('fp','dtPembayaran'));

            $pdf = \PDF::loadView('pdf.printSPR-ttd-non-promo', ['fp' => $fpJadi, 'dtPembayaran' => $dataPembayaran, 'promo' => $promo]);
            // $pdf = PDF::loadView('mail.index');
            $pdf->setPaper('F4', 'potrait');
            // Storage::put('public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf', $pdf->output());
            $pdf->render();
            $pdfData = $pdf->output();
            // $filename = 'public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf';
            // Storage::put($filename, $pdfData);
            // dd($filename);
            $path = './Home/pdf/';
            $pdf->save($path.'FP-'.$fpJadi->blok.'-'.$fpJadi->nomor.'-'.$fpJadi->id_formulir.'.pdf');
            $filename = $path.'FP-'.$fpJadi->blok.'-'.$fpJadi->nomor.'-'.$fpJadi->id_formulir.'.pdf';

            $dataEmail1 = [
                'to' => $pelanggan->email_plgn,
                'subject' => 'Form Living',
                'body' => '',
                'nama' => $pelanggan->nama_plgn,
                'attachment' => $filename,
            ];
            $dataEmail2 = [
                'to' => $user->email_ua,
                'subject' => 'Form Living',
                'body' => '',
                'body' => '',
                'nama' => $pelanggan->nama_plgn,
                'attachment' => $filename,
            ];
            $dataEmail3 = null;
            foreach ($accounting as $accounting) {
                $dataEmail3 = [
                    'to' => $accounting->email_ua,
                    'subject' => 'Form Living',
                    'body' => '',
                    'body' => '',
                    'nama' => $pelanggan->nama_plgn,
                    'attachment' => $filename,
                ];
                try {
                    // $MailAtt = ();
                    // Mail::to($pelanggan->email_plgn)->send(new MailAttachment($dataEmail1, $template));

                    \Mail::to($accounting->email_ua)->send(new MailAttachment($dataEmail3, $template));
                } catch (Exception $e) {
                    // return response()->json(['Sorry! Please try again latter']);
                }
            }

            // $template = 'mail.mailFP';
            // $template2 = 'pdf.salesFP';
            // MailNotify class that is extend from Mailable class.
            try {
                // $MailAtt = ();
                \Mail::to($pelanggan->email_plgn)->send(new MailAttachment($dataEmail1, $template));

                \Mail::to($user->email_ua)->send(new MailAttachment($dataEmail2, $template));
            } catch (Exception $e) {
                // return response()->json(['Sorry! Please try again latter']);
            }

            return redirect('/congratulation')->with('success', 'Data has been send!');
            // dd($user);
            // die();
        }
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );
            // dd($userPelanggan);
            // die();
            $this->validate($request, [
                'harga' => 'required',
            ]);

            $dataInputDetail = '';
            $kkpr = '';

            if (!empty($promo)) {
                $dataInputDetail = [
                    'luas_tanah_kkpr' => $rumah->luas_tanah,
                    'tipe_kkpr' => $tipeRumah->jenis_tr,
                    'harga_awal' => (float) $tipeRumah->harga_tr,
                    'total_diskon' => (float) $promo->diskon_promo,

                    'total_harga' => (float) $tipeRumah->harga_tr - $promo->diskon_promo,
                    'terbilang' => terbilang($tipeRumah->harga_tr - $promo->diskon_promo),
                ];
            }
            if (empty($promo)) {
                $dataInputDetail = [
                    'luas_tanah_kkpr' => $rumah->luas_tanah,
                    'tipe_kkpr' => $tipeRumah->jenis_tr,
                    'harga_awal' => (float) $tipeRumah->harga_tr,

                    'total_harga' => (float) $tipeRumah->harga_tr,
                    'terbilang' => terbilang($tipeRumah->harga_tr),
                ];
            }

            // dd($dataInputDetail);
            DB::table('kalkulator_kpr')
                ->where('id_kkpr', $id_kkpr)
                ->update(
                    $dataInputDetail
                );
            $kkpr = $this->kalkulatorKPR->firstKalkulatorKPRArr('*', [
                'id_kkpr' => $id_kkpr,
            ]);
            // $id = DB::table('kalkulator_kpr')->insertGetId(
            //     $dataInputDetail
            // );

            if (!empty($promo)) {
                $dataInput = [
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'id_user_admin' => session::get('user'),
                    'id_kkpr' => $id_kkpr,
                    'id_rumah' => $id_rumah,
                    'id_tipe_rumah' => $id_tipe,
                    'jenis_pembayaran_fp' => $jenis,
                    'id_promo' => $promo->id_promo,
                    'id_sales' => session::get('user'),
                    'promo_fp' => $promo->keterangan,
                ];
            }
            if (empty($promo)) {
                $dataInput = [
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'id_user_admin' => session::get('user'),
                    'id_kkpr' => $id_kkpr,
                    'id_rumah' => $id_rumah,
                    'id_tipe_rumah' => $id_tipe,
                    'jenis_pembayaran_fp' => $jenis,
                    'id_sales' => session::get('user'),
                ];
            }
            $fp = $this->formulirPesanan->insertGetIDFormulirPesanan($dataInput);

            $dtPembayaran = [];
            $now = Carbon::now();

            if ($jenis == 'Cicilan') {
                // code...
                $kurang = $kkpr->total_harga;
                $proporsi = ($kurang / $kkpr->cicilan);
                $dataCicil = $this->round_up($proporsi / 100000, 2) * 100000;
                $sumCicil = $dataCicil * ($kkpr->cicilan - 1);
                $tglPembayaranCicilan = date('d-m-Y', strtotime('-23 days'));
                $dtPembayaran[] = [
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => 'Booking Fee',
                    'harga_pr' => (float) $kkpr->uang_muka,
                    'sisa_pr' => (float) $kkpr->uang_muka,
                    'tgl_pr' => date('Y-m-d'),
                    'status_pr' => 'belum',
                ];
                // $dtPembayaran[] = array(
                //     'id_rumah' => $id_rumah,
                //     'id_formulir' => $fp,
                //     'id_pelanggan' => $pelanggan->id_pelanggan,
                //     'detail_pr' => "Booking Fee",
                //     'harga_pr' => $kkpr->uang_muka,
                //     'sisa_pr' => $kkpr->uang_muka,
                //     'tgl_pr' => date("Y-m-d", strtotime("+1 days")),
                //     'status_pr' => "belum",
                // );
                $sumCicil = $dataCicil * ($kkpr->cicilan - 1);
                for ($i = 1; $i < $kkpr->cicilan; ++$i) {
                    if (!empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'Angsuran '.$i,
                            'harga_pr' => (float) $dataCicil,
                            'sisa_pr' => (float) $dataCicil,
                            'tgl_pr' => Carbon::now()->addMonths($i),
                            'status_pr' => 'belum',
                        ];
                    }
                    if (empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'Angsuran '.$i,
                            'harga_pr' => (float) $dataCicil,
                            'sisa_pr' => (float) $dataCicil,
                            'tgl_pr' => Carbon::now()->addMonths($i),
                            'status_pr' => 'belum',
                        ];
                    }
                }
                $dtPembayaran[] = [
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => 'Angsuran '.$kkpr->cicilan,
                    'harga_pr' => (float) $kkpr->total_harga - $sumCicil - 10000000,
                    'sisa_pr' => (float) $kkpr->total_harga - $sumCicil - 10000000,
                    'tgl_pr' => Carbon::now()->addMonths($kkpr->cicilan),
                    'status_pr' => 'belum',
                ];
                // dd($kurang);
                // dd($dtPembayaran);
                // die();
            }
            if ($jenis == 'KPR') {
                $currentDateTime = Carbon::now();

                $proporsiKPR = ($kkpr->uang_muka / $kkpr->cicilan_um);
                $dataCicilKPR = $this->round_up($proporsiKPR / 100000, 2) * 100000;
                $sumCicilKPR = $dataCicilKPR * ($kkpr->cicilan_um - 1);
                $dataKPR = '';
                if (!empty($promo)) {
                    $dataKPR = $kkpr->kpr - ($promo->diskon_promo + 10000000);
                } else {
                    $dataKPR = $kkpr->kpr - 10000000;
                }
                $dtPembayaran[] = [
                    'id_rumah' => $id_rumah,
                    'id_formulir' => $fp,
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'detail_pr' => 'Booking Fee ',
                    'harga_pr' => (float) 10000000,
                    'sisa_pr' => (float) 10000000,
                    'tgl_pr' => date('Y-m-d'),
                    'status_pr' => 'belum',
                ];
                if ($kkpr->cicilan_um != 1) {
                    $tglPembayaranKPR = date('d-m-Y', strtotime('+8 days'));
                    $dtPembayaran[] = [
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => 'Cicilan Uang Muka '. 1,
                        'harga_pr' => (float) $dataCicilKPR,
                        'sisa_pr' => (float) $dataCicilKPR,
                        'tgl_pr' => Carbon::now()->addMonths(1),
                        'status_pr' => 'belum',
                    ];
                    for ($k = 1; $k < $kkpr->cicilan_um - 1; ++$k) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'Cicilan Uang Muka '. 1 + $k,
                            'harga_pr' => (float) $dataCicilKPR,
                            'sisa_pr' => (float) $dataCicilKPR,
                            'tgl_pr' => Carbon::now()->addMonths($k),
                            'status_pr' => 'belum',
                        ];
                    }
                    $dtPembayaran[] = [
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => 'Cicilan Uang Muka '.$kkpr->cicilan_um,
                        'harga_pr' => (float) $kkpr->uang_muka - $sumCicilKPR,
                        'sisa_pr' => (float) $kkpr->uang_muka - $sumCicilKPR,
                        'tgl_pr' => Carbon::now()->addMonths($kkpr->cicilan_um),
                        'status_pr' => 'belum',
                    ];
                    if (!empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'KPR',
                            'harga_pr' => (float) $dataKPR,
                            'sisa_pr' => (float) $dataKPR,
                            'tgl_pr' => '0000-00-00',
                            'status_pr' => 'belum',
                        ];
                    }
                    if (empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'KPR',
                            'harga_pr' => (float) $dataKPR,
                            'sisa_pr' => (float) $dataKPR,
                            'tgl_pr' => '0000-00-00',
                            'status_pr' => 'belum',
                        ];
                    }
                }
                if ($kkpr->cicilan_um == 1) {
                    $tglPembayaranKPR = date('d-m-Y', strtotime('+8 days'));
                    $dtPembayaran[] = [
                        'id_rumah' => $id_rumah,
                        'id_formulir' => $fp,
                        'id_pelanggan' => $pelanggan->id_pelanggan,
                        'detail_pr' => 'Uang Muka ',
                        'harga_pr' => (float) $kkpr->uang_muka,
                        'sisa_pr' => (float) $kkpr->uang_muka,
                        'tgl_pr' => Carbon::now()->addMonths(1),
                        'status_pr' => 'belum',
                    ];

                    if (!empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'KPR',
                            'harga_pr' => (float) $dataKPR,
                            'sisa_pr' => (float) $dataKPR,
                            'tgl_pr' => '0000-00-00',
                            'status_pr' => 'belum',
                        ];
                    }
                    if (empty($promo)) {
                        $dtPembayaran[] = [
                            'id_rumah' => $id_rumah,
                            'id_formulir' => $fp,
                            'id_pelanggan' => $pelanggan->id_pelanggan,
                            'detail_pr' => 'KPR',
                            'harga_pr' => (float) $dataKPR,
                            'sisa_pr' => (float) $dataKPR,
                            'tgl_pr' => '0000-00-00',
                            'status_pr' => 'belum',
                        ];
                    }
                }
            }
            // dd($dtPembayaran);
            $this->pembayaranRumah->insertPembayaranRumah($dtPembayaran);

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
            $promo = '';
            if (!empty($fpJadi->id_promo)) {
                $promo = DB::table('promo')
                    ->where('id_promo', '=', $fpJadi->id_promo)
                    ->first();
            }

            // ->where('tgl_aktif', '<=', NOW())

            // return view('pdf.PrintSPR', compact('fp','dtPembayaran'));
            $pdf = \PDF::loadView('pdf.PrintSPR', ['fp' => $fpJadi, 'dtPembayaran' => $dtPembayaran, 'promo' => $promo]);
            // $pdf = PDF::loadView('mail.index');
            $pdf->setPaper('F4', 'potrait');
            // Storage::put('public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf', $pdf->output());
            $pdf->render();
            $pdfData = $pdf->output();
            // $filename = 'public/Home/pdf/FP-'.$fp->blok."-".$fp->nomor.'.pdf';
            // Storage::put($filename, $pdfData);
            // dd($filename);
            $path = './Home/pdf/';
            $pdf->save($path.'FP-'.$fpJadi->blok.'-'.$fpJadi->nomor.'-'.$fpJadi->id_formulir.'.pdf');
            $filename = $path.'FP-'.$fpJadi->blok.'-'.$fpJadi->nomor.'-'.$fpJadi->id_formulir.'.pdf';

            $dataEmail1 = [
                'to' => $pelanggan->email_plgn,
                'subject' => 'Form Living',
                'body' => '',
                'nama' => $pelanggan->nama_plgn,
                'attachment' => $filename,
            ];

            $template = 'mail.mailFP';
            // $template2 = 'pdf.salesFP';
            // MailNotify class that is extend from Mailable class.
            try {
                // $MailAtt = ();
                \Mail::to($pelanggan->email_plgn)->send(new MailAttachment($dataEmail1, $template));
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
        // code...
    }

    public function Congratulation()
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect('/login')->with('error', 'You not sign in or sign up!');
        }

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            // dd($user);
            // die();
            return view('congratulation', compact('user'));
        }
        if (session()->has('guest')) {
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere(
                'id_pelanggan',
                '=',
                session::get('guest')
            );
            // dd($userPelanggan);
            // die();
            return view('congratulation', compact('userPelanggan'));
        }

        return view('congratulation');
        // code...
    }

    public function round_up($value, $precision)
    {
        $pow = pow(10, $precision);

        return (ceil($pow * $value) + ceil($pow * $value - ceil($pow * $value))) / $pow;
    }
}
