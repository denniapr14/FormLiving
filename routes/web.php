<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
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

    Route::get('/', [Home::class,'index']);
    Route::get('/housing', [Home::class,'housing']);
    Route::get('/my-cart', [Home::class,'MyCart']);
    Route::get('/login', [Home::class,'login']);
    Route::post('/login', [Home::class,'loginAction'])->name('login.action');
    Route::get('/logout', [Home::class,'logout']);

    Route::get('/cluster', [Home::class,'Cluster']);
    Route::get('/detail-cluster', [Home::class,'DetailCluster']);
    Route::get('/virtual-tour', [Home::class,'VirtualTour']);



    // >>>>>>>>>>>>>>>>>>> PROFILE <<<<<<<<<<<<<<<<<<<<<<<<

    Route::get('/profile-setting', [Home::class,'ProfileSetting']);
    Route::post('/profile-setting/update', [Home::class,'ProfileSettingAction'])->name('profileSetting.action');

    Route::get('/edit-profile', [Home::class,'editProfile']);
    Route::get('/filter-result', [Home::class,'filterResult']);
    Route::get('/search-item', [Home::class,'SearchItem']);

    Route::get('/sign-up', [Home::class,'SignUp']);
    Route::post('/sign-up/create', [Home::class,'SignUpAction'])->name('sign-up.action');
    // >>>>>>>>>>>>>>>>>>> END PROFILE <<<<<<<<<<<<<<<<<<<<<<<<



    // ---------------= SIMULATION =-----------------

    Route::get('/simulation-cluster', [Home::class,'simCluster']);
    Route::get('/simulation-select-unit/{codecluster}', [Home::class,'simSelectUnit']);
    Route::get('/simulation-type/{id_rumah}', [Home::class,'simType']);
    Route::get('/simulation-modification', [Home::class,'simModif']);
    Route::get('/simulation-payment-option/{id_rumah}/{id_tipe}', [Home::class,'simPayment']);
    Route::post('/simulation-price/{id_rumah}/{id_tipe}', [Home::class, 'simPrice'])->name('simulation-price');
    Route::get('/simulation-price-payment/{id_rumah}/{id_tipe}/{payment}', [Home::class, 'simPricePayment']);
    Route::post('/simulation-price-payment/action/{id_rumah}/{id_tipe}/{payment}', [Home::class, 'simPricePaymentAction'])->name('simulation-price-payment.action');
    // Route::get('/simulation-price/store/{id_rumah}/{id_tipe}/{payment}', [Home::class,'simPriceAction'])->name('simulation-price.action');
    Route::get('/simulation-order/{id_rumah}/{id_tipe}/{payment}/{id_kkpr}', [Home::class,'simOrder']);
    Route::post('/simulation-order/store/{id_rumah}/{id_tipe}/{payment}/{id_kkpr}', [Home::class,'simOrderAction'])->name('simulation-order.action');
    Route::get('/simulation-summary/{id_rumah}/{id_tipe}/{payment}/{voucher}/{id_pelanggan}', [Home::class,'simSummary']);
    Route::post('/simulation-summary/store/{id_rumah}/{id_tipe}/{payment}/{voucher}/{id_pelanggan}', [Home::class,'simSummaryAction'])->name('simulation-sumary.action');
    Route::get('/congratulation', [Home::class,'congratulation']);




    // ------------= END SIMULATION =----------------


    // FOOTER

    Route::get('/loading-page', [Home::class,'loadingPage']);
    Route::get('/privacy', [Home::class,'Privacy']);
    Route::get('/terms', [Home::class,'Terms']);


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
Route::get('/kiosk/simulasi-kluster',function () {
    return view('kiosk/k_simCluster');
});
//2
Route::get('/kiosk/simulasi-pilih-unit',function () {
    return view('kiosk/k_simSelectUnit');
});
//3
Route::get('/kiosk/simulasi-tipe',function () {
    return view('kiosk/k_simType');
});


Route::get('/kiosk/simulasi-modifikasi',function () {
    return view('kiosk/k_simModification');
});
Route::get('/kiosk/simulasi-order',function () {
    return view('kiosk/k_simOrder');
});
Route::get('/kiosk/simulasi-pembayaran',function () {
    return view('kiosk/k_simPayment');
});
Route::get('/kiosk/simulasi-harga',function () {
    return view('kiosk/k_simPrice');
});


Route::get('/kiosk/simulasi-unit',function () {
    return view('kiosk/k_simUnit');
});
// 8
Route::get('/kiosk/simulasi-data-konfirmasi',function () {
    return view('kiosk/k_simDataConfirmation');
});

Route::get('/kiosk/loading-page',function () {
    return view('kiosk/k_loadingPage');
});
Route::get('/kiosk/projek-fasilitas',function () {
    return view('kiosk/k_projectFasilitas');
});
Route::get('/kiosk/projek-fitur',function () {
    return view('kiosk/k_projectFeatures');
});
Route::get('/kiosk/projek-nearby',function () {
    return view('kiosk/k_nearbyPlaces');
});
Route::get('/kiosk/projek-promo',function () {
    return view('kiosk/k_projectPromo');
});
Route::get('/kiosk/projek-pilih-kluster',function () {
    return view('kiosk/k_projectSelectCluster');
});
Route::get('/kiosk/projek-pilih-tipe',function () {
    return view('kiosk/k_projectSelectType');
});
Route::get('/kiosk/projek-testimoni',function () {
    return view('kiosk/k_projectTestimonial');
});
Route::get('/kiosk/pilih-kategori',function () {
    return view('kiosk/k_selectCategory');
});
Route::get('/kiosk/pilih-projek',function () {
    return view('kiosk/k_selectProject');
});
Route::get('/kiosk/splash-screen',function () {
    return view('kiosk/k_splashScreen');
});
// >>>>>>>>>>>>>>>>>>>> END KIOS K <<<<<<<<<<<<<<<<<<<<<<<<<<


// >>>>>>>>>>>>>>> DASHBOARD <<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    Route::get('/dashboard-admin', function () {
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