<?php

use App\Http\Controllers\AdminAccounting;
// NEW
use App\Http\Controllers\AdminADV_Dashboard;
// ======================================
use App\Http\Controllers\C_Brosur;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdminFormsLiving_Dashboard;
use App\Http\Controllers\AdminFormsLiving_User;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_GambarRumah;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_PembayaranRumah;
use App\Http\Controllers\C_PreOrder;
use App\Http\Controllers\C_Promo;
use App\Http\Controllers\C_Rumah;
use App\Http\Controllers\C_Simulasi;
use App\Http\Controllers\C_SuratPemesananRumah;
use App\Http\Controllers\C_TipeRumah;
use App\Http\Controllers\C_UserAdmin;
use App\Http\Controllers\C_Payment;
use App\Http\Controllers\C_Job;
use App\Http\Controllers\C_Joblist;
use App\Http\Controllers\C_GambarKerja;
use app\Http\Controllers\C_Browsur;
use App\Http\Controllers\C_SPP;
// ADMIN FORMS LIVING
use App\Http\Controllers\C_UserKategori;
use App\Http\Controllers\C_UserMenu;
use App\Http\Controllers\C_UserPelanggan;
use App\Http\Controllers\C_Checklist;
use App\Http\Controllers\Ceo_Dashboard;
// ADMIN
use App\Http\Controllers\Direktur_Dashboard;
use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// >>>>>>>>>>>>>>>>>>> HOME <<<<<<<<<<<<<<<<<<<<<<<<

Route::get('/', [Home::class, 'index']);
Route::get('/Housing/{dataProjek}', [Home::class, 'housing']);
Route::get('/my-cart', [Home::class, 'MyCart']);
Route::get('/login', [C_Login::class, 'Login']);
Route::post('/login', [C_Login::class, 'LoginAction'])->name('login.action');
Route::get('/logout', [C_Login::class, 'Logout'])->name('logout');
Route::get('/reset-password', [C_Login::class, 'emailForgot']);
Route::get('/profile/cetak/{code}/{id_formulir}', [Home::class, 'printFP']);
Route::get('/forgot/{email}', [C_Login::class, 'forgotPassword'])->name('forgot.utama');
Route::post('/forgot', [C_Login::class, 'forgotAction'])->name('forgot.action');
Route::get('/about}', [Home::class, 'About']);
Route::get('/cluster/{id_cluster}', [Home::class, 'Cluster']);
Route::get('/detail-cluster', [Home::class, 'DetailCluster']);
Route::get('/virtual-tour', [Home::class, 'VirtualTour']);

// >>>>>>>>>>>>>>>>>>> PROFILE <<<<<<<<<<<<<<<<<<<<<<<<

Route::get('/profile-setting', [Home::class, 'ProfileSetting']);
Route::get('/dashboard-profile', [Home::class, 'DashboardProfile']);
Route::get('/printSPR-ttd-non-promo.blade', [Home::class, 'FormulirPesanan']);
Route::get('/profile/cetak/{id_formulir}', [Home::class, 'printFP']);
Route::get('/cari-user', [Home::class, 'Search'])->name('search.action');
Route::post('/profile-setting/update', [Home::class, 'ProfileSettingActio1'])->name('profileSetting.action');

Route::get('/komisi-sales', [Home::class, 'Commission']);

Route::get('/edit-profile', [Home::class, 'editProfile']);
Route::get('/filter-result', [Home::class, 'filterResult']);
Route::get('/search-item', [Home::class, 'SearchItem']);

Route::get('/sign-up', [Home::class, 'SignUp']);
Route::post('/sign-up/create', [Home::class, 'SignUpAction'])->name('sign-up.action');
Route::get('/check-username', [C_Login::class, 'checkUsernameAvailability'])->name('checkUsername');
Route::get('/check-email', [C_Login::class, 'checkEmailAvailability'])->name('checkEmail');
Route::get('/pre-order', [C_PreOrder::class, 'preOrderForms'])->name('preOrderForms.sales');

