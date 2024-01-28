<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use App\Models\Brosur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class C_Brosur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $userAdmin;
    public $brosur;
    public $userNotif;
    public $userProjek;

    public $projek;
    public $userMenu;
    public function __construct()
    {
        $this->brosur = new Brosur();
        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();
        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
    }
    public function index($projek)
    {
        $getProjek = $this->projek->firstProjek('*', 'nama_projek', '=', $projek);
        $getBrosur = $this->brosur->getBrosurAllJoinProjekWhere('*');
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
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

            return view('V_Admin.brosur',
                compact(
                    'user',
                    'projekUser',
                    'getUserMenu',
                    'getProjek',
                    'getBrosur'

                )
            );
        } else {
            return redirect('/login');
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addBrosurAction(Request $request, $projek)
    {
        $file = $request->file('brosur_file');

        $fileName = $file->getClientOriginalName(); // Use the original file name

        // Move the file to the public directory
        $file->move(public_path('File/brosur'), $fileName);

        // Create Brosur record
        $dataInputBrosur=[
            "id_projek" =>$request->input('id_projek'),
            'nama_brosur' => $request->input('nama_brosur'),
            'brosur_file' => $fileName,
            'link_brosur' => $request->input('link_brosur'),
            'status_brosur' => $request->input('status_brosur'),

        ];
        $this->brosur->insertBrosur($dataInputBrosur);

        return redirect()->route('brosur.admin',[$projek])->with('success', 'Brosur added successfully!');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrowsurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function editBrosurAction(Request $request, $projek,$id)
    {
        $getBrosur = $this->brosur->firstBrosur(['id_brosur'=>$id]);
        $fileCheck = null;
        // Handle file upload if a new file is provided
        if ($request->hasFile('brosur_file')) {
            $file = $request->file('brosur_file');
            $fileName = $file->getClientOriginalName();

            // Move the file to the public directory
            $file->move(public_path('brosur_files'), $fileName);
            $fileCheck = $fileName;
            // Update file path in the Brosur record

        }else{
            $fileCheck = $getBrosur->brosur_file;
        }

        $dataUpdateBrosur=[
            'nama_brosur' => $request->input('nama_brosur'),
            'link_brosur' => $request->input('link_brosur'),
            'brosur_file'   => $fileCheck,
            'status_brosur' => $request->input('status_brosur'),
        ];
        // dd($dataUpdateBrosur);
        DB::table('brosur')
        ->where('id_brosur', $id)
        ->update($dataUpdateBrosur);

        return redirect()->route('brosur.admin',[$projek])->with('success', 'Brosur updated successfully!');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Browsur  $browsur
     * @return \Illuminate\Http\Response
     */

}