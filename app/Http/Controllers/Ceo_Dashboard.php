<?php

namespace App\Http\Controllers;

// Model

// Controller
// =======================
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;
use PDF;



class Ceo_Dashboard extends Controller
{
    //
    public function __construct()
    {
        if (!session()->has('user')) {
            return redirect('/login');
        }
    }

    public function index()
    {
        $fp = DB::table('formulir_pesanan')
            ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->where('formulir_pesanan.status_fp', '!=', 'nonactive')
            ->orderBy('formulir_pesanan.tgl_input_fp', 'desc')
            ->get();

        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')

            ->get();

        $agentWithCompany = DB::table('user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->select(DB::raw('COUNT(user_admin.id_user_admin) as count'))
            ->where([
                'ktgr_admin.kategori' => "AgentWithCompany",
                'user_admin.status_ua' => "aktif",
            ])
            ->first();
        $agentWithoutCompany = DB::table('user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->select(DB::raw('COUNT(user_admin.id_user_admin) as count'))
            ->where([
                'ktgr_admin.kategori' => "AgentWithoutCompany",
                'user_admin.status_ua' => "aktif",
            ])
            ->first();
        $closingAll = DB::table('formulir_pesanan')
            ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->select(DB::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
            ->first();

        $closing = DB::table('formulir_pesanan')
            ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->whereMonth('formulir_pesanan.tgl_input_fp', now()->month)
            ->select(DB::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
            ->first();

        $remainHouse = DB::table('rumah')
            ->select(DB::raw('COUNT(rumah.id_rumah) as count'))
            ->where([

                'status' => "Available",
            ])
            ->first();

        $promo = DB::table('promo')
            ->leftJoin('cluster', 'promo.codecluster', '=', 'cluster.codecluster')
            ->leftJoin('rumah', 'promo.id_rumah', '=', 'rumah.id_rumah')
            ->get();

        if (session()->has('user')) {

            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', session::get('user'))

                ->first();
            $projekUser = DB::table('user_projek')
                ->join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
                ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->get();

            return view('Ceo.dashboard', compact(
                'user',
                'fp',
                'promo',
                'agentWithCompany',
                'agentWithoutCompany',
                'closingAll',
                'closing',
                'remainHouse',
                'projekUser',
                'rumah',
            ));
        } else {

            return redirect('/login');
        }
        # code...
    }

    public function addPromoRumah()
    {

        // $cluster = DB::table('cluster')
        //     ->get();
        $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->where('status', '=', 'Available')
            ->get();

        if (session()->has('user')) {

            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', session::get('user'))

                ->first();
            $projekUser = DB::table('user_projek')
                ->join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
                ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->get();

            return view('Ceo.addPromoRumah', compact(
                'user',

                'rumah',
                'projekUser'
            ));
        } else {

            return redirect('/login');
        }
    }

    public function addPromoRumahAction(Request $request)
    {
        if (session()->has('user')) {

            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', session::get('user'))

                ->first();
            $projekUser = DB::table('user_projek')
                ->join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
                ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->get();
            $dataInputRumahPromo = "";
            for ($i = 1; $i < count($request->rumah); $i++) {

                $rumah = DB::table('rumah')
                    ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
                    ->whereIn('id_rumah', $request->rumah)
                    ->get();


                $dataInputRumahPromo = array(
                    'id_rumah'  => $request->rumah,

                );
            }
            // dd($rumah);
            return view('Ceo.addPromo', compact(
                'user',
                'rumah',
                'projekUser',
                'dataInputRumahPromo'
            ));
            // dd($dataInputRumahPromo);

        } else {

            return redirect('/login');
        }
    }

    public function getPromo()
    {

        $promo = DB::table('promo')
            ->leftJoin('cluster', 'promo.codecluster', '=', 'cluster.codecluster')
            ->leftJoin('rumah', 'promo.id_rumah', '=', 'rumah.id_rumah')
            ->leftJoin('formulir_pesanan', 'promo.id_promo', '=', 'formulir_pesanan.id_promo')
            ->leftJoin('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->leftJoin('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->leftJoin('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            // ->where('formulir_pesanan.status_fp','!=','nonactive')
            ->get();

        if (session()->has('user')) {

            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', session::get('user'))

                ->first();
            $projekUser = DB::table('user_projek')
                ->join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
                ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->get();

            return view('Ceo.promo', compact(
                'user',
                'promo',
                'projekUser',
            ));
        } else {

            return redirect('/login');
        }
    }
    public function AddPromoAction(Request $request)
    {

        // $cluster = DB::table('cluster')
        //     ->get();



        if (session()->has('user')) {

            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', session::get('user'))

                ->first();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);
            $dataInputPromo = [];
            for ($i = 1; $i < count($request->id_rumah); $i++) {
                array_push( $dataInputPromo ,array(
                    'codecluster'   => $request->codecluster[$i],
                    'id_rumah'      => $request->id_rumah[$i],
                    'promo'         => $request->nama_promo,
                    'kode_promo'    => $request->kode_promo,
                    'keterangan'    => $request->ket_promo,
                    'tipe_promo'    => $request->tipe_promo,
                    'kuota_promo'   => $request->kuota_promo,
                    'img_promo'     => $imageName,
                    'tgl_aktif'     => $request->tgl_mulai,
                    'tgl_berakhir'  => $request->tgl_berakhir

                ));


                # code...
            }
            DB::table('promo')
            ->insert($dataInputPromo);



            return redirect('/Ceo/promo');
            // return view('Ceo.addPromo', compact('user', 'cluster', 'rumah'));
        } else {

            return redirect('/login');
        }
        # code...
    }
}
