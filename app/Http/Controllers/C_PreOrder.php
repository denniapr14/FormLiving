<?php

namespace App\Http\Controllers;

// Model
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserProjek;
use App\Models\Projek;
use App\Models\Rumah;
use App\Models\PreOrder;
use App\Models\UserPelanggan;


use App\Mail\MailAttachment;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Mail;
use PDF;

class C_PreOrder extends Controller
{
    public $userAdmin;
    public $userProjek;
    public $projek;
    public $rumah;
    public $preOrder;
    public $pelangganData;
    public $userMenu;

    public function __construct()
    {

        $this->userAdmin = new UserAdmin;
        $this->userProjek = new UserProjek;
        $this->projek = new Projek;
        $this->rumah = new Rumah;
        $this->preOrder = new PreOrder;
        $this->pelangganData = new UserPelanggan;
        $this->userMenu =  new UserMenu();
    }

    function Preorder($projek)
    {
        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => session::get('user'),
        ])->collect();

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

        $getProjek = $this->projek->firstProjek(
            '*',
            'nama_projek',
            '=',
            $projek
        );

        $rumah = $this->rumah->getRumahProjekWhereAll(
            'projek.nama_projek',
            '=',
            $projek
        );

        // dd($getPreOrder);

        // $getRumah = $this->rumah->getRumahSelectCountGroupBy();
        // dd($getRumah);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            $projekUser = $this->userProjek->getProjectUserWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );
            if (
                $user->kategori == 'Sales' ||
                $user->kategori == 'SalesAgent' ||
                $user->kategori == 'Agent' ||
                $user->kategori == 'AgentCompany' ||
                $user->kategori == 'AdminAgentCompany'
            ) {
                $getPreOrder = $this->preOrder->getPreOrderWhereAllOrderByJoinProjekUserRumahClusterPelangganKategoriUserArr(
                    '*',
                    [
                        'pre_order.id_user_admin' => $user->id_user_admin,
                        'rumah.id_projek'   => $getProjek->id_projek
                    ],
                    'pre_order.tgl_input_po',
                    'desc'
                );
            } else {
                $getPreOrder = $this->preOrder->getPreOrderWhereAllOrderByJoinProjekUserRumahClusterPelangganKategoriUserArr(
                    '*',
                    [

                        'rumah.id_projek'   => $getProjek->id_projek
                    ],
                    'pre_order.tgl_input_po',
                    'desc'
                );
            }
            return view(
                'V_Admin.preOrder',
                compact(
                    'user',
                    'projekUser',
                    'rumah',
                    'getProjek',
                    'getPreOrder',
                    'getUserMenu'
                )
            );
        } else {
            return redirect('/login');
        }
    }

    function changeStatusPreOrder($projek, $id, $status)
    {

        $decryptedID = Crypt::decrypt($id);
        $decryptedStatus = Crypt::decrypt($status);


        $getPreOrder = $this->preOrder->getPreOrderWhereAllJoinProjekUserRumahClusterPelangganKategoriUser(
            '*',
            'pre_order.id_pre_order',
            '=',
            $decryptedID
        );

        $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
            'user_menu.status_um' => 'aktif',
            'user_menu.id_user_admin' => session::get('user'),
        ])->collect();

        $foundMatchingMenu = false;

        foreach ($getUserMenu as $menu) {
            if ($menu->url_menu == request()->segment(1)) {
                $foundMatchingMenu = true;
                break;
            }
        }
        // dd($getPreOrder[0]->nama_projek);

        if (session()->has('user')) {


            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            $projekUser = $this->userProjek->getProjectUserWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );
            date_default_timezone_set('Asia/Jakarta'); // Set the timezone to Jakarta
            $indoTime = date('Y-m-d H:i:s');
            $dataPreOrder = [
                'status_po' => $decryptedStatus,
                'tgl_update_po' => $indoTime
            ];
            // dd($dataPreOrder);
            DB::table('pre_order')
                ->where('id_pre_order', $decryptedID)
                ->update(
                    $dataPreOrder
                );
            $dataRumah = [];
            $template = '';


            if ($decryptedStatus == "rejected" && $getPreOrder[0]->tipe_booking_po == 'refundable') {
                # code...
                $dataRumah = [
                    'status' => "Available"
                ];
                $template = 'mail.mailPOTolak';
            }

            if ($decryptedStatus == "accepted" && $getPreOrder[0]->tipe_booking_po == 'refundable') {
                # code...
                $dataRumah = [
                    'status' => "keepRefundable"
                ];
                $template = 'mail.mailPOAccept';
            }

            if ($decryptedStatus == "accepted" && $getPreOrder[0]->tipe_booking_po == 'non-refundable') {
                # code...
              $getPreOrderRefundable = $this->preOrder->getPreOrderWhereAllOrderByJoinProjekUserRumahClusterPelangganKategoriUserArr(
                    '*',
                    [
                        'pre_order.tipe_booking_po' => 'refundable',
                        'pre_order.id_rumah'        => $getPreOrder[0]->id_rumah
                    ],
                    'pre_order.tgl_input_po',
                    'asc'
                );
                // dd($getPreOrderRefundable);
                foreach ($getPreOrderRefundable as $refundable) {
                    if (!empty($refundable->email_plgn)) {
                        DB::table('pre_order')
                            ->where('id_pre_order', $refundable->id_pre_order)
                            ->update([
                                'status_po' => 'overtaken'
                            ]);

                        $templateOvertaken = 'mail.mailPOOvertaken';
                        $data = [
                            "subject" => "Pre Order ".$decryptedStatus,
                            "body" => "Form Living",
                            "blok" => $getPreOrder[0]->blok,
                            "nomor" => $getPreOrder[0]->nomor,
                            "tipe"  => $getPreOrder[0]->tipe_booking_po

                        ];
                        try {
                            Mail::to($refundable->email_plgn)
                                ->send(new MailNotify($data, $templateOvertaken));

                            // Log successful email sending
                            // \Log::info("Email sent to: " . $refundable->email_plgn);
                        } catch (Exception $e) {
                            // Log email sending error
                            // \Log::error("Email sending error: " . $e->getMessage());
                        }
                    } else {
                        // \Log::warning("Empty email address for id_pre_order: " . $refundable->id_pre_order);
                    }
                }
                $dataRumah = [
                    'status' => "Hold"
                ];
                 $template = 'mail.mailPOAccept';
            }

            if ($decryptedStatus == "rejected" && $getPreOrder[0]->tipe_booking_po == 'non-refundable') {
                # code...

                $dataRumah = [
                    'status' => "KeepRefundable"
                ];
                $template = 'mail.mailPOTolak';
            }



            if ($decryptedStatus == "pending") {
                # code...
                $dataRumah = [
                    'status' => "Keep"
                ];
                $template = 'mail.mailPOPending';
            }
            if ($decryptedStatus == "userconfirmed") {
                # code...
                $dataRumah = [
                    'status' => "Sold"
                ];
                $template = 'mail.mailPOAccept';
            }

            DB::table('rumah')
                ->where('id_rumah', $getPreOrder[0]->id_rumah)
                ->update(
                    $dataRumah
                );


            $data = [
                "subject" => "Form Living",
                "body" => "Form Living",
                "blok" => $getPreOrder[0]->blok,
                "nomor" => $getPreOrder[0]->nomor,
                "tipe"  => $getPreOrder[0]->tipe_booking_po

            ];
            // MailNotify class that is extend from Mailable class.
            try {
                Mail::to($getPreOrder[0]->email_plgn)->send(new MailNotify($data,  $template));
                // return response()->json(['Great! Successfully send in your mail']);
            } catch (Exception $e) {
                // return response()->json(['Sorry! Please try again latter']);
            }


            return redirect()->back()->with(
                'success',
                'Pre order rumah ' . $getPreOrder[0]->nama_cluster . ' / ' . $getPreOrder[0]->blok . ' - ' . $getPreOrder[0]->nomor . ' telah diubah'
            );
        } else {
            return redirect('/login');
        }
    }

    function preOrderForms()
    {
        $getPreOrder = $this->preOrder->getPreOrderWhereAllOrderByJoinProjekUserRumahClusterPelangganKategoriUser(
            '*',
            'pre_order.id_user_admin',
            '=',
            session::get('user'),
            'pre_order.tgl_input_po',
            'desc'
        );
        // dd(session::get('user'));
        $getProjek = $this->projek->getProjekAll(
            '*',
        );
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            $projekUser = $this->userProjek->getProjectUserWhere(
                'user_admin.id_user_admin',
                '=',
                session::get('user')
            );

            return view(
                'preOrder',
                compact(
                    'user',
                    'projekUser',
                    'getPreOrder',
                    'getProjek'
                )
            );
        } else {
            return redirect('/login');
        }
    }

    function preOrderSelect()
    {
        if (!session()->has('guest') && !session()->has('user')) {
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        $cluster = DB::table('rumah')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->select('*')
            ->where('projek.nama_projek', '=', 'Kalm')
            ->where('status', '=', 'Available')
            ->groupBy('cluster.nama_cluster')
            ->get();
        $rumah = DB::table('rumah')
            ->select('*')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('projek.nama_projek', '=', 'Kalm')
            ->where('status', '=', 'Available')
            ->orWhere('status', '=', 'keepRefundable')
            // ->groupBy('cluster.nama_cluster')
            ->get();

        //session check untuk user
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])
                ->first();
            return view('simPreOrder', compact('user', 'cluster', 'rumah'));
        }
        // session check untuk pelanggan
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            return view('simPreOrder', compact('userPelanggan', 'cluster', 'rumah'));
        }
        return view('simPreOrder', compact('cluster', 'rumah'));
    }
    function preOrderDataUser($id, $code)
    {
        $dataFunctionUser = ([
            'idrumah' => $id
        ]);

        $userData = $this->pelangganData->getAllUserPelanggan();

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])
                ->first();
            return view('simPODataPelanggan', compact('user', 'dataFunctionUser'));
        }
    }

    public function dataUserPO($id, $code)
    {
        $dataFunctionUser = $code;

        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }

        // dd($kkpr);
        // die();
        $rumah = DB::table('rumah')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('projek.nama_projek', '=', 'Kalm')
            ->where('rumah.id_rumah', '=', $id)
            ->first();

        // dd($promo);
        // die();
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])->first();

            // dd($user);
            // die();
            // return view('underMT', compact('rumah', 'tipeRumah'));
            return view('simPODataUser', compact('user', 'rumah', 'dataFunctionUser'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            // return view('underMT', compact('rumah', 'tipeRumah'));
            return view('simPODataUser', compact('userPelanggan', 'dataFunctionUser'));
        }
        return view('login');
    }

    public function simPODataUserAction(Request $request, $id_rumah)
    {
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])
                ->first();

            $checkPelanggan = DB::table('user_pelanggan')
                ->where('no_ktp_plgn', '=', $request->nik)
                ->first();
            // dd($checkPelanggan);
            $id = null;
            if (!empty($checkPelanggan)) {
                $id = $checkPelanggan->id_pelanggan;
            }
            if (empty($checkPelanggan)) {
                $dataInput = array(
                    'nama_plgn' => $request->nama,
                    'id_user_admin' => session::get('user'),
                    'pekerjaan_plgn' => $request->pekerjaan,
                    'no_ktp_plgn' => $request->nik,
                    'no_telp_plgn' => $request->telp,
                    'no_wa_plgn' => $request->wa,
                    'alamat_plgn' => $request->jalan . ', Kelurahan ' . $request->kelurahan . ', Kecamatan ' . $request->kecamatan . ', ' . $request->kota . ', ' . $request->pulau,
                    'email_plgn' => $request->email,
                    'npwp_plgn' => $request->npwp,
                    'jenis_kelamin_status' => $request->gender,
                    'status_pernikahan_plgn' => $request->statusPernikahan,
                    'tempat_lahir_plgn'         => $request->tempatLahir,
                    'tgl_lahir_plgn'            => $request->tahun."-".$request->bulan.'-'.$request->tanggal,
                );
                // dd($dataInput);
                // die();

                $this->validate($request, [
                    'nik' => 'required',
                ]);

                $id = DB::table('user_pelanggan')->insertGetId(
                    $dataInput
                );
            }
            $codeData = $request->code;
            $ktp = $request->nik;
            return redirect('/summary-po/' . $rumah->id_rumah . '/' . $id . '/' . $codeData);
            dd($ktp);
            // die();
        }
    }

    public function simSummaryPO($id_rumah, $id, $code)
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
        }
        $hargaPO;
        $randomIndex = random_int(111, 999);
        if ($code == "R") {
            $hargaPO = 2000000;
        } elseif ($code == "NR") {
            $hargaPO = 5000000;
        }

        $pelanggan = DB::table('user_pelanggan')->where([
            'id_pelanggan' => $id,
        ])->first();
        // dd($pelanggan);
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();

        $hargaPO = $hargaPO;

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])->first();
            // dd($user);
            // die();

            return view('simSummaryPO', compact('user',  'rumah', 'pelanggan', 'hargaPO', 'code'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            if ($voucher != "Tidak Ada Promo") {
                return view('simSummary', compact('userPelanggan', 'tipeRumah', 'rumah', 'promo', 'payment', 'voucher', 'pelanggan', 'kkpr'));
            } else {
                return view('simSummary', compact('userPelanggan', 'tipeRumah', 'rumah', 'payment', 'voucher', 'pelanggan', 'kkpr'));
            }
            return view('simSummary');
        }
    }

    public function simSummaryPOAction(Request $request, $id_rumah, $harga, $p, $code)
    {
        $pelanggan = DB::table('user_pelanggan')->where([
            'id_pelanggan' => $p,
        ])->first();

        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();

        $now = Carbon::now();
        $template = 'mail.mailPOPending';
        $this->validate($request, [
            'ktp' => 'required',
        ]);

        $statusPO;
        if ($code == "R") {
            $statusPO = 'refundable';
        } elseif ($code == "NR") {
            $statusPO = 'non-refundable';
        }

        $newDateTime = Carbon::now()->addDay();

        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])->first();

            $dataInput = array(
                'id_user_admin' => session::get('user'),
                'id_rumah' => $id_rumah,
                'id_pelanggan' => $pelanggan->id_pelanggan,
                'index_po' => $harga,
                'status_po' => 'pending',
                'tipe_booking_po' => $statusPO,
                'tgl_input_po' => $now,
                'expire_date' => $newDateTime
            );

            $id = DB::table('pre_order')->insertGetId(
                $dataInput
            );

            if ($rumah->status == "keepRefundable" && $code =="NR") {
                DB::table('rumah')
                ->where('id_rumah', $id_rumah)
                ->update(['status' => 'Keep']
                );
            }

            if ($rumah->status == "Available" && $code == "R") {
                DB::table('rumah')
                ->where('id_rumah', $id_rumah)
                ->update(['status' => 'keepRefundable']
                );
            }

            $dataPO = DB::table('pre_order')
            ->select('*')
            ->join('rumah','pre_order.id_rumah','=','rumah.id_rumah')
            ->where('id_pre_order','=',$id)
            ->first();

            $convertVA = strval($dataPO->va_rumah);
            $dataVA = str_split($convertVA,3);

            $accounting = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->join('departemen', 'ktgr_admin.id_departemen', '=', 'departemen.id_departemen')
                ->where('departemen.departemen', '=', "Accounting")
                ->where('user_admin.email_ua', '!=', null)
                ->get();

            $dataEmail1 = [
                'to' => $pelanggan->email_plgn,
                "subject" => "Forms Living Pre Order Kalm Residence",
                "body" => "",
                "id" => Crypt::encrypt($dataPO->id_pre_order),
                "id_rumah" => $rumah->id_rumah,
                'nama' => $pelanggan->nama_plgn,
                'blok' => $rumah->blok,
                'nomor' => $rumah->nomor,
                'harga' => $dataPO->index_po,
                'status' => $dataPO->status_po,
                'tipe' => $dataPO->tipe_booking_po,
                'tgl_input' => $dataPO->tgl_input_po,
                'expire' => $dataPO->expire_date,
                'va' => $dataVA
            ];

            $dataEmail2 = [
                'to' => $user->email_ua,
                "subject" => "Forms Living Pre Order Kalm Residence",
                "body" => "",
                "id" => Crypt::encrypt($dataPO->$id_pre_order),
                "id_rumah" => $rumah->id_rumah,
                'nama' => $pelanggan->nama_plgn,
                'blok' => $rumah->blok,
                'nomor' => $rumah->nomor,
                'harga' => $dataPO->index_po,
                'status' => $dataPO->status_po,
                'tipe' => $dataPO->tipe_booking_po,
                'tgl_input' => $dataPO->tgl_input_po,
                'expire' => $dataPO->expire_date,
                'va' => $dataVA
            ];

            $dataEmail3 = null;
            foreach ($accounting as $accounting) {
                $dataEmail3 = [
                    'to' => $accounting->email_ua,
                    "subject" => "Forms Living",
                    "body" => "",
                    "body" => "",
                    'nama' => $pelanggan->nama_plgn,
                    'blok' => $rumah->blok,
                    'nomor' => $rumah->nomor,
                ];
                try {
                    // $MailAtt = ();
                    // Mail::to($pelanggan->email_plgn)->send(new MailAttachment($dataEmail1, $template));
                    // Mail::to($accounting->email_ua)->send(new MailNotify($dataEmail3,$template));
                } catch (Exception $e) {
                    // return response()->json(['Sorry! Please try again latter']);
                }
            }

            try {
                // $MailAtt = ();
                Mail::to($pelanggan->email_plgn)->send(new MailNotify($dataEmail1, $template));
                Mail::to($user->email_ua)->send(new MailNotify($dataEmail2,$template));

            } catch (Exception $e) {
                // return response()->json(['Sorry! Please try again latter']);
            }

            return redirect('/congratulation')->with(compact('rumah', 'pelanggan', 'dataInput'), 'success', 'Data has been send!');
            // dd($user);
            // die();
        }
    }

    public function confirmationPaymentEmail($id){
        $decryptedID = Crypt::decrypt($id);

            $dataUser = DB::table('rumah')
            ->join('pre_order','rumah.id_rumah','=','pre_order.id_rumah')
            ->join('user_pelanggan','pre_order.id_pelanggan','=','user_pelanggan.id_pelanggan')
            ->where('pre_order.id_pre_order','=',$id)
            ->first();

            $data =([
                'title' => 'Konfirmasi Sukses!',
                'text' => "Konfirmasi pembayaran anda telah dikirim. Mohon menunggu email balasan bahwa konfirmasi email anda telah diterima oleh kami."
            ]);

            $convertVA = strval($dataUser->va_rumah);
            $dataVA = str_split($convertVA,3);

                $template = 'mail.mailForgot';
                $dataEmail1 = [
                    'to' => $dataUser->email_plgn,
                    "subject" => "Forms Living Pre Order Kalm Residence",
                    "body" => "",
                    "id_rumah" => Crypt::encrypt($dataUser->id_rumah),
                    'nama' => $dataUser->nama_plgn,
                    'blok' => $dataUser->blok,
                    'nomor' => $dataUser->nomor,
                    'harga' => $dataUser->index_po,
                    'status' => $dataUser->status_po,
                    'tipe' => $dataUser->tipe_booking_po,
                    'tgl_input' => $dataUser->tgl_input_po,
                    'expire' => $dataUser->expire_date,
                    'va' => $dataUser->va_rumah
                ];

                DB::table('pre_order')
                ->where('id_rumah', $id)
                ->update(['status_po' => 'userconfirmed']
                );

                try {
                    // $MailAtt = ();
                    Mail::to($dataUser->email_plgn)->send(new MailNotify($dataEmail1, $template));
                    // Mail::to($user->email_ua)->send(new MailNotify($dataEmail2,$template));

                } catch (Exception $e) {
                    // return response()->json(['Sorry! Please try again latter']);
                }
                 return view('congratulation-data', compact('data'))->with('success', 'konfirmasi sudah masuk');
    }

    public function selamatPage($id)
    {
        $decryptedID = Crypt::decrypt($id);
        $dataUser = DB::table('rumah')
           ->join('pre_order','rumah.id_rumah','=','pre_order.id_rumah')
           ->join('user_pelanggan','pre_order.id_pelanggan','=','user_pelanggan.id_pelanggan')
           ->where('pre_order.id_pre_order','=',$decryptedID)
           ->first();

           $data =([
               'title' => 'Konfirmasi Sukses!',
               'text' => "Konfirmasi pembayaran anda telah dikirim. Mohon menunggu email balasan bahwa konfirmasi email anda telah diterima oleh kami."
           ]);
           
            $dataPO = DB::table('pre_order')
           ->select('*')
           ->join('rumah','pre_order.id_rumah','=','rumah.id_rumah')
           ->where('id_pre_order','=',$decryptedID)
           ->first();

           $convertVA = strval($dataPO->va_rumah);
           $dataVA = str_split($convertVA,4);

               $template = 'mail.mailPOAccept';
               $dataEmail1 = [
                   'to' => $dataUser->email_plgn,
                   "subject" => "Forms Living Pre Order Kalm Residence Diterima",
                   "body" => "",
                   "id_rumah" => Crypt::encrypt($dataUser->id_rumah),
                   'nama' => $dataUser->nama_plgn,
                   'blok' => $dataUser->blok,
                   'nomor' => $dataUser->nomor,
                   'harga' => $dataUser->index_po,
                   'status' => $dataUser->status_po,
                   'tipe' => $dataUser->tipe_booking_po,
                   'tgl_input' => $dataUser->tgl_input_po,
                   'expire' => $dataUser->expire_date,
                   'va' => $dataUser->va_rumah
               ];

               DB::table('pre_order')
               ->where('id_pre_order', $decryptedID)
               ->update(['status_po' => 'userconfirmed']
               );

               try {
                   // $MailAtt = ();
                   Mail::to($dataUser->email_plgn)->send(new MailNotify($dataEmail1, $template));
                   // Mail::to($user->email_ua)->send(new MailNotify($dataEmail2,$template));

               } catch (Exception $e) {
                   // return response()->json(['Sorry! Please try again latter']);
               }
               
               if (session()->has('user')) {
                $user = $this->userAdmin->getUserKategoriWhere(
               'user_admin.id_user_admin',
               '=',
               session::get('user')
           );
           
           return view('congratulation-data', compact('data','user'))->with('success', 'konfirmasi sudah masuk');
               
           }
                return view('congratulation-data', compact('data'))->with('success', 'konfirmasi sudah masuk');
    }

    public function testingRejectedAction(){
        $jamNow = Carbon::now();
        $dataPreOrder = $this->PreOrder->PreOrderRejected($jamNow);
        $dataUser;
        foreach ($dataPreOrder as $data) {
            $dataUser = $this->rumah->RumahPO($data->id_pre_order);

                $template = 'mail.mailPORejected';

                $dataEmail = [
                    'to' => $dataUser->email_plgn,
                    "subject" => "Forms Living Pre Order Kalm Residence Rejected",
                    "body" => "",
                    "id_rumah" => $dataUser->id_rumah,
                    'nama' => $dataUser->nama_plgn,
                    'blok' => $dataUser->blok,
                    'nomor' => $dataUser->nomor,
                    'harga' => $dataUser->index_po,
                    'status' => $dataUser->status_po,
                    'tipe' => $dataUser->tipe_booking_po,
                    'tgl_input' => $dataUser->tgl_input_po,
                    'expire' => $dataUser->expire_date,
                ];

                if ($dataUser->status == "KeepRefundable") {
                    DB::table('pre_order')
                ->where('id_rumah', $dataUser->id_rumah)
                ->update(
                    ['status' => 'Available']
                );
                }elseif($dataUser->status == "Keep"){
                    DB::table('rumah')
                    ->where('id_rumah', $dataUser->id_rumah)
                    ->update(
                        ['status' => 'KeepRefundable']
                    );
                }

                DB::table('pre_order')
                ->where('id_pre_order', $data->id_pre_order)
                ->update(
                    ['status_po' => 'rejected']
                );
            }
    }
}
