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


    Route::get('/cluster', [Home::class,'Cluster']);
    Route::get('/detail-cluster', [Home::class,'DetailCluster']);
    Route::get('/virtual-tour', [Home::class,'VirtualTour']);



    // >>>>>>>>>>>>>>>>>>> PROFILE <<<<<<<<<<<<<<<<<<<<<<<<

    Route::get('/profile-setting', [Home::class,'ProfileSetting']);
    Route::get('/edit-profile', [Home::class,'editProfile']);
    Route::get('/filter-result', [Home::class,'filterResult']);
    Route::get('/search-item', [Home::class,'SearchItem']);
    Route::get('/sign-up', [Home::class,'SignUp']);
    // >>>>>>>>>>>>>>>>>>> END PROFILE <<<<<<<<<<<<<<<<<<<<<<<<



    // ---------------= SIMULATION =-----------------

    Route::get('/simulation-cluster', [Home::class,'simCluster']);
    Route::get('/simulation-select-unit', [Home::class,'simSelectUnit']);
    Route::get('/simulation-type', [Home::class,'simType']);
    Route::get('/simulation-modification', [Home::class,'simModif']);
    Route::get('/simulation-payment-option', [Home::class,'simPayment']);
    Route::get('/simulation-price', [Home::class,'simPrice']);
    Route::get('/simulation-order', [Home::class,'simOrder']);
    Route::get('/simulation-summary', [Home::class,'simSummary']);
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
