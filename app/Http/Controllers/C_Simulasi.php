<?php

namespace App\Http\Controllers;


use App\Mail\MailAttachment;
use App\Mail\MailNotify;
// use App\Mail\MailAttachment;
// use Spatie\PdfToText\Pdf;
// use PDF;

// Model
use App\Models\Promo;
use App\Models\Departemen;
use App\Models\Rumah;
use App\Models\TipeRumah;
use App\Models\UserAdmin;
use App\Models\UserPelanggan;
use App\Models\Clusters;
use App\Models\GambarRumah;
use Illuminate\Contracts\Auth\Guard;

// Controller
// =======================
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Mail;
use PDF;

class C_Simulasi extends Controller
{
    public $rumah;
    public $cluster;
    public  $promoList;
    public $userList;
    public $userAdmin;
    public $userPelanggan;
    public $tipeRumah;
    public $gambarRumah;


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
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:admin')->except('logout');
        // // $this->middleware('guest:writer')->except('logout');
    }
    //

    public function SimCluster()
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...
        }

        $cluster = $this->cluster->getClusterProjekWhereArr(
            '*',
            ['projek.id_projek' => 1]
        );
        $rumah = $this->rumah->getRumahSelectJoinClusterProjek(
            '*',
            [
                'rumah.id_projek'   => 1,
                'rumah.status'      => 'Available'
            ]
        );

        //session check untuk user
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );
            return view('simCluster', compact(
                'user',
                'cluster',
                'rumah'
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
                'rumah'
            ));
        }
        return view('simCluster', compact(
            'cluster',
            'rumah'
        ));
        # code...
    }

    public function SimType($id_rumah)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
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
        # code...
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
                'jenis_img' => "gambar"
            ]
        );
        $imgRumah = $this->gambarRumah->getGambarRumahWhereArr(
            '*',
            [
                'id_rumah' => $id_rumah,
                'id_tipe' => $id_tipe,
                'jenis_img' => 'gambar',
                'status_gr' => 'aktif'
            ]
        );
        $imgRumah2 = $this->gambarRumah->getGambarRumahWhereArr(
            '*',
            [
                'id_rumah' => $id_rumah,
                'id_tipe' => $id_tipe,
                'jenis_img' => 'gambar',
                'status_gr' => 'aktif'
            ]
        );
        $imgDenah = $this->gambarRumah->getGambarRumahWhereArr(
            '*',
            [
                'id_rumah' => $id_rumah,
                'id_tipe' => $id_tipe,
                'jenis_img' => 'denah',
                'status_gr' => 'aktif'
            ]
        );



        // dd($imgRumah2);

        // dd($imgDenah);
        // die();

        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
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

        # code...
    }

    public function SimPayment($id_rumah, $id_tipe)
    {

        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }
        // $promo = DB::table('promo')
        //     ->where('kode_promo', '=', $kdPromo)
        //     ->first();
        // if ($kdPromo != "Tidak Ada Promo") {
        //     $kdPromo = $promo->kode_promo;
        // }
        // $pelanggan = DB::table('user_pelanggan')
        //     ->where('id_pelanggan', '=', $id_pelanggan)
        //     ->first();

        // $skBunga = DB::table('sk_bunga')->where([
        //     'status_bunga' => "aktif",
        // ])->get();
        $tipeRumah = $this->gambarRumah->firstGambarRumahJoinTipeRumahGroupBy(
            '*',
            [
                'gambar_rumah.id_rumah' => $id_rumah,

            ],
            'tipe_rumah.id_tipe_rumah'
        );
        // dd($tipeRumah);
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
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
                'rumah',

            ));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();

            // dd($userPelanggan);
            // die();

            return view('simPaymentOption', compact(
                'userPelanggan',
                'tipeRumah',
                'rumah',

            ));
        }
        return view('simPaymentOption', compact(
            'tipeRumah',
            'rumah'
        ));

        # code...
    }

    public function SimPrice(Request $request, $id_rumah, $id_tipe)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }
        // $promo = DB::table('promo')
        //     ->where('kode_promo', '=', $kdPromo)
        //     ->first();
        // if ($kdPromo != "Tidak Ada Promo") {
        //     $kdPromo = $promo->kode_promo;
        // }
        // $pelanggan = DB::table('user_pelanggan')
        //     ->where('id_pelanggan', '=', $id_pelanggan)
        //     ->first();
        // $skBunga = DB::table('sk_bunga')
        //     ->join('list_sk_bunga', 'sk_bunga.id_bunga', '=', 'list_sk_bunga.id_bunga')
        //     ->where([
        //         'status_bunga' => "aktif",
        //     ])
        //     ->where('list_sk_bunga.id_rumah', '=', $id_rumah)
        //     ->get();
        $tipeRumah = $this->gambarRumah->firstGambarRumahJoinTipeRumahGroupBy(
            '*',
            [
                'gambar_rumah.id_rumah' => $id_rumah,

            ],
            'tipe_rumah.id_tipe_rumah'
        );
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        $payment = $request->payment;

        if (!empty($payment)) {

            return redirect()->route('simulationPricePayment', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah, $payment]);
        } else {
            return back()->with('error', 'You not select payment method!');
        }
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );


            // dd($user);
            // die();
            return view('simPrice', compact(
                'user',
                'tipeRumah',
                'rumah',
                'payment',
                'kdPromo',
                'promo'
            ));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            return view('simPrice', compact(
                'userPelanggan',
                'tipeRumah',
                'rumah',
                'payment',
                'kdPromo',
                'promo'
            ));
        }
        return view(
            'simPrice',
            compact(
                'tipeRumah',
                'rumah',
                'payment'
            )
        );
        # code...
    }

    public function SimPricePayment($id_rumah, $id_tipe, $payment)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }
        // $promo = DB::table('promo')
        //     ->where('kode_promo', '=', $kdPromo)
        //     ->first();
        // if ($kdPromo != "Tidak Ada Promo") {
        //     $kdPromo = $promo->kode_promo;
        // }
        // $pelanggan = DB::table('user_pelanggan')
        //     ->where('id_pelanggan', '=', $id_pelanggan)
        //     ->first();
        $skBunga = DB::table('sk_bunga')->where([
            'status_bunga' => "aktif",
        ])
            ->groupBy('nama_bank')
            ->get();
        $tipeRumah =  $this->gambarRumah->firstGambarRumahJoinTipeRumahGroupBy(
            '*',
            [
                'gambar_rumah.id_rumah' => $id_rumah,

            ],
            'tipe_rumah.id_tipe_rumah'
        );
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();

        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );


            // dd($user);
            // die();
            return view('simPrice', compact(
                'user',
                'tipeRumah',
                'rumah',
                'payment',
                'skBunga',

            ));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();

            return view('simPrice', compact(
                'userPelanggan',
                'tipeRumah',
                'rumah',
                'payment',
                'skBunga',

            ));
        }
        return view('simPrice', 'tipeRumah', 'rumah', 'payment');
        # code...
    }

    // AJAX
    public function getSKBunga($id_rumah, $id_tipe, $payment, $namaBank = "")
    {
        $skBunga = DB::table('sk_bunga')
            ->select('sk_bunga.id_bunga', 'sk_bunga.nama_bank', 'sk_bunga.persentase')
            ->join('list_sk_bunga', 'sk_bunga.id_bunga', '=', 'list_sk_bunga.id_bunga')

            ->where([
                'list_sk_bunga.id_rumah' => $id_rumah,
                'sk_bunga.status_bunga' => "aktif",
                'nama_bank' => $namaBank,
            ])->get();
        // dd($skBunga);

        return response()->json($skBunga);
    }

    public function SimPricePaymentAction(Request $request, $id_rumah, $id_tipe, $id_pelanggan, $kdPromo, $payment)
    {
        $promo = DB::table('promo')
            ->where('kode_promo', '=', $kdPromo)
            ->first();
        if ($kdPromo != "Tidak Ada Promo") {
            $kdPromo = $promo->kode_promo;
        }
        $pelanggan = DB::table('user_pelanggan')
            ->where('id_pelanggan', '=', $id_pelanggan)
            ->first();

        $skBunga = DB::table('sk_bunga')->where([
            'status_bunga' => "aktif",
        ])->get();
        $tipeRumah = DB::table('tipe_rumah')->where([
            'id_tipe_rumah' => $id_tipe,
        ])->first();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])

                ->first();

            if ($payment == "KPR") {
                // dd( $request->namaBank);
                // die();
                $bank = explode("|", $request->namaBank);
                if ($kdPromo == "Tidak Ada Promo") {
                    $dataInput = array(
                        'id_bunga' => $bank[0],
                        'uang_muka' => preg_replace('/\D/', '', $request->uangMuka),
                        'luas_bangunan_kkpr' => $tipeRumah->luas_bangunan_tr,
                        'luas_tanah_kkpr' => $rumah->luas_tanah,
                        'tipe_kkpr' => $tipeRumah->jenis_tr,
                        'harga_awal' =>  preg_replace('/\D/', '', $request->jumlah) +
                            preg_replace('/\D/', '', $request->uangMuka)
                            + 10000000,
                        'total_harga' =>  preg_replace('/\D/', '', $request->jumlah),
                        'bunga' => $bank[1],
                        'cicilan_um' => $request->cicilanUM,

                    );
                }
                if (!empty($promo)) {
                    $dataInput = array(
                        'id_bunga' => $bank[0],
                        'uang_muka' => preg_replace('/\D/', '', $request->uangMuka),
                        'luas_bangunan_kkpr' => $tipeRumah->luas_bangunan_tr,
                        'luas_tanah_kkpr' => $rumah->luas_tanah,
                        'tipe_kkpr' => $tipeRumah->jenis_tr,
                        'harga_awal' => preg_replace('/\D/', '', $request->jumlah) +
                            preg_replace('/\D/', '', $request->uangMuka)
                            + 10000000,
                        'total_harga' =>  preg_replace('/\D/', '', $request->jumlah) - $promo->diskon_promo,
                        'total_diskon' => $promo->diskon_promo,
                        'bunga' => $bank[1],
                        'cicilan_um' => $request->cicilanUM,

                    );
                }
                // dd($dataInput);
            }

            if ($payment == "Cicilan") {
                if ($kdPromo == "Tidak Ada Promo") {
                    $dataInput = array(
                        'harga_awal' => $tipeRumah->harga_tr,
                        'uang_muka' => $tipeRumah->harga_tr * (10 / 100),
                        'luas_bangunan_kkpr' => $tipeRumah->luas_bangunan_tr,
                        'luas_tanah_kkpr' => $rumah->luas_tanah,
                        'tipe_kkpr' => $tipeRumah->jenis_tr,
                        'harga_awal' => $tipeRumah->harga_tr,
                        'total_harga' => $tipeRumah->harga_tr,

                        'cicilan' => $request->cicilan,
                    );
                }
                if (!empty($promo)) {
                    $dataInput = array(
                        'harga_awal' => $tipeRumah->harga_tr,
                        'uang_muka' => $tipeRumah->harga_tr * (10 / 100),
                        'luas_bangunan_kkpr' => $tipeRumah->luas_bangunan_tr,
                        'luas_tanah_kkpr' => $rumah->luas_tanah,
                        'tipe_kkpr' => $tipeRumah->jenis_tr,
                        'harga_awal' => $tipeRumah->harga_tr,
                        'total_harga' => $tipeRumah->harga_tr - $promo->diskon_promo,
                        'total_diskon' => $promo->diskon_promo,
                        'cicilan' => $request->cicilan,
                    );
                }
            }
            // dd($dataInput);
            $id = DB::table('kalkulator_kpr')->insertGetId(
                $dataInput
            );
            return redirect('/simulation-summary/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $id_pelanggan . '/' . $kdPromo . '/' . $payment . '/' . $id);
            // dd($user);
            // die();

        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();

            if ($payment == "KPR") {
                // dd( $request->namaBank);
                // die();
                $bank = explode("|", $request->namaBank);
                $dataInput = array(
                    'id_bunga' => $bank[0],
                    'uang_muka' => preg_replace('/\D/', '', $request->uangMuka),
                    'harga_awal' => (int) preg_replace('/\D/', '', $request->jumlah) +
                        (int) preg_replace('/\D/', '', $request->uangMuka)
                        + 10000000,
                    'bunga' => $bank[1],

                );
            }

            if ($payment == "Cicilan") {
                $dataInput = array(

                    'cicilan' => $request->cicilan,
                );
            }
            // dd($dataInput);
            //     die();
            $id = DB::table('kalkulator_kpr')->insertGetId(
                $dataInput
            );
            return redirect('/simulation-summary/' . $rumah->id_rumah . '/' . $tipeRumah->id_tipe_rumah . '/' . $id_pelanggan . '/' . $kdPromo . '/' . $payment . '/' . $id);
        }

        # code...
    }

    public function FindKupon($id_rumah, $id_tipe, $payment, $id_kkpr, $kode_promo)
    {
        $promo = DB::table('promo')

            ->where('status', '=', "aktif")
            ->where('tipe_promo', '=', "spesial")
            // ->where('tgl_aktif', '<=', NOW())
            ->where('tgl_berakhir', '>=', NOW())
            ->where([
                'kode_promo' => $kode_promo,
            ])->get();
        // dd($promo);
        // die();
        return response()->json($promo);
    }
}
