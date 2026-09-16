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

// Route::group(['prefix' => 'v1'], function () {
//     Route::group(['prefix' => 'sotk'], function () {
//         // Route::get('/all', 'SOTKController@all');
//         Route::get('/{code}', 'SOTKController@code');
//     });
//     // Route::group(['prefix' => 'asn'], function () {
//     //     Route::get('/{nip}', 'ASNController@person');
//     // });
// });

Route::group(['prefix' => 'v2'], function () {
    // Route::group(['prefix' => 'emp'], function () {
    //     Route::get('/', 'EMPController@aktif');
    //     Route::get('/cpns', 'EMPController@cpns');
    //     Route::get('/pns', 'EMPController@pns');
    //     Route::get('/pppk', 'EMPController@pppk');
    //     Route::get('/pensiun', 'EMPController@pensiun');
    //     Route::get('/pindah', 'EMPController@pindah');
    //     Route::get('/all', 'EMPController@all');
    //     Route::get('/{nip}', 'EMPController@person');
    // });
    Route::group(['prefix' => 'sipmewah'], function () {
        Route::get('/dashboard', 'DashboardSimpegController@dashboard');
        // Route::get('/aktif', 'DashboardSimpegController@aktif');
    });
});

Route::post('/login', function (Request $request) {
    if (!\Illuminate\Support\Facades\Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $user = \App\Models\User::where('email', $request->email)->firstOrFail();
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Login success',
        'access_token' => $token,
        'token_type' => 'Bearer'
    ]);
});

Route::group(['prefix' => 'v2', 'middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'sotk'], function () {
        Route::get('/{code}', 'SOTKController@code');
    });
    Route::group(['prefix' => 'asn'], function () {
        Route::get('/{nip}', 'ASNController@person');
    });
});

Route::group(['prefix' => 'v3', 'middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'emp'], function () {
        Route::get('/{nip}', 'EMPController@personJWT');
    });
});

