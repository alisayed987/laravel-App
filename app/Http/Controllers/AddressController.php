<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use stdClass;


class AddressController extends Controller
{
    public function getAddress($address_id)
    {
        $address = Address::where('id', $address_id)->get();
        if ($address->isEmpty()) {
            return response()->json(['found' => false]);
        }
        $add = $address[0];
        $concat = (!($add['building_num']) ? $add['street'] : ($add['building_num'] . ' ' . $add['street'])) .
            (!($add['floor']) ? '' : ' ,floor: ' . $add['floor']) .
            (!($add['apartment_num']) ? '' : ' ,apartment: ' . $add['apartment_num']);
        return response()->json(['found' => true, 'addresses' => $concat]);
    }
    public function getUserAddresses($user_id)
    {
        $user_addresses = Address::where('user_id', $user_id)->get();
        if ($user_addresses->isEmpty()) {
            $res = ['found' => false];
            return response($res);
        }
        $res = ['found' => true, 'address_list' => $user_addresses];
        return response()->json($res);
    }
    public function deleteAddress($address_id)
    {
        $deleted = Address::where('id', $address_id)->delete();
        return response($deleted);
    }
    public function createAddress(Request $request)
    {
        //----Check if user exists-----------------------
        $user_email = $request->input('email');
        $user_exists = User::where('email', $user_email)->get();
        if ($user_exists->isEmpty()) {
            return response()
                ->json(['saved' => false, 'message' => "user does not exist"]);
        }
        //----Check if area exists-----------------------
        $area = $request->input('area');
        $area_exists = Area::where('name', $area)->get();
        if (($area_exists->isEmpty())) {
            return response()
                ->json(['saved' => false, 'message' => "area does not exist"]);
        }
        //----Create new Address----------------------------
        $address = new Address;
        $address->street = $request->input('street');
        $address->building_num = $request->input('building');
        $address->floor = $request->input('floor');
        $address->apartment_num = $request->input('apt');
        $address->user_id = $user_exists[0]['id']; // ???
        $address->area_id = $area_exists[0]['id']; // ???
        $check = $address->save();

        return response()
            ->json(['saved' => true, 'created_address' => $address]);
    }
}
