<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PaymentTypesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentTypes = [
            'payment.types.create',
            'payment.types.view',
            'payment.types.update',
            'payment.types.delete'
        ];

        foreach ($paymentTypes as $paymentType) {
            Permission::create(['name' => $paymentType]);
        }
    }
}