// >>>>>>>>>>>>>>>>>>> END PROFILE <<<<<<<<<<<<<<<<<<<<<<<<

// ---------------= SIMULATION =-----------------

Route::get('/simulation-cluster', [C_Simulasi::class, 'simCluster'])->name('simulationCluster');

Route::get('/simulation-select-unit/{codecluster}', [Home::class, 'simSelectUnit']);

Route::get('/simulation-type/{id_rumah}', [C_Simulasi::class, 'simType'])->name('simulationTipe');
Route::get('/simulation-detail-type/{id_rumah}/{id_tipe}', [C_Simulasi::class, 'simDetailType'])->name('simulationDetailTipe');

Route::get('/simulation-modification', [Home::class, 'simModif']);

Route::get('/simulation-payment-option/{id_rumah}/{id_tipe}', [C_Simulasi::class, 'simPayment'])->name('simulationPaymentOption');
Route::post('/simulation-payment-option/action/{id_rumah}/{id_tipe}', [C_Simulasi::class, 'simPaymentAction'])->name('simulationPaymentOptionAction');

Route::get('/simulation-data-pelanggan/{id_rumah}/{id_tipe}/{id_kkpr}/{jenis}/{kdPromo}', [C_Simulasi::class, 'simDataPelanggan'])->name('simulasiPelanggan');
Route::post('/simulation-data-pelanggan/store/{id_rumah}/{id_tipe}/{id_kkpr}/{jenis}/{kdPromo}', [C_Simulasi::class, 'SimDataPelangganAction'])->name('simulasiPelanggan.action');
Route::get('/simulation-data-pelanggan/cariKuponSpesial/{id_rumah}/{id_tipe}', [C_Simulasi::class, 'FindKuponSpesial'])->name('findKuponSpesial');

Route::get('/simulation-summary/{id_rumah}/{id_tipe}/{id_kkpr}/{jenis}/{id_pelanggan}/{kdPromo}', [C_Simulasi::class, 'simSummary'])->name('simulasiSummary');
Route::post('/simulation-summary/store/{id_rumah}/{id_tipe}/{id_kkpr}/{jenis}/{id_pelanggan}/{kdPromo}', [C_Simulasi::class, 'simSummaryAction'])->name('simulationSummary.action');
Route::get('/congratulation', [Home::class, 'congratulation']);

Route::get('/simulation-price/{id_rumah}/{id_tipe}', [C_Simulasi::class, 'simPrice'])->name('simulationPrice');

Route::get('/simulation-price-payment/{id_rumah}/{id_tipe}/{payment}', [C_Simulasi::class, 'simPricePayment'])->name('simulationPricePayment');
Route::get('/simulation-price-payment/{id_rumah}/{id_tipe}/{payment}/{namaBank}', [C_Simulasi::class, 'getSKBunga'])->name('getSKBunga');
Route::post('/simulation-price-payment/action/{id_rumah}/{id_tipe}/{payment}', [C_Simulasi::class, 'simPricePaymentAction'])->name('simulation-price-payment.action');

// Route::get('/simulation-price/store/{id_rumah}/{id_tipe}/{payment}', [Home::class,'simPriceAction'])->name('simulation-price.action');
// Route::get('/simulation-order/{id_rumah}/{id_tipe}/{payment}/{id_kkpr}', [Home::class, 'simOrder']);
// Route::post('/simulation-order/store/{id_rumah}/{id_tipe}/{payment}/{id_kkpr}', [Home::class, 'simOrderAction'])->name('simulation-order.action');
// Route::get('/simulation-order/cariKupon/{id_rumah}/{id_tipe}/{payment}/{id_kkpr}/{kode_promo}', [Home::class, 'findKupon']);

Route::get('/MailSend', [Home::class, 'Send']);
Route::get('/WASend', [Home::class, 'SendWA']);

