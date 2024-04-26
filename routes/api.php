<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v2'], function () {
    Route::group(['prefix' => 'emp'], function () {
        Route::get('/', 'EMPController@aktif');
        Route::get('/cpns', 'EMPController@cpns');
        Route::get('/pns', 'EMPController@pns');
        Route::get('/pppk', 'EMPController@pppk');
        Route::get('/pensiun', 'EMPController@pensiun');
        Route::get('/pindah', 'EMPController@pindah');
        Route::get('/all', 'EMPController@all');
        Route::get('/{nip}', 'EMPController@person');
    });
    Route::group(['prefix' => 'sipmewah'], function () {
        Route::get('/dashboard', 'DashboardSimpegController@dashboard');
        Route::get('/aktif', 'DashboardSimpegController@aktif');
    });
});
