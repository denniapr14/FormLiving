<?php

namespace App\Http\Controllers;

// Model
use App\Models\UserAdmin;
use App\Models\UserProjek;
use App\Models\Projek;
use App\Models\Rumah;
use App\Models\PreOrder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class C_PreOrder extends Controller
{
    public $userAdmin;
    public $userProjek;
    public $projek;
    public $rumah;
    public $preOrder;

    public function __construct()
    {

        $this->userAdmin = new UserAdmin;
        $this->userProjek = new UserProjek;
        $this->projek = new Projek;
        $this->rumah = new Rumah;
        $this->preOrder = new PreOrder;
    }
    //
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
        $getPreOrder = $this->preOrder->getPreOrderWhereAllOrderByJoinProjekUserRumahClusterPelangganKategoriUser(
            '*',
            'pre_order.status_po',
            '!=',
            null,
            'pre_order.tgl_input_po',
            'desc'
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
            $dataPreOrder =[
                'status_po' => $decryptedStatus,
                'tgl_update_po' => $indoTime
            ];
            DB::table('pre_order')
            ->where('id_pre_order', $decryptedID)
            ->update(
                $dataPreOrder
            );
            $dataRumah = [
                'status' => "Available"
            ];
            DB::table('rumah')
            ->where('id_rumah', $getPreOrder[0]->id_rumah)
            ->update(
                $dataRumah
            );


            return redirect()->back()->with(
                'success',
                'Pre order rumah ' . $getPreOrder[0]->nama_cluster.' / '.$getPreOrder[0]->blok.' - '.$getPreOrder[0]->nomor.' telah diubah'
            );
        } else {
            return redirect('/login');
        }
    }

<<<<<<< Updated upstream
    function preOrderForms() {
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

            return view('preOrder',
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
}
=======
    public function preOrderSelect()
    {
        if (!session()->has('guest') && !session()->has('user')) {
            // $hasilSess = Session::get('guest');
            // response()->json('hasilSess');
            return redirect("/login")->with('error', "You not sign in or sign up!");
            # code...
        }

        $cluster = DB::table('rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->select('*')
            ->where('status', '=', 'available')
            ->where('projek.nama_projek','=','Greenland')
            ->groupBy('cluster.nama_cluster')

            ->get();
        $rumah = DB::table('rumah')
        ->select('*')
        ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
        ->join('cluster','rumah.codecluster','=','cluster.codecluster')
        ->where('projek.nama_projek','=','Greenland')
        ->where('status','=','available')
        // ->groupBy('cluster.nama_cluster')
        ->get();

        //session check untuk user
        if (session()->has('user')) {
            $user = \App\Models\UserAdmin::where([
                'id_user_admin' => session::get('user'),
            ])
                ->first();
            return view('simPreOrder', compact('user','cluster','rumah'));
        }
        // session check untuk pelanggan
        if (session()->has('guest')) {
            $userPelanggan = \App\Models\UserPelanggan::where([
                'id_pelanggan' => session::get('guest'),
            ])->first();
            return view('simPreOrder', compact('userPelanggan','cluster','rumah'));
        }
        return view('simPreOrder', compact('cluster','rumah'));
        # code...
    }
}
>>>>>>> Stashed changes
