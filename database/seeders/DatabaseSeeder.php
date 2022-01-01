<?php

namespace Database\Seeders;

use App\Models\CashFlowType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // PermissionTableSeeder::class,
            // CreateAdminUserSeeder::class,
            // ManagePermissionsSeeder::class,
            CashFlowTypesPermissionsSeeder::class,
            PaymentTypesPermissionsSeeder::class,
            PaymentTypesSeeder::class,
            CashFlowTypesSeeder::class,
            SyncSuperRolePermissionsSeeder::class
        ]);
    }
}
