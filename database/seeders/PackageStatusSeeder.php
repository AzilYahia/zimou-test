<?php

namespace Database\Seeders;

use App\Models\PackageStatus;
use Illuminate\Database\Seeder;

class PackageStatusSeeder extends Seeder
{
    public function run()
    {
        // Create a few package statuses
        PackageStatus::create(['name' => 'Pending']);
        PackageStatus::create(['name' => 'In Transit']);
        PackageStatus::create(['name' => 'Delivered']);
        PackageStatus::create(['name' => 'Returned']);
    }
}
