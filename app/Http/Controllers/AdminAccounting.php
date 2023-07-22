<?php

namespace App\Http\Controllers;

// Model

// Controller
// =======================
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminAccounting extends Controller
{
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

            ->orderBy('formulir_pesanan.tgl_input_fp', 'desc')
            ->get();

            $rumah = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')

            ->get();
        // dd($fp);
        // die();
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

            return view('AdminAccounting.dashboard', compact(
                'user',
             'fp',
             'projekUser',
             'rumah'
            ));
        } else {

            return redirect('/login');
        }

        # code...
    }

    function Commission() {
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

            return view('AdminAccounting.commission', compact('user',

             'projekUser'
            ));
        } else {

            return redirect('/login');
        }

    }
    public function formulirPesanan($id_formulir)
    {
        $fp = DB::table('formulir_pesanan')
            ->join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'formulir_pesanan.id_rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->where('id_formulir', '=', $id_formulir)
            ->first();
        $promo = "";
        $dtPembayaran = DB::table('pembayaran_rumah')
            ->where('id_formulir', '=', $id_formulir)
            ->get();

        // dd($dtPembayaran);
        // die();
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

            return view('AdminAccounting.formulirPesanan', compact(
                'user',
                'fp',
                'dtPembayaran',
                'projekUser'
            ));
        } else {

            return redirect('/login');
        }

        # code...
    }

    public function editPembayaran($id_pembayaran)
    {
        if (session()->has('user')) {
            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', session::get('user'))

                ->first();
            $dtPembayaran = DB::table('pembayaran_rumah')
                ->where('id_pem_rumah', '=', $id_pembayaran)
                ->first();
            $projekUser = DB::table('user_projek')
                ->join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
                ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->get();
            return view('AdminAccounting.editPembayaranRumah', compact(
                'dtPembayaran',
                'user',
                'projekUser'
            ));
        } else {

            return redirect('/login');
        }
    }
    public function editPembayaranAction(Request $request, $id_pembayaran)
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
            $dtPembayaran = DB::table('pembayaran_rumah')
                ->where('id_pem_rumah', '=', $id_pembayaran)
                ->first();

            $dataUpdate = array(
                'detail_pr' => $request->detail,
                'harga_pr' => $request->harga,
                'sisa_pr' => $request->sisa,
                'status_pr' => $request->status,
                'tgl_pr' => $request->tanggal,
            );

            // dd($dataUpdate);
            // die();

            DB::table('pembayaran_rumah')
                ->where('id_pem_rumah', $id_pembayaran)
                ->update(
                    $dataUpdate
                );
            return redirect('formulirPesanan/' . $dtPembayaran->id_formulir)->with('success', 'Data has been send!');
        } else {

            return redirect('/login');
        }
    }

    public function pembayaran($id_pembayaran)
    {

        $user = DB::table('user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

            ->where('user_admin.id_user_admin', '=', session::get('user'))

            ->first();
        $dtPembayaran = DB::table('pembayaran_rumah')
            ->where('id_pem_rumah', '=', $id_pembayaran)
            ->first();
        $dtDetailPembayaran = DB::table('pembayaran_rumah')
            ->join('rincian_pembayaran', 'pembayaran_rumah.id_pem_rumah', '=', 'rincian_pembayaran.id_pem_rumah')
            ->where('pembayaran_rumah.id_pem_rumah', '=', $id_pembayaran)
            ->get();

        // dd($dtDetailPembayaran);
        // die();
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

            // return view('AdminAccounting.dashboard', compact('user', 'fp'));
            return view('AdminAccounting.pembayaranRumah', compact(
                'dtPembayaran',
                'user',
                'dtDetailPembayaran',
                'projekUser'
            ));
        } else {

            return redirect('/login');
        }
    }
    public function pembayaranAction(Request $request, $id_pembayaran)
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
            $dtPembayaran = DB::table('pembayaran_rumah')
                ->where('id_pem_rumah', '=', $id_pembayaran)
                ->first();
            $dtDetailPembayaran = DB::table('pembayaran_rumah')
                ->join('rincian_pembayaran', 'pembayaran_rumah.id_pem_rumah', '=', 'rincian_pembayaran.id_pem_rumah')
                ->where('pembayaran_rumah.id_pem_rumah', '=', $id_pembayaran)
                ->get();

            // Get the uploaded file
            $image = $request->file('image');

            $destinationPath = public_path('/thumbnail');
            // Generate a unique filename
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Resize the image
            // $resizedImage = Image::make($image)->fit(300);
            $img = Image::make($image->path());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['image']);

            // Save the resized image to disk
            Storage::put('public/Dashboard/images/pembayaran/' . $filename, $img);

            // Return a response
            return response()->json(['success' => true]);

            $user = DB::table('user_admin')
                ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

                ->where('user_admin.id_user_admin', '=', session::get('user'))

                ->first();

            $dataUpdatePembayaran = array(

                'sisa_pr' => $request->sisa,

            );

            $dataUpdateRincian = array(
                'detail_pr' => $request->detail,
                'harga_pr' => $request->harga,
                'sisa_pr' => $request->sisa,
                'status_pr' => $request->status,
                'gambar' => $resizedImage,
                'tgl_pr' => $request->tanggal,
            );

            // dd($dataUpdateRincian);
            // die();

            // DB::table('pembayaran_rumah')
            //     ->where('id_pem_rumah', $id_pembayaran)
            //     ->update(
            //         $dataUpdate
            //     );
            return redirect('formulirPesanan/' . $dtPembayaran->id_formulir)->with('success', 'Data has been send!');
        } else {

            return redirect('/login');
        }
    }

    public function formulirPesananAction(Request $request, $id_formulir)
    {
        if (session()->has('user')) {
            $fp = DB::table('formulir_pesanan')
                ->where('id_formulir', '=', $id_formulir)
                ->first();
            if ($request->validasi == "accept") {
                $dtUpdateFP = [
                    'no_fp' => $request->no_fp,
                    'status_market_fp' => $request->validasi,
                    'status_staff_acc_fp' => $request->validasi,
                    'status_admin_acc_fp' => $request->validasi,

                ];

                DB::table('formulir_pesanan')
                    ->where('id_formulir', '=', $id_formulir)
                    ->update(
                        $dtUpdateFP
                    );

                $dtUpdateRumah = [
                    'status' => 'OnProgress',
                ];

                DB::table('rumah')
                    ->where('id_rumah', '=', $fp->id_rumah)
                    ->update(
                        $dtUpdateRumah
                    );
            }
            $projekUser = DB::table('user_projek')
                ->join('projek', 'user_projek.id_projek', '=', 'projek.id_projek')
                ->join('user_admin', 'user_projek.id_user_admin', '=', 'user_admin.id_user_admin')
                ->where('user_admin.id_user_admin', '=', session::get('user'))
                ->get();
            return redirect('formulirPesanan/')->with('success', 'Data has been updated!');
        } else {

            return redirect('/login');
        }

        # code...
    }
}
