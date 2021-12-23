<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use stdClass;

class AddressController extends Controller
{
    public function getaddress($address_id)
    {
        $addresses = Address::select(['*'])->where('id', $address_id)->get();
        $address_list = array();
        foreach ($addresses as $address) {
            $address_list[] = ($address['building_num'] . ' ' . $address['street'] . ' ,' . $address['floor'] . ' ,' . $address['apartment_num']);
        }
        return $address_list;
    }
    public function getUserAddresses($user_id)
    {
        $user_addresses = Address::select(['street', 'building_num', 'floor', 'apartment_num'])->where('user_id', $user_id)->get();
        $address_list = array();
        foreach ($user_addresses as $user_address) {
            $address_list[] = ($user_address['building_num'] . ' ' . $user_address['street'] . ' ,' . $user_address['floor'] . ' ,' . $user_address['apartment_num']);
        }
        return ($address_list);
    }
    public function deleteAddress($address_id)
    {
        $deleted = Address::select(['*'])->where('id', $address_id)->delete();
        return $deleted;
    }
    public function createAddress(Request $request)
    {
        //----Check if user exists-----------------------
        $user_email = $request->input('email');
        $user_exists = User::select('id')->where('email', $user_email)->get();
        if (!count($user_exists)) {
            return "user does not exist";
        }
        //----Check if area exists-----------------------
        $area = $request->input('area');
        $area_exists = Area::select('id')->where('name', $area)->get();
        if (!count($area_exists)) {
            return "area does not exist";
        }
        //----Check if Address already exists-------------
        $duplicated_addresses = Address::where('addresses.street', '=', $request->input('street'))
            ->where('addresses.building_num', '=', $request->input('building'))
            ->where('addresses.floor', '=', $request->input('floor'))
            ->where('addresses.apartment_num', '=', $request->input('apt'))->get();
        if (count($duplicated_addresses)) {
            return "address already exists";
        }
        //----Create new Address----------------------------
        $address = new Address;
        $address->street = $request->input('street');
        $address->building_num = $request->input('building');
        $address->floor = $request->input('floor');
        $address->apartment_num = $request->input('apt');
        $address->user_id = $user_exists[0]['id'];
        $address->area_id = $area_exists[0]['id'];
        $check = $address->save();
        //--------------------------------------------------
        $created_address = new stdClass();
        $created_address->new_address = $address;
        $created_address->is_address_created = $check;

        return $created_address;
    }
}
