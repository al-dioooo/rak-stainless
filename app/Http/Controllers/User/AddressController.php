<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class AddressController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $checkAddress = DB::table('address')->where('user_id', $userId)->count();

        if ($checkAddress > 0) {
            $address = DB::table('address')->where('address.user_id', $userId)
                ->firstOrFail();

            $data = [
                'address' => $address
            ];

            return view('user.address.index', $data);
        } else {
            return view('user.address.set');
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data = [
            'id' => $id
        ];

        return view('user.address.set', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'required',
            'postal' => 'required|min:5|max:5'
        ]);

        $address = Address::findOrFail($id);
        $address->address = $request->address;
        $address->postal_code = $request->postal;

        $address->save();

        return redirect()->route('user.address.index');
    }

    public function getCity(Request $request)
    {
        $city = City::where('province_id', $request->id)->get();
        return response()->json($city);
    }

    public function getService(Request $request)
    {
        $courier = $request->courier;
        $weight = $request->weight;
        $destination = $request->city;
        $origin = Setting::where('key', 'city')->first()->value;
        $service = RajaOngkir::ongkosKirim([
            'origin' => $origin,
            'destination' => $destination,
            'weight' => ceil($weight * 1000),
            'courier' => $courier
        ])->get();

        return response()->json($service);
    }

    public function save(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'postal' => 'required|min:5|max:5'
        ]);

        Address::create([
            'user_id' => Auth::user()->id,
            'address' => $request->address,
            'postal_code' => $request->postal
        ]);

        return redirect()->route('user.address.index');
    }
}
