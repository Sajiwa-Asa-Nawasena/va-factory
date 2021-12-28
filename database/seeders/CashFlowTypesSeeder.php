<?php

namespace Database\Seeders;

use App\Models\CashFlowType;
use Illuminate\Database\Seeder;

class CashFlowTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cashFlowTypes = [
            array('name' => 'KAS MASUK', 'description' => 'Sejumlah dana yang diterima oleh perusahaan dari client baik melalui transfer maupun pembayaran tunai.'),
            array('name' => 'KAS KELUAR', 'description' => 'Sejumlah dana yang dikeluarkan oleh perusahaan untuk keperluan tertentu.')
        ];

        foreach ($cashFlowTypes as $cashFlowType) {
            CashFlowType::create($cashFlowType);
        }
    }
}
