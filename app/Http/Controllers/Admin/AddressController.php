<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index() {
        $checkAddress = DB::table('address_store')->count();

        if ($checkAddress < 1) {
            $province = Province::all();
        } else {
            $address = DB::table('address_store')
            ->join('city', 'city.id', '=', 'address.id_city')
            ->join('province', 'province.id', '=', 'city.id_province')
            ->select('address_store.*', 'city.name as city', 'province.name as province')
            ->first();
        }

        $data = [
            'check' => $checkAddress,
            'province' => $province,
            'address' => $address
        ];

        return view('admin.address.index', $data);
    }

    public function getCity($id) {
        $city = City::where('id_province', $id)->get();

        return response()->json($city);
    }

    public function edit($id) {
        $province = Province::all();

        $data = [
            'id' => $id,
            'province' => $province
        ];

        return view('admin.address.edit', $data);
    }

    public function save(Request $request) {
        DB::table('address_store')->insert([
            'id_city' => $request->city,
            'address' => $request->address
        ]);

        return redirect()->route('admin.address');
    }

    public function update(Request $request, $id) {
        DB::table('address_store')->where('id', $id)->update([
            'id_city' => $request->city,
            'address' => $request->address
        ]);

        return redirect()->route('admin.address');
    }
}
