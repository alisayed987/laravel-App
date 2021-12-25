<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;


class AddressController extends Controller
{
    public function getAddress($address_id)
    {
        $add = Address::where('id', $address_id)->first();
        if (!isset($add)) {
            return response()->json(['found' => false], 404);
        }
        $concat = (!($add['building_num']) ? $add['street'] : ($add['building_num'] . ' ' . $add['street'])) .
            (!($add['floor']) ? '' : ' ,floor: ' . $add['floor']) .
            (!($add['apartment_num']) ? '' : ' ,apartment: ' . $add['apartment_num']);
        return response()->json(['found' => true, 'addresses' => $concat], 200);
    }
    public function getUserAddresses($user_id)
    {
        $user_addresses = Address::where('user_id', $user_id)->get();
        if ($user_addresses->isEmpty()) {
            $res = ['found' => false];
            return response($res, 404);
        }
        $res = ['found' => true, 'address_list' => $user_addresses];
        return response()->json($res, 200);
    }
    public function deleteAddress($address_id)
    {
        $deleted = Address::where('id', $address_id)->delete();
        return response(['deleted' => $deleted], 200);
    }
    public function createAddress(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'area' => 'required',
            'street' => 'nullable',
            'building' => 'nullable',
            'floor' => 'nullable',
            'apt' => 'nullable',

        ]);
        //----Check if user exists-----------------------
        $user_email = $request->input('email');
        $user_exists = User::where('email', $user_email)->first();
        if (!isset($user_exists)) {
            return response()
                ->json(['saved' => false, 'message' => "user does not exist"], 404);
        }
        //----Check if area exists-----------------------
        $area = $request->input('area');
        $area_exists = Area::where('name', $area)->first();
        if (!isset($area_exists)) {
            return response()
                ->json(['saved' => false, 'message' => "area does not exist"], 404);
        }
        //----Create new Address----------------------------
        $address = new Address;
        $address->street = $request->input('street');
        $address->building_num = $request->input('building');
        $address->floor = $request->input('floor');
        $address->apartment_num = $request->input('apt');
        $address->user_id = $user_exists['id']; // ???
        $address->area_id = $area_exists['id']; // ???
        $check = $address->save();

        return response()
            ->json(['saved' => true, 'created_address' => $address], 200);
    }
}
