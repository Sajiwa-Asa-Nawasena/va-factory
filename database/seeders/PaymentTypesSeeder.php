<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentTypes = [
            array('name' => 'CASH', 'description' => 'Pembayaran dengan uang tunai langsung.'),
            array('name' => 'TRANSFER', 'description' => 'Pembayaran melalui transfer bank.')
        ];

        foreach ($paymentTypes as $paymentType) {
            PaymentType::create($paymentType);
        }
    }
}
