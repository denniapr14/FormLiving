<?php

namespace App\Http\Controllers;

use App\Models\UserAdmin;
use App\Models\UserProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class C_UserAdmin extends Controller
{
    public $userAdmin;
    public $userProjek;

    public function __construct() {
        $this->userAdmin = new UserAdmin;
        $this->userProjek  = new UserProjek;
    }
    function userAdminSalesAgent() {

        $whereUserAdmin = [
           'Agent','SalesAgent','AgentCompany','AdminAgentCompany'
        ];
        $getUserSales = $this->userAdmin->getUserAdminWhereIn('*', 'ktgr_admin.kategori',$whereUserAdmin);
        // dd($getUserSales);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
//   dd($user);
            return view(
                'V_Admin.userSalesAgent',
                compact(
                    'user',
                    'projekUser',
                    'getUserSales'
                )
            );
        } else {
            return redirect('/login');
        }

    }

    function UserAdminAll() {

    }
    //
}