<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Rak Stainless',
                'email' => 'admin@rak-stainless.com',
                'password' => bcrypt('rakstainless'),
                'role' => 'admin'
            ],
            [
                'name' => 'Alice Evergarden',
                'email' => 'alice@mydrive.id',
                'password' => bcrypt('aldio1234'),
                'role' => 'admin'
            ],
        ];

        User::insert($user);
    }
}
