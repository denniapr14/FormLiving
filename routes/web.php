<?php

use App\Http\Controllers\AdminAccounting;
// NEW
use App\Http\Controllers\AdminADV_Dashboard;
// ======================================

use App\Http\Controllers\AdminFormsLiving_Dashboard;
use App\Http\Controllers\AdminFormsLiving_User;


use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_PembayaranRumah;
use App\Http\Controllers\C_Rumah;
use App\Http\Controllers\C_GambarRumah;
use App\Http\Controllers\C_PreOrder;
use App\Http\Controllers\C_SuratPemesananRumah;

// ADMIN FORMS LIVING
use App\Http\Controllers\C_TipeRumah;
use App\Http\Controllers\C_UserAdmin;
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
Route::get('/login', [C_Login::class, 'login']);
Route::post('/login', [C_Login::class, 'loginAction'])->name('login.action');
Route::get('/logout', [C_Login::class, 'logout']);

Route::get('/cluster/{id_cluster}', [Home::class, 'Cluster']);
Route::get('/detail-cluster', [Home::class, 'DetailCluster']);
Route::get('/virtual-tour', [Home::class, 'VirtualTour']);

// >>>>>>>>>>>>>>>>>>> PROFILE <<<<<<<<<<<<<<<<<<<<<<<<

Route::get('/profile-setting', [Home::class, 'ProfileSetting']);
Route::get('/dashboard-profile', [Home::class, 'DashboardProfile']);
Route::get('/profile/formulir-pesanan/{id_formulir}', [Home::class, 'FormulirPesanan']);
Route::get('/profile/cetak/{id_formulir}', [Home::class, 'cetak']);
Route::get('/cari-user', [Home::class, 'Search'])->name('search.action');
Route::post('/profile-setting/update', [Home::class, 'ProfileSettingAction'])->name('profileSetting.action');

Route::get('/komisi-sales', [Home::class, 'Commission']);

Route::get('/edit-profile', [Home::class, 'editProfile']);
Route::get('/filter-result', [Home::class, 'filterResult']);
Route::get('/search-item', [Home::class, 'SearchItem']);

Route::get('/sign-up', [Home::class, 'SignUp']);
Route::post('/sign-up/create', [Home::class, 'SignUpAction'])->name('sign-up.action');
Route::get('/pre-order',[C_PreOrder::class,'preOrderForms'])->name('preOrderForms.sales');


// >>>>>>>>>>>>>>>>>>> END PROFILE <<<<<<<<<<<<<<<<<<<<<<<<



// ---------------= SIMULATION =-----------------

Route::get('/simulation-cluster', [Home::class, 'simCluster']);
Route::get('/simulation-select-unit/{codecluster}', [Home::class, 'simSelectUnit']);
Route::get('/simulation-type/{id_rumah}', [Home::class, 'simType']);
Route::get('/simulation-detail-type/{id_rumah}/{id_tipe}', [Home::class, 'simDetailType']);
Route::get('/simulation-data-pelanggan/{id_rumah}/{id_tipe}', [Home::class, 'simDataPelanggan']);
Route::post('/simulation-data-pelanggan/store/{id_rumah}/{id_tipe}', [Home::class, 'SumDataPelangganAction'])->name('dataPelanggan.action');
Route::get('/simulation-data-pelanggan/cariKuponSpesial/{id_rumah}/{id_tipe}/{id_pelanggan}/{kode_promo}', [Home::class, 'findKuponSpesial']);

Route::get('/simulation-modification', [Home::class, 'simModif']);
Route::get('/simulation-payment-option/{id_rumah}/{id_tipe}/{id_pelanggan}/{kdPromo}', [Home::class, 'simPayment']);
Route::post('/simulation-price/{id_rumah}/{id_tipe}/{id_pelanggan}/{kdPromo}', [Home::class, 'simPrice'])->name('simulation-price');

Route::get('/simulation-price-payment/{id_rumah}/{id_tipe}/{id_pelanggan}/{kdPromo}/{payment}', [Home::class, 'simPricePayment']);
Route::get('/simulation-price-payment/{id_rumah}/{id_tipe}/{id_pelanggan}/{kdPromo}/{payment}/{namaBank}', [Home::class, 'getSKBunga']);
Route::post('/simulation-price-payment/action/{id_rumah}/{id_tipe}/{id_pelanggan}/{kdPromo}/{payment}', [Home::class, 'simPricePaymentAction'])->name('simulation-price-payment.action');

// Route::get('/simulation-price/store/{id_rumah}/{id_tipe}/{payment}', [Home::class,'simPriceAction'])->name('simulation-price.action');
// Route::get('/simulation-order/{id_rumah}/{id_tipe}/{payment}/{id_kkpr}', [Home::class, 'simOrder']);
// Route::post('/simulation-order/store/{id_rumah}/{id_tipe}/{payment}/{id_kkpr}', [Home::class, 'simOrderAction'])->name('simulation-order.action');
// Route::get('/simulation-order/cariKupon/{id_rumah}/{id_tipe}/{payment}/{id_kkpr}/{kode_promo}', [Home::class, 'findKupon']);

