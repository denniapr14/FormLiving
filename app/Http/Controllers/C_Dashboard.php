<?php

namespace App\Http\Controllers;

// use App\Models\FormulirPesanan;
// use Spatie\PdfToText\Pdf;
//
// Model
use App\Models\Projek;
use App\Models\Rumah;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserProjek;
use App\Models\FormulirPesanan;

// =======================

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class C_Dashboard extends Controller
{

    public $rumah;
    public $formulirPesanan;
    public $userAdmin;
    public $userProject;
    public $projek;
    public $userMenu;
    public function __construct()
    {
        $this->rumah = new Rumah;
        $this->formulirPesanan = new FormulirPesanan;
        $this->userAdmin = new UserAdmin;
        $this->userProject = new UserProjek;
        $this->projek = new Projek;
        $this->userMenu = new UserMenu;
    }

    public function index($projek)
    {

        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $fp = $this->formulirPesanan->getFormulirPesananProjekJoin6Where2(
            'formulir_pesanan.status_fp',
            '!=',
            'nonactive',
            'projek.nama_projek',
            '=',
            $projek,
            'formulir_pesanan.tgl_input_fp',
            'desc'
        );
        $getRumah = $this->rumah->getRumahProjekWhereAll('projek.nama_projek', '=', $projek);
        $rumah = $this->rumah->getRumahProjekWhereAll('projek.nama_projek', '=', $projek);
        $arrWithCompany = array(
            'ktgr_admin.kategori' => "AgentWithCompany",
            'user_admin.status_ua' => "aktif",
        );
        $arrWithoutCompany = array(
            'ktgr_admin.kategori' => "AgentWithoutCompany",
            'user_admin.status_ua' => "aktif",
        );

        $agentWithCompany = $this->userAdmin->getUserJoinCountWhere($arrWithCompany);
        $agentWithoutCompany = $this->userAdmin->getUserJoinCountWhere($arrWithoutCompany);
        // dd($agentWithoutCompany);

        $whereRemainHouse = [
            'status' => 'Available',
            'nama_projek' => $projek,
        ];
        $remainHouse = $this->rumah->RemainHouseJoinProjek($whereRemainHouse);

        if (session()->has('user')) {

            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', session::get('user'));

            $projekUser = $this->userProject->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));

            $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
                'user_menu.status_um' => 'aktif',
                'user_menu.id_user_admin' => session::get('user')
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
            // if (empty($getUserMenu) || $getUserMenu == '') {
            //     return redirect('/login')->with('danger','Kamu tidak memiliki akses ke halaman ini');
            // }
            // dd($getUserMenu);
            if (
                $user->kategori == 'Sales' ||
                $user->kategori == 'SalesAgent' ||
                $user->kategori == 'Agent' ||
                $user->kategori == 'AgentCompany' ||
                $user->kategori == 'AdminAgentCompany'
            ) {
                $whereClosing = [
                    'user_admin.id_user_admin' => $user->id_user_admin,
                    'projek.nama_projek' => $projek
                ];
                $whereClosingAll = [
                    'user_admin.id_user_admin' => $user->id_user_admin,
                    'projek.nama_projek' => $projek
                ];
                $closingAll = $this->formulirPesanan->getFormulirPesananJoin5CountWhereUser($whereClosingAll);

                $closing = $this->formulirPesanan->getFormulirPesananJoin5CountWhereMonth(
                    'formulir_pesanan.tgl_input_fp',
                    now()->month,
                    $whereClosing

                );

                # code...
            } else {
                $closingAll = $this->formulirPesanan->getFormulirPesananJoin5CountWhereProjek(['projek.nama_projek' => $projek]);

                $closing = $this->formulirPesanan->getFormulirPesananJoin5CountWhereMonthProjek(
                    'formulir_pesanan.tgl_input_fp',
                    now()->month,
                    ['projek.nama_projek' => $projek]
                );
            }

            return view(
                'V_Admin.dashboard',
                compact(
                    'user',
                    'projekUser',
                    'fp',
                    'rumah',
                    'agentWithCompany',
                    'agentWithoutCompany',
                    'closingAll',
                    'closing',
                    'remainHouse',
                    'getRumah',
                    'getProjek',
                    'getUserMenu',

                )
            );
        } else {

            return redirect('/login');
        }
    }
}
