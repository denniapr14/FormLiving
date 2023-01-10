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




    Route::get('/cluster', [Home::class,'Cluster']);

    // ---------------= SIMULATION =-----------------

    Route::get('/simulation-cluster', [Home::class,'simCluster']);
    Route::get('/simulation-select-unit', [Home::class,'simSelectUnit']);
    Route::get('/simulation-type', [Home::class,'simType']);
    Route::get('/simulation-modification', [Home::class,'simModif']);
    Route::get('/simulation-payment-option', [Home::class,'simPayment']);
    Route::get('/simulation-price', [Home::class,'simPrice']);
    Route::get('/simulation-order', [Home::class,'simOrder']);
    Route::get('/simulation-summary', [Home::class,'simSummary']);




    // ------------= END SIMULATION =----------------


    // FOOTER


    Route::get('/privacy', [Home::class,'Privacy']);
    Route::get('/terms', [Home::class,'Terms']);


    // END FOOTER

// >>>>>>>>>>>>>>>>>>> END HOME <<<<<<<<<<<<<<<<<<<<<<<<





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