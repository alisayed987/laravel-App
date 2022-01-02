<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Models\Address;
use Illuminate\Http\Response;

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


Route::get('/address/{address_id}', [AddressController::class, 'getAddress']);
Route::get('/user/address/{user_id}', [AddressController::class, 'getUserAddresses']);
Route::get('/deleteAddress/{address_id}', [AddressController::class, 'deleteAddress']);
Route::post('/createAddress', [AddressController::class, 'createAddress']);