// ------------= END SIMULATION =----------------

Route::get('/kalm', [Home::class, 'kalm']);

// FOOTER

Route::get('/loading-page', [Home::class, 'loadingPage']);
Route::get('/privacy', [Home::class, 'Privacy']);
Route::get('/terms', [Home::class, 'Terms']);
Route::get('/aboutUs', [Home::class, 'About']);

Route::get('/cetak/{id_formulir}', [Home::class, 'PrintFP']);
// END FOOTER

// >>>>>>>>>>>>>>>>>>> END HOME <<<<<<<<<<<<<<<<<<<<<<<<

// >>>>>>>>>>>>>>>>>>>> KIOS K <<<<<<<<<<<<<<<<<<<<<<<<<<

Route::get('/kiosk/congratulation', function () {
    return view('kiosk/k_congratulation');
});

Route::get('/kiosk/full-video', function () {
    return view('kiosk/k_fullWidthVideo');
});

// 0
Route::get('/kiosk/unit', function () {
    return view('kiosk/k_unit');
});
// 1
Route::get('/kiosk/simulasi-kluster', function () {
    return view('kiosk/k_simCluster');
});
// 2
Route::get('/kiosk/simulasi-pilih-unit', function () {
    return view('kiosk/k_simSelectUnit');
});
// 3
Route::get('/kiosk/simulasi-tipe', function () {
    return view('kiosk/k_simType');
});

Route::get('/kiosk/simulasi-modifikasi', function () {
    return view('kiosk/k_simModification');
});
Route::get('/kiosk/simulasi-order', function () {
    return view('kiosk/k_simOrder');
});
Route::get('/kiosk/simulasi-pembayaran', function () {
    return view('kiosk/k_simPayment');
});
Route::get('/kiosk/simulasi-harga', function () {
    return view('kiosk/k_simPrice');
});

Route::get('/kiosk/simulasi-unit', function () {
    return view('kiosk/k_simUnit');
});
// 8
Route::get('/kiosk/simulasi-data-konfirmasi', function () {
    return view('kiosk/k_simDataConfirmation');
});

Route::get('/kiosk/loading-page', function () {
    return view('kiosk/k_loadingPage');
});
Route::get('/kiosk/projek-fasilitas', function () {
    return view('kiosk/k_projectFasilitas');
});
Route::get('/kiosk/projek-fitur', function () {
    return view('kiosk/k_projectFeatures');
});
Route::get('/kiosk/projek-nearby', function () {
    return view('kiosk/k_nearbyPlaces');
});
Route::get('/kiosk/projek-promo', function () {
    return view('kiosk/k_projectPromo');
});
Route::get('/kiosk/projek-pilih-kluster', function () {
    return view('kiosk/k_projectSelectCluster');
});
Route::get('/kiosk/projek-pilih-tipe', function () {
    return view('kiosk/k_projectSelectType');
});
Route::get('/kiosk/projek-testimoni', function () {
    return view('kiosk/k_projectTestimonial');
});
Route::get('/kiosk/pilih-kategori', function () {
    return view('kiosk/k_selectCategory');
});
Route::get('/kiosk/pilih-projek', function () {
    return view('kiosk/k_selectProject');
});
Route::get('/kiosk/splash-screen', function () {
    return view('kiosk/k_splashScreen');
});
// >>>>>>>>>>>>>>>>>>>> END KIOS K <<<<<<<<<<<<<<<<<<<<<<<<<<

// >>>>>>>>>>>>>>> DASHBOARD <<<<<<<<<<<<<<<<<<<<<<<<<<<<<

Route::get('/dashboard-admin-template', function () {
    return view('Dashboard.dashboard');
});

Route::get('/sales-analytic', function () {
    return view('Dashboard.sales_analytic');
});

Route::get('/schedule', function () {
    return view('Dashboard.schedule');
});

Route::get('/access-control', function () {
    return view('Dashboard.access_control');
});

