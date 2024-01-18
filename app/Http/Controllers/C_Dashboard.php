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
use Illuminate\Support\Facades\Http;
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

        // testing wa

        // $sendmsg = $this->sendWhatsappMessage('081937003001', '081227476463', "test mas PHP");

        // if (strpos($sendmsg, 'Curl error') !== false) {
        //     // Handle cURL error
        //     dd($sendmsg);
        // } else {
        //     // Process the successful response
        //     dd($sendmsg);
        // }
        // dd(Session::get('selectedProjeks',)[0]);
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

        // dd($agentWithoutCompany);
        $arrWithoutCompany = array(
            'ktgr_admin.kategori' => "SalesAgent",
            'user_admin.status_ua' => "aktif",
        );
        $agentWithoutCompany = $this->userAdmin->getUserJoinCountWhere($arrWithoutCompany);

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
                'user_menu.id_kategori' => $user->id_kategori
            ])->collect();
            // dd($getUserMenu);
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

            if (
                $user->kategori == 'AdminAgentCompany'

            ) {

                $arrWithCompany = array(
                    'ktgr_admin.kategori' => "AgentCompany",
                    'user_admin.status_ua' => "aktif",
                    'user_admin.id_kepala_ua'  => session::get('user'),
                    'user_admin.id_projek'         => $getProjek->id_projek
                );

                $agentWithCompany = $this->userAdmin->getUserJoinCountWhere($arrWithCompany);
                // dd($agentWithCompany);
                $whereClosing = [

                    'user_admin.id_kepala_ua'  => session::get('user'),
                    'rumah.id_projek'       => $getProjek->id_projek,
                ];
                $whereClosingAll = [

                    'user_admin.id_kepala_ua'  => session::get('user'),
                    'rumah.id_projek'       => $getProjek->id_projek,
                ];

                $closing = $this->formulirPesanan->getFormulirPesananJoin5CountWhereMonth(
                    'formulir_pesanan.tgl_input_fp',
                    now()->month,
                    $whereClosing

                );
                $closingAll = $this->formulirPesanan->getFormulirPesananJoin5CountWhereUser($whereClosingAll);
            } elseif (
                $user->kategori == 'AdminSales'

            ) {

                $arrWithCompany = array(
                    'ktgr_admin.kategori' => "Sales",
                    'user_admin.status_ua' => "aktif",
                    'user_admin.id_kepala_ua'  => session::get('user'),
                    'user_admin.id_projek'         => $getProjek->id_projek
                );

                $agentWithCompany = $this->userAdmin->getUserJoinCountWhere($arrWithCompany);
                // dd($agentWithCompany);
                $whereClosing = [

                    'user_admin.id_kepala_ua'  => session::get('user'),
                    'rumah.id_projek'       => $getProjek->id_projek,
                ];
                $whereClosingAll = [


                    'user_admin.id_kepala_ua'  => session::get('user'),
                    'rumah.id_projek'       => $getProjek->id_projek,
                ];

                $closing = $this->formulirPesanan->getFormulirPesananJoin5CountWhereMonth(
                    'formulir_pesanan.tgl_input_fp',
                    now()->month,
                    $whereClosing

                );
                $closingAll = $this->formulirPesanan->getFormulirPesananJoin5CountWhereUser($whereClosingAll);
                // dd($closingAll);
            } elseif (
                $user->kategori == 'Sales' ||
                $user->kategori == 'SalesAgent' ||
                $user->kategori == 'Agent' ||
                $user->kategori == 'AgentCompany'

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

                # code...
            } else {
                $arrWithCompany = array(
                    'ktgr_admin.kategori' => "AgentCompany",
                    'user_admin.status_ua' => "aktif",
                );
                $arrWithoutCompany = array(
                    'ktgr_admin.kategori' => "SalesAgent",
                    'user_admin.status_ua' => "aktif",
                );

                $agentWithCompany = $this->userAdmin->getUserJoinCountWhere($arrWithCompany);
                $agentWithoutCompany = $this->userAdmin->getUserJoinCountWhere($arrWithoutCompany);
                $closingAll = $this->formulirPesanan->getFormulirPesananJoin5CountWhereProjek(['projek.nama_projek' => $projek]);

                $closing = $this->formulirPesanan->getFormulirPesananJoin5CountWhereMonthProjek(
                    'formulir_pesanan.tgl_input_fp',
                    now()->month,
                    ['projek.nama_projek' => $projek]
                );
            }

            // dd($getProjek);

            return view(
                'V_Admin.index',
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

    function changeProjek($projek)
    {

        // Store the selected project in the session array
        Session::pull('selectedProjeks', $projek);
        Session::push('selectedProjeks', $projek);
        // dd(Session::get('selectedProjeks',)[0]);
        return redirect()->route('dashboard.admin', $projek);
    }

    function sendWhatsappMessage($id_device, $no_hp, $pesan)
    {
        $api_key = 'dd14d7db385a4039ef3f18f9f5bc3b8e729f6f3b';
        $url = 'https://api.watsap.id/send-message';

        $data_post = [
            'id_device' => $id_device,
            'api-key'   => $api_key,
            'no_hp'     => $no_hp,
            'pesan'     => $pesan,
        ];

        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])
                ->post($url, $data_post);

            return $response->body();
        } catch (\Exception $e) {
            // Handle the exception if needed
            return 'Error: ' . $e->getMessage();
        }
    }
}
