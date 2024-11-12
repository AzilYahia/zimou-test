<?php

namespace Database\Seeders;


use App\Models\Store;
use App\Models\Package;
use App\Models\DeliveryType;
use App\Models\PackageStatus;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    public function run()
    {
        // Create 5000 stores
        Store::factory(5000)->create()->each(function ($store) {
            \Faker\Factory::create()->unique(true);
            // Create 100 packages for each store
            Package::factory(100)->create([
                'store_id' => $store->id, // Correct store_id from current store
                'delivery_type_id' => DeliveryType::inRandomOrder()->first()->id, // Random delivery type
                'status_id' => PackageStatus::inRandomOrder()->first()->id, // Random package status
            ]);
        });
    }
}