Route::get('/agent-company', function () {
    return view('Dashboard.agent_company');
});

// >>>>>>>>>>>>>>> END DASHBOARD <<<<<<<<<<<<<<<<<<<<<<<<<<<<<

// >>>>>>>>>>>>>>> DASHBOARD ACCOUNTING <<<<<<<<<<<<<<<<<<<<<<<<<<<<<

Route::get('/dashboard-admin-accounting', [AdminAccounting::class, 'index']);
Route::get('/formulirPesanan/{id_formulir}', [AdminAccounting::class, 'formulirPesanan']);
Route::get('/formulirPesanan/store/{id_formulir}', [AdminAccounting::class, 'formulirPesananAction'])->name('ubah-formulir-pesanan.action');
Route::get('/ubah-pembayaran/{id_pembayaran}', [AdminAccounting::class, 'editPembayaran']);
Route::post('/ubah-pembayaran/post/{id_pembayaran}', [AdminAccounting::class, 'editPembayaranAction'])->name('ubah-pembayaran.action');
Route::get('/pembayaran/{id_pembayaran}', [AdminAccounting::class, 'pembayaran']);
Route::post('/pembayaran/post/{id_pembayaran}', [AdminAccounting::class, 'pembayaranAction'])->name('pembayaran.action');
Route::get('/komisi', [AdminAccounting::class, 'Commission']);

// >>>>>>>>>>>>>>> END DASHBOARD ACCOUNTING <<<<<<<<<<<<<<<<<<<<<<<<<<<<<

// >>>>>>>>>>>>>>> START DASHBOARD DIREKTUR <<<<<<<<<<<<<<<<<<<<<<<<<<<<<

Route::get('Direktur/dashboard', [Direktur_Dashboard::class, 'index']);

// >>>>>>>>>>>>>>> END DASHBOARD DIREKTUR <<<<<<<<<<<<<<<<<<<<<<<<<<<<<

// >>>>>>>>>>>>>>> DASHBOARD CEO <<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Route::get('CEO/dashboard', [Ceo_Dashboard::class, 'index']);

Route::get('CEO/promo', [Ceo_Dashboard::class, 'getPromo']);
Route::get('CEO/tambah-rumah-promo', [Ceo_Dashboard::class, 'addPromoRumah']);
Route::post('CEO/tambah-rumah-promo', [Ceo_Dashboard::class, 'addPromoRumahAction'])->name('promo-rumah.action');
Route::post('CEO/tambah-promo', [Ceo_Dashboard::class, 'addPromoAction'])->name('promo.action');
// >>>>>>>>>>>>>>> END DASHBOARD <<<<<<<<<<<<<<<<<<<<<<<<<<<<<

//  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> DASHBOARD ADMIN ADV <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

Route::get('AdminADV/dashboard', [AdminADV_Dashboard::class, 'index']);
Route::get('AdminADV/tipe-rumah/{id_rumah}', [AdminADV_Dashboard::class, 'TipeRumah']);
Route::get('AdminADV/tambah-tipe-rumah/{id_rumah}', [AdminADV_Dashboard::class, 'addTipeRumah']);

Route::get('AdminADV/gambar-tipe-rumah/{id_rumah}', [AdminADV_Dashboard::class, 'listImageTipeRumah']);
Route::get('AdminADV/tambah-gambar-tipe-rumah/{id_rumah}', [AdminADV_Dashboard::class, 'addImgTipeRumah']);

//  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> END DASHBOARD ADMIN ADV <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

// >>>>>>>>>>>>>>   DASHBOARD ADMIN FORMS LIVING    <<<<<<<<<<<<<

Route::get('AdminFormsLiving/dashboard', [AdminFormsLiving_Dashboard::class, 'index']);
Route::get('AdminFormsLiving/list-user', [AdminFormsLiving_User::class, 'listUser']);
Route::get('AdminFormsLiving/download-user', [AdminFormsLiving_User::class, 'downloadPageUser']);
// >>>>>>>>>>>>>>       END ADMIN FORMS LIVING      <<<<<<<<<<<<<

