<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CashFlowTypesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cashFlowTypes = [
            'cash.flow.types.create',
            'cash.flow.types.view',
            'cash.flow.types.update',
            'cash.flow.types.delete'
        ];

        foreach ($cashFlowTypes as $cashFlowType) {
            Permission::create(['name' => $cashFlowType]);
        }
    }
}