Route::get('/simulation-summary/{id_rumah}/{id_tipe}/{id_pelanggan}/{kdPromo}/{payment}/{id_kkpr}', [Home::class, 'simSummary']);
Route::post('/simulation-summary/store/{id_rumah}/{id_tipe}/{id_pelanggan}/{kdPromo}/{payment}/{id_kkpr}', [Home::class, 'simSummaryAction'])->name('simulation-sumary.action');
Route::get('/congratulation', [Home::class, 'congratulation']);

Route::get('/MailSend', [Home::class, 'Send']);
Route::get('/WASend', [Home::class, 'SendWA']);

// ------------= END SIMULATION =----------------

Route::get('/kalm', [Home::class, 'kalm']);

// FOOTER

Route::get('/loading-page', [Home::class, 'loadingPage']);
Route::get('/privacy', [Home::class, 'Privacy']);
Route::get('/terms', [Home::class, 'Terms']);

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

// SUPER ADMIN NEW
Route::get('/dashboard-admin/{projek}', [C_Dashboard::class, 'index']);

Route::get('/rumah-admin/{projek}', [C_Rumah::class, 'index']);
Route::get('/tambah-rumah-admin/{projek}', [C_Rumah::class, 'storeRumah']);
Route::post('/tambah-rumah-action-admin', [C_Rumah::class, 'storeRumahAction'])->name('postRumah');

Route::get('/ubah-rumah-admin/{projek}/{id}', [C_Rumah::class, 'updateRumah'])->name('updateRumah.admin');
Route::post('/ubah-rumah-action-admin/ubah/{projek}/{id}', [C_Rumah::class, 'updateRumahActionNoJS'])->name('updateRumahActionNoJS.admin');
Route::post('/ubah-rumah-action-admin/{id}', [C_Rumah::class, 'updateRumahAction'])->name('updateRumahAction.admin');

route::post('/tambah-tipe-rumah/{projek}', [C_TipeRumah::class, 'storeTipeRumahAction'])->name('postTipeRumah');

Route::get('/tipe-rumah-admin/{projek}/{id}', [C_TipeRumah::class, 'tipeRumah'])->name('tipeRumah.admin');
Route::get('/tambah-tipe-rumah-admin/{projek}/{id}', [C_TipeRumah::class, 'storeTipeRumah'])->name('storeTipeRumah.admin');
route::post('/tambah-tipe-rumah/{projek}', [C_TipeRumah::class, 'storeTipeRumahAction'])->name('postTipeRumah');
Route::get('/ubah-tipe-rumah-admin/{projek}/{id}', [C_TipeRumah::class, 'updateTipeRumah'])->name('updateTipeRumah.admin');
Route::post('/tambah-tipe-rumah-admin/action/{projek}/{id}', [C_TipeRumah::class, 'updateTipeRumahAction'])
    ->name('updateTipeRumahAction.admin');

Route::get('/gambar-rumah/status/{status}/{id}', [C_GambarRumah::class, 'changeGambarRumahStatus']);

Route::get('/surat-pemesanan-rumah-admin/{projek}', [C_SuratPemesananRumah::class, 'suratPemesananRumah'])->name('suratPemesananRumah.admin');
Route::get('/ubah-surat-pemesanan-rumah/{projek}/{id}', [C_SuratPemesananRumah::class, 'editSuratPemesananRumah'])->name('editSuratPemesananRumah.admin');
Route::post('/ubah-surat-pemesanan-rumah/action/{projek}/{id}', [C_SuratPemesananRumah::class, 'editSuratPemesananRumahAction'])->name('editSuratPemesananRumahAction.admin');

Route::get('/ubah-pembayaran-rumah-admin/{projek}/{id_pembayaran_rumah}', [C_PembayaranRumah::class, 'updatePembayaranRumah'])->name('editPembayaranRumah.admin');
Route::post('/ubah-pembayaran-rumah-admin/action/{projek}/{id_pembayaran_rumah}', [C_PembayaranRumah::class, 'updatePembayaranRumahAction'])->name('editPembayaranRumahAction.admin');

Route::get('/pembayaran-rumah/{projek}/{id}', [C_PembayaranRumah::class, 'pembayaranRumah'])->name('pembayaranRumah.Admin');
Route::post('/pembayaran-rumah/action/{projek}/{id}', [C_PembayaranRumah::class, 'pembayaranRumahAction'])->name('pembayaranRumahAction.Admin');

//>>>>>>>>>>>>>>>>>>Pre-Order route List<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Route::get('/PreOrderSelect',[C_PreOrder::class, 'preOrderSelect']);
Route::get('/pre-order-admin/{projek}', [C_PreOrder::class, 'preOrder'])->name('preOrder.admin');
Route::get('/pre-order-admin/payment/{projek}', [C_PreOrder::class, 'paymentPreorder'])->name('paymentPreOrder.admin');
Route::post('/pre-order-admin/payment-action/{projek}', [C_PreOrder::class, 'paymentPreOrderAction'])->name('paymentPreOrderAction.admin');
Route::get('/ubah-status-pre-order/{projek}/{id}/{status}',[C_PreOrder::class,'changeStatusPreOrder'])->name('changeStatusPreOrder.admin');

Route::get('/user-sales-agent-admin', [C_UserAdmin::class, 'userAdminSalesAgent'])->name('userSalesAgent.admin');