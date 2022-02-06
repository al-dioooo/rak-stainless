<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Courier;
use App\Models\Payment;
use App\Models\Status;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name' => 'Pending'
            ],
            [
                'name' => 'Checking'
            ],
            [
                'name' => 'Send'
            ],
            [
                'name' => 'Sent'
            ],
            [
                'name' => 'Success'
            ],
            [
                'name' => 'Cancelled'
            ],
        ];

        $courier = [
            [
                'name' => 'JNE',
                'slug' => 'jne'
            ],
            [
                'name' => 'POS Indonesia',
                'slug' => 'post'
            ],
            [
                'name' => 'TIKI',
                'slug' => 'tiki'
            ]
        ];

        $payment = [
            [
                'company' => 'BCA',
                'type' => 'Bank',
                'name' => 'Alice Evr',
                'number' => '123412341234'
            ],
            [
                'company' => 'Go-Pay',
                'type' => 'Digital',
                'name' => 'Alice Evr',
                'number' => '123412341234'
            ]
        ];

        Payment::insert($payment);
        Status::insert($status);
        Courier::insert($courier);
    }
}
