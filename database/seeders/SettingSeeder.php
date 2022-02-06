<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
            [
                'key' => 'name',
                'value' => 'E-Commerce'
            ],
            [
                'key' => 'email',
                'value' => 'karyamitrausahabgr@gmail.com'
            ],
            [
                'key' => 'contact',
                'value' => '81383190190'
            ],
            [
                'key' => 'sales',
                'value' => 'Jonny Sinaga'
            ],
            [
                'key' => 'icon',
                'value' => 'icon.svg'
            ],
            [
                'key' => 'description',
                'value' => 'Rakstain is a contemporary product design boutique that creates original and unique objects, experimenting with different materials, shapes and colours.'
            ],
            [
                'key' => 'city',
                'value' => '79'
            ],
            [
                'key' => 'postal',
                'value' => '16113'
            ],
            [
                'key' => 'whatsapp',
                'value' => 'message/ICGR7QQSEFFXF1'
            ],
            [
                'key' => 'address',
                'value' => 'Ring Road Utara No. 134 Taman Yasmin VI, Bogor, Indonesia'
            ],
            [
                'key' => 'title',
                'value' => 'Find things you love here'
            ],
            [
                'key' => 'subtitle',
                'value' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni omnis harum aliquid at minima repellat repellendus, nesciunt delectus enim earum reiciendis quibusdam qui facilis assumenda in? Numquam consequatur ad architecto.'
            ],
            [
                'key' => 'instagram',
                'value' => 'al_dioooo'
            ],
            [
                'key' => 'youtube',
                'value' => 'UCscpYZ5MFkkzmV3NrS48q4A/videos'
            ],
        ];

        Setting::insert($setting);
    }
}