Route::get('/email/{id_formulir}', [Home::class, 'email']);


// SESION
Route::get('/set-selected-projek/{projek}', [C_Dashboard::class,'changeProjek'])->name('changeProjek.admin');

// SUPER ADMIN NEW
Route::get('/dashboard-admin/{projek}', [C_Dashboard::class, 'index'])->name('dashboard.admin');

Route::get('/rumah-admin/{projek}', [C_Rumah::class, 'index'])->name('rumah.admin');
Route::get('/tambah-rumah-admin/{projek}', [C_Rumah::class, 'storeRumah'])->name('postRumah.admin');
Route::post('/tambah-rumah-action-admin', [C_Rumah::class, 'storeRumahAction'])->name('postRumah');
Route::get('/hapus-rumah-admin/{projek}/{id}', [C_Rumah::class, 'deleteRumahAction'])->name('deleteRumah.admin');

Route::get('/ubah-rumah-admin/{projek}/{id}', [C_Rumah::class, 'updateRumah'])->name('updateRumah.admin');
Route::post('/ubah-rumah-action-admin/ubah/{projek}/{id}', [C_Rumah::class, 'updateRumahActionNoJS'])->name('updateRumahActionNoJS.admin');
Route::post('/ubah-rumah-action-admin/{id}', [C_Rumah::class, 'updateRumahAction'])->name('updateRumahAction.admin');

route::post('/tambah-tipe-rumah/{projek}', [C_TipeRumah::class, 'storeTipeRumahAction'])->name('postTipeRumah');

Route::get('/tipe-rumah-admin/{projek}/{id}', [C_TipeRumah::class, 'tipeRumah'])->name('tipeRumah.admin');
Route::get('/tambah-tipe-rumah-admin/{projek}/{id}', [C_TipeRumah::class, 'storeTipeRumah'])->name('storeTipeRumah.admin');
route::post('/tambah-tipe-rumah/{projek}', [C_TipeRumah::class, 'storeTipeRumahAction'])->name('postTipeRumah');
Route::get('/ubah-tipe-rumah-admin/{projek}/{id}', [C_TipeRumah::class, 'updateTipeRumah'])->name('updateTipeRumah.admin');
Route::post('/ubah-tipe-rumah-admin/action/{projek}/{id}', [C_TipeRumah::class, 'updateTipeRumahAction'])
    ->name('updateTipeRumahAction.admin');
Route::post('/ubah-gambar-tipe-rumah-admin/action/{projek}/{id}/{id_gambar}', [C_TipeRumah::class, 'updateImageTipeRumahAction'])
->name('updateImageTipeRumahAction.admin');
Route::get('/hapus-tipe-rumah-admin/{id}', [C_TipeRumah::class, 'deleteTipeRumahAction'])->name('deleteTipeRumah.admin');

Route::get('/gambar-rumah/status/{status}/{id}', [C_GambarRumah::class, 'changeGambarRumahStatus']);

// SURAT PEMESANAN RUMAH
Route::get('/surat-pemesanan-rumah-admin/{projek}', [C_SuratPemesananRumah::class, 'suratPemesananRumah'])->name('suratPemesananRumah.admin');
Route::get('/ubah-surat-pemesanan-rumah/{projek}/{id}', [C_SuratPemesananRumah::class, 'editSuratPemesananRumah'])->name('editSuratPemesananRumah.admin');
Route::post('/ubah-surat-pemesanan-rumah/action/{projek}/{id}', [C_SuratPemesananRumah::class, 'editSuratPemesananRumahAction'])->name('editSuratPemesananRumahAction.admin');
Route::get('/cetak-surat-pemesanan-rumah/{id}', [C_SuratPemesananRumah::class, 'cetakSuratPemesananRumah'])->name('cetakSuratPemesananRumah.admin');

