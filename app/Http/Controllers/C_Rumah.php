<?php

namespace App\Http\Controllers;

use App\Cluster as AppCluster;
use Illuminate\Http\Request;
use App\Mail\MailAttachment;
use App\Mail\MailNotify;
// use App\Mail\MailAttachment;

// use Spatie\PdfToText\Pdf;
// use PDF;

// Model
use App\Models\Promo;
use App\Models\Rumah;
use App\Models\Cluster;

use Illuminate\Contracts\Auth\Guard;


// =======================

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;
use PDF;

class C_Rumah extends Controller
{
    //
    public $rumah;
    public $cluster;

    public function __construct()
    {
        $this->rumah = new Rumah;
        $this->cluster = new Cluster;
    }

    function index()
    {
        $getRumah = $this->rumah->getRumahAll();

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

            return view(
                'V_Admin.rumah',
                compact(
                    'user',
                    'projekUser',
                    'getRumah',
                )
            );
        } else {

            return redirect('/login');
        }
    }
    function storeRumah()
    {
        // $getRumah = $this->rumah->getRumahAll();
        $getCluster = $this->cluster->getClusterAll();
        // dd($getRumah);
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

            return view(
                'V_Admin.addRumah',
                compact(
                    'user',
                    'projekUser',
                    'getCluster',

                )
            );
        } else {

            return redirect('/login');
        }
    }

    function storeRumahAction(Request $request)
    {



        $request->validate([

            'cluster'      => 'required',
            'blok'         => 'required',
            'nomor'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:1',
            'status'       => 'required',
            'stock'        => 'required',
        ]);

        $dataRumah = array(
            'codecluster'     => $request->cluster,
            'blok'            => $request->blok,
            'nomor'           => $request->nomor,
            'status'          => $request->status,
            'status_stock'    => $request->stock,
        );

        // $id = DB::table('rumah')->insert(
        //     $dataRumah
        // );
        $getIdRumah = $this->rumah->insertRumahId($dataRumah);
        // dd($id);
        $getRumah = $this->rumah->getRumahWhere('id_rumah', "=", $getIdRumah);

        return response()->json($getRumah);
    }

    function updateRumahAction(Request $request, $id)
    {

        $request->validate([

            'cluster'      => 'required',
            'blok'         => 'required',
            'nomor'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:1',
            'status'       => 'required',
            'stock'        => 'required',
        ]);

        $dataRumah = array(

            'codecluster'     => $request->cluster,
            'blok'            => $request->blok,
            'nomor'           => $request->nomor,
            'status'          => $request->status,
            'status_stock'    => $request->stock,
        );

        // $id = DB::table('rumah')->insert(
        //     $dataRumah
        // );
        DB::table('rumah')
                ->where('id_rumah', $id)
                ->update(
                    $dataRumah
                );


        // Update the data with the new values
        // $data->update($dataRumah);
        // $this->rumah->updateRumah($id, $dataRumah);
        // // dd($id);
        $getRumah = $this->rumah->getRumahWhere('id_rumah', "=", $id);

        return response()->json( $getRumah);
    }
}
