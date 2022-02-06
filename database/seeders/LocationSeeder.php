<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinceList = RajaOngkir::provinsi()->all();
        foreach ($provinceList as $provinceRow) {
            Province::create([
                'province_id' => $provinceRow['province_id'],
                'name' => $provinceRow['province'],
            ]);

            $cityList = RajaOngkir::kota()->dariProvinsi($provinceRow['province_id'])->get();
            foreach ($cityList as $cityRow) {
                City::create([
                    'province_id' => $provinceRow['province_id'],
                    'city_id' => $cityRow['city_id'],
                    'type' => $cityRow['type'],
                    'name' => $cityRow['city_name']
                ]);
            }
        }
    }
}