Route::get('/ubah-pembayaran-rumah-admin/{projek}/{id_pembayaran_rumah}', [C_PembayaranRumah::class, 'updatePembayaranRumah'])->name('editPembayaranRumah.admin');
Route::post('/ubah-pembayaran-rumah-admin/action/{projek}/{id_pembayaran_rumah}', [C_PembayaranRumah::class, 'updatePembayaranRumahAction'])->name('editPembayaranRumahAction.admin');

Route::get('/pembayaran-rumah/{projek}/{id}', [C_PembayaranRumah::class, 'pembayaranRumah'])->name('pembayaranRumah.Admin');
Route::post('/pembayaran-rumah/action/{projek}/{id}', [C_PembayaranRumah::class, 'pembayaranRumahAction'])->name('pembayaranRumahAction.Admin');

// >>>>>>>>>>>>>>>>>>Pre-Order route List<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Route::get('/Pre-Order-User/{id}/{code}', [C_PreOrder::class, 'dataUserPO']);
Route::get('/PreOrderSelect', [C_PreOrder::class, 'preOrderSelect']);
Route::get('/pre-order-admin/{projek}', [C_PreOrder::class, 'preOrder'])->name('preOrder.admin');
Route::get('/pre-order-admin/payment/{projek}', [C_PreOrder::class, 'paymentPreorder'])->name('paymentPreOrder.admin');
Route::post('/pre-order-admin/payment-action/{projek}', [C_PreOrder::class, 'paymentPreOrderAction'])->name('paymentPreOrderAction.admin');
Route::get('/ubah-status-pre-order/{projek}/{id}/{status}', [C_PreOrder::class, 'changeStatusPreOrder'])->name('changeStatusPreOrder.admin');
Route::post('/simulation-data-pelanggan/store/{id_rumah}', [C_PreOrder::class, 'simPODataUserAction'])->name('dataPO.action');
Route::get('/summary-po/{id}/{ktp}/{code}', [C_PreOrder::class, 'simSummaryPO']);
Route::post('/po-build/store/{id_rumah}/{harga}/{pelanggan}/{code}', [C_PreOrder::class, 'simSummaryPOAction'])->name('dataPOSummary.action');
Route::get('/konfirmasi-pembayaran-po/{id}', [C_PreOrder::class, 'confirmationPaymentEmail']);
Route::get('/selamat/{id}', [C_PreOrder::class, 'selamatPage'])->name('userConfirmed');

// >>>>>>>>>>>>>>>>>>end of Pre-Order route List<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Route::get('/user-sales-agent-admin', [C_UserAdmin::class, 'userAdminSalesAgent'])->name('userSalesAgent.admin');
Route::get('/download-user-sales-admin', [C_UserAdmin::class, 'DownloadUserAdminSales'])->name('downloadUserAdminSales.admin');
Route::get('/hapus-user-admin/{id}', [C_UserAdmin::class, 'deleteUserAdmin'])->name('deleteUserAdmin.admin');


// PROMO
Route::get('/promo-admin/{projek}', [C_Promo::class, 'Promo'])->name('promo.admin');
Route::get('/tambah-rumah-promo-admin/{projek}', [C_Promo::class, 'addRumahPromo'])->name('addPromoRumah.admin');

Route::get('/cari-rumah-promo-admin/{projek}', [C_Promo::class, 'rumahPromoAutocomplete'])->name('rumahPromoAutocomplete.admin');

Route::post('/tambah-rumah-promo-admin/action/{projek}', [C_Promo::class, 'addRumahPromoAction'])->name('addPromoRumahAction.admin');
// Route::get('/tambah-promo-admin/{projek}', [C_Promo::class, 'addPromo'])->name('addPromo.admin');
Route::post('/tambah-promo-admin/action/{projek}', [C_Promo::class, 'addPromoAction'])->name('addPromoAction.admin');

