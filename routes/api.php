<?php

use App\Http\Controllers\C_Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::get('/getProjek',[C_Rumah::class,'getProjekApi'])->name('getProjek.api');
route::get('/getRumah/{projek}/{harga_min}/{harga_max}',[C_Rumah::class, 'getRumahWhereApi'])->name('getRumahWhere.api');
route::get('/getDetailRumah/{id_tipe_rumah}',[C_Rumah::class,'getTipeRumahApi'])->name('getTipeRumah.api');

