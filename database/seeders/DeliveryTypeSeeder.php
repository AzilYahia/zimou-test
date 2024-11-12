<?php

namespace Database\Seeders;

use App\Models\DeliveryType;
use Illuminate\Database\Seeder;

class DeliveryTypeSeeder extends Seeder
{
    public function run()
    {
        // Create a few delivery types
        DeliveryType::create(['name' => 'Standard']);
        DeliveryType::create(['name' => 'Express']);
        DeliveryType::create(['name' => 'Same Day']);
    }
}