Route::get('/ubah-promo-admin/{projek}/{id}', [C_Promo::class, 'updatePromo'])->name('updatePromo.admin');
Route::post('/ubah-promo-admin/action/{projek}/{id}', [C_Promo::class, 'updatePromoAction'])->name('updatePromoAction.admin');
route::get('/promo-notif/{projek}/{id}',[C_Promo::class,'promoNotif'])->name('promoNotif.admin');
route::post('/promo-notif-action/{projek}/{id}',[C_Promo::class,'promoNotifAction'])->name('promoNotifAction.admin');
route::get('/kirim-promo-notif/{projek}/{id}',[C_Promo::class,'sendPromoNotif'])->name('sendPromoNotif.admin');
route::post('/kirim-promo-notif/{projek}/{id}',[C_Promo::class,'sendPromoNotifAction'])->name('sendPromoNotifAction.admin');



// Route::get('/hapus-list-promo/{projek}/{id}',[C_ListPromo,'deleteListPromo'])->name('deleteListPromo.admin');

// PROFILEEEEEE
Route::get('/ubah-user-profile/{id}', [C_UserAdmin::class, 'updateUserProfile'])->name('updateUserProfile.admin');
Route::post('/ubah-user-profile/action/{id}', [C_UserAdmin::class, 'updateUserProfileAction'])->name('updateUserProfileAction.admin');

Route::get('/ubah-password-profile/{id}', [C_UserAdmin::class, 'updatePasswordProfile'])->name('updatePasswordProfile.admin');
Route::post('/ubah-password-profile/action/{id}', [C_UserAdmin::class, 'updatePasswordProfileAction'])->name('updatePasswordProfileAction.admin');

Route::get('/user-pelanggan-admin', [C_UserPelanggan::class, 'userPelanggan'])->name('userPelanggan.admin');
Route::get('/ubah-user-pelanggan-admin/{id}', [C_UserPelanggan::class, 'updateUserPelanggan'])->name('updateUserPelanggan.admin');
Route::post('/ubah-user-pelanggan-admin/action/{id}', [C_UserPelanggan::class, 'updateUserPelangganAction'])->name('updateUserPelangganAction.admin');

// Route::get('/user-menu-admin',[C_UserMenu::class,'userMenu'])->name('userMenu.admin');
// Route::post('/ubah-user-menu-admin/action/{id}',[C_UserMenu::class,'updateUserMenuAction'])->name('updateUserMenuAction.admin');

Route::get('/user-kategori-admin', [C_UserKategori::class, 'userKategori'])->name('userKategori.admin');
Route::post('/ubah-kategori-admin/action/{id}', [C_UserKategori::class, 'updateUserKategoriAction'])->name('updateUserKategoriAction.admin');
Route::get('/ubah-status-kategori-admin/{id}', [C_UserKategori::class, 'changeStatusUserKategori'])->name('changeStatusUserKategori.admin');
// Route::get('/ubah-hapus-kategori-admin/{id}',[C_UserKategori::class,'changeStatusUserKategori'])->name('changeStatusUserKategori.admin');
// Route::get('/ubah-status-user-menu-admin/{id}/{status}',[C_UserMenu::class,'changeStatusUserMenu'])->name('changeStatusUserMenu.admin');

Route::get('/ubah-status-user-admin/{id}/{status}', [C_UserAdmin::class, 'changeStatusUser'])->name('changeStatusUser.admin');


// JOB
Route::get('/pekerjaan/{projek}',[C_Job::class,'getJob'])->name('job.admin');
Route::get('/pekerjaanTermin/{projek}/{termin}',[C_Job::class,'getJobTermin'])->name('jobTermin.admin');
Route::get('/tambah-pekerjaan/{projek}',[C_Job::class,'addJob'])->name('addJob.admin');
Route::post('/tambah-pekerjaan/action/{projek}',[C_Job::class,'addJobAction'])->name('addJobAction.admin');
Route::get('/ubah-pekerjaan/{projek}',[C_Job::class,'editJob'])->name('updateJob.admin');
Route::post('/ubah-pekerjaan/action/{projek}/{id_job}',[C_Job::class,'editJobAction'])->name('updateJobAction.admin');
Route::get('/ubah-status-pekerjaan/{projek}',[C_Job::class,'deleteJob'])->name('deleteJob.admin');

