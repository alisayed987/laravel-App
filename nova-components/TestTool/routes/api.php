<?php

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

// Route::post('/', function (Request $request) {

//     $filtered_user_addresses = Address::where([
//         ['user_id', $request['user_id']],
//         ['isOld',$request['isOld']]
//         ])->get();
//         return $filtered_user_addresses;
// });


Route::post('/search', function (Request $request) {

    $filtered_user_addresses = Address::where([
        ['user_id', $request['user_id']],
        ['isOld',$request['isOld']],
        ['street','like',$request['pattern'].'%']
        ])->get();
        return $filtered_user_addresses;
        // return $request;
});


