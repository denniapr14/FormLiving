<?php

namespace App\Http\Controllers;

// Model
use App\Models\UserAdmin;
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

    public function __construct()
    {

        $this->userAdmin = new UserAdmin;
        $this->userProjek = new UserProjek;
        $this->projek = new Projek;
        $this->rumah = new Rumah;
        $this->preOrder = new PreOrder;
        $this->pelangganData = new UserPelanggan;
    }

    function Preorder($projek)
    {

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
                $getPreOrder = $this->preOrder->getPreOrderWhereAllOrderByJoinProjekUserRumahClusterPelangganKategoriUser(
                    '*',
                    'user_admin.id_user_admin',
                    '=',
                    $user->id_user_admin,
                    'pre_order.tgl_input_po',
                    'desc'
                );
            } else {
                $getPreOrder = $this->preOrder->getPreOrderWhereAllOrderByJoinProjekUserRumahClusterPelangganKategoriUser(
                    '*',
                    'pre_order.status_po',
                    '!=',
                    null,
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
                    'getPreOrder'
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
            DB::table('pre_order')
                ->where('id_pre_order', $decryptedID)
                ->update(
                    $dataPreOrder
                );
            $dataRumah = [];
            $template = '';
            if ($decryptedStatus == "rejected") {
                # code...
                $dataRumah = [
                    'status' => "Available"
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
            if ($decryptedStatus == "confirmed") {
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

            ];
            // MailNotify class that is extend from Mailable class.
            try {
                Mail::to($getPreOrder[0]->email_plgn)->send(new MailNotify($data, $template));
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
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...
        }

        $cluster = DB::table('rumah')
            ->join('projek','rumah.id_projek','=','projek.id_projek')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->select('*')
            ->where('status', '=', 'available')
            ->where('projek.nama_projek', '=', 'Kalm')
            ->groupBy('cluster.nama_cluster')

            ->get();
        $rumah = DB::table('rumah')
            ->select('*')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('projek.nama_projek', '=', 'Kalm')
            ->where('status', '=', 'available')
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
    function preOrderDataUser($id,$code){
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
            ->join('projek','rumah.id_projek','=','projek.id_projek')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('rumah.status', '=', 'available')
            ->where('projek.nama_projek','=','Kalm')
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
            return view('simPOUser', compact('user', 'rumah','dataFunctionUser'));
        }
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            // dd($userPelanggan);
            // die();
            // return view('underMT', compact('rumah', 'tipeRumah'));
            return view('simPOUser', compact('userPelanggan', 'dataFunctionUser'));
        }
        return view('login');
    }

    public function simSummaryPOAction(Request $request, $id_rumah,$harga,$p,$code)
    {
        $pelanggan = DB::table('user_pelanggan')->where([
            'id_pelanggan' => $p,
        ])->first();

        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'available')
            ->where('rumah.id_rumah', '=', $id_rumah)
            ->first();

        $now = Carbon::now();
        $template = 'mail.mailPO';
        $this->validate($request, [
            'ktp' => 'required',
        ]);

        $statusPO;
        if ($code == "R") {
            $statusPO = 'refundable';
        }elseif ($code == "NR"){
            $statusPO = 'non-refundable';
        }

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
                    'tgl_input_po' => $now
                );




            DB::table('pre_order')->insert(
                $dataInput
            );

            $accounting = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
                ->join('departemen', 'ktgr_admin.id_departemen', '=', 'departemen.id_departemen')
                ->where('departemen.departemen', '=', "Accounting")
                ->where('user_admin.email_ua', '!=', null)
                ->get();

            $dataEmail1 = [
                'to' => $pelanggan->email_plgn,
                "subject" => "Forms Living",
                "body" => "",
                'nama' => $pelanggan->nama_plgn,

            ];
            $dataEmail2 = [
                'to' => $user->email_ua,
                "subject" => "Forms Living",
                "body" => "",
                "body" => "",
                'nama' => $pelanggan->nama_plgn,

            ];
            $dataEmail3 = null;
            foreach ($accounting as $accounting) {
                $dataEmail3 = [
                    'to' => $accounting->email_ua,
                    "subject" => "Forms Living",
                    "body" => "",
                    "body" => "",
                    'nama' => $pelanggan->nama_plgn,

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
                Mail::to($pelanggan->email_plgn)->send(new MailNotify($dataEmail1,$template));
                // Mail::to($user->email_ua)->send(new MailNotify($dataEmail2,$template));

            } catch (Exception $e) {
                // return response()->json(['Sorry! Please try again latter']);
            }

            return redirect('/congratulation')->with('success', 'Data has been send!');
            // dd($user);
            // die();

        }
    }

}