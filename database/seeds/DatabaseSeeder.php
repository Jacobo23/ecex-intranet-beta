<?php

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
        $this->call([
            BundleUnitSeeder::class,
            CarrierSeeder::class,
            MeasurementUnitSeeder::class,
            CustomerSeeder::class,
            PartNumberSeeder::class,
            SupplierSeeder::class,
        ]);
    }

    
}