// JOBLIST
Route::get('/rincian-pekerjaan/{projek}/{id_job}/{termin}',[C_Joblist::class,'getJoblist'])->name('joblist.admin');
Route::get('/tambah-rincian-pekerjaan/{projek}/{id_job}',[C_Joblist::class,'addJoblist'])->name('addJoblist.admin');
Route::post('/tambah-rincian-pekerjaan/action/{projek}/{id_job}',[C_Joblist::class,'addJoblistAction'])->name('addJoblistAction.admin');
Route::get('/ubah-rincian-pekerjaan/{projek}',[C_Joblist::class,'editJoblist'])->name('updateJoblist.admin');
Route::post('/ubah-rincian-pekerjaan/action/{projek}/{id_job}/{id_joblist}',[C_Joblist::class,'editJoblistAction'])->name('updateJoblistAction.admin');
Route::get('/ubah-status-pekerjaan/{projek}',[C_Joblist::class,'deleteJob'])->name('deletelistJob.admin');

// CHECKLIST
route::get('/checklist/{projek}',[C_Checklist::class,'getChecklist'])->name('checklist.admin');
route::post('/tambah-checklist/action/{projek}',[C_Checklist::class,'addChecklistAction'])->name('addChecklist.admin');
route::get('/nextTermin/{projek}/{id_rumah}',[C_Checklist::class,'nexTermin'])->name('nextTermin.admin');
route::post('/costumTermin/{projek}/{id_rumah}',[C_Checklist::class,'customTermin'])->name('customTermin.admin');
route::get('/print-checklist/{projek}/{id_rumah}',[C_Checklist::class,'printChecklist'])->name('printChecklist.admin');
route::get('/terminChecklist/{projek}/{id_rumah}',[C_Checklist::class,'getTerminChecklist'])->name('getTerminChecklist.admin');
route::get('/listChecklist/{projek}/{id_rumah}/{termin}',[C_Checklist::class,'getListChecklist'])->name('getListChecklist.admin');
route::get('/editCheclist/{projek}/{id_rumah}/{termin}/{id_checklist}',[C_Checklist::class,'editChecklist'])->name('editChecklist.admin');
route::post('/editChecklistAction/{projek}/{id_rumah}/{termin}/{id_checklist}',[C_Checklist::class,'editChecklistAction'])->name('editChecklistAction.admin');

route::post('/checkPinPendamping/{projek}/{id_rumah}/{termin}/{id_checklist}',[C_Checklist::class,'checkPinPendamping'])->name('checkPinPendamping.admin');

// Kerja
route::get('/gambarKerja/{projek}',[C_GambarKerja::class,'getGambarKerja'])->name('gambarKerja.admin');

// SPP
route::get('/buat-spp/{projek}',[C_SPP::class,'createSPP'])->name('createSPP.admin');

// TEST DOKU
Route::get('/payment', [C_Payment::class,'showPaymentForm'])->name('payment.admin');
Route::post('/generate-payment', [C_Payment::class,'generatePayment'])->name('generate.admin');
Route::get('/check-payment-status/{orderId}/{requestId}/{expTime}/{signature}', [C_Simulasi::class,'checkStatus'])->name('checkStatusPembayaran');


// Brosur
Route::get('/brosur/{projek}', [C_Brosur::class, 'index'])->name('brosur.admin');
Route::post('/addBrosurAction/{projek}', [C_Brosur::class, 'addBrosurAction'])->name('addBrosurAction.admin');
route::post('/editBrosurAction/{projek}/{id}',[C_Brosur::class,'editBrosurAction'])->name('editBrosurAction.admin');
