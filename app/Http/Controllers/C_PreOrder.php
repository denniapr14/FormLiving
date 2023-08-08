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
        $getPreOrder = $this->preOrder->getPreOrderWhereAllJoinProjekUserRumahCluster(
            '*',
            'pre_order.status_po',
            '!=',
            null
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


        $getPreOrder = $this->preOrder->getPreOrderWhereAllJoinProjekUserRumahCluster(
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
            return redirect()->back()->with(
                'success',
                'Pre order rumah ' . $getPreOrder[0]->nama_cluster.' / '.$getPreOrder[0]->blok.' - '.$getPreOrder[0]->nomor.' telah diubah'
            );
        } else {
            return redirect('/login');
        }
    }
}