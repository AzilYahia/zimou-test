<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\Store;
use App\Models\DeliveryType;
use App\Models\PackageStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'tracking_code' => $this->faker->unique()->numerify('TRACK####'),
            'commune_id' => $this->faker->randomNumber(),
            'delivery_type_id' => DeliveryType::inRandomOrder()->first()->id, // Random delivery type
            'status_id' => PackageStatus::inRandomOrder()->first()->id, // Random package status
            'store_id' => Store::inRandomOrder()->first()->id, // Link to a random store
            'address' => $this->faker->address,
            'can_be_opened' => $this->faker->boolean,
            'name' => $this->faker->name,
            'client_first_name' => $this->faker->firstName,
            'client_last_name' => $this->faker->lastName,
            'client_phone' => $this->faker->phoneNumber,
            'client_phone2' => $this->faker->optional()->phoneNumber,
            'cod_to_pay' => $this->faker->randomFloat(2, 0, 500),
            'commission' => $this->faker->randomFloat(2, 0, 50),
            'status_updated_at' => $this->faker->dateTime,
            'delivered_at' => $this->faker->optional()->dateTime,
            'delivery_price' => $this->faker->randomFloat(2, 0, 100),
            'extra_weight_price' => $this->faker->randomNumber(),
            'free_delivery' => $this->faker->boolean,
            'packaging_price' => $this->faker->randomNumber(),
            'partner_cod_price' => $this->faker->randomFloat(2, 0, 50),
            'partner_delivery_price' => $this->faker->randomFloat(2, 0, 100),
            'partner_return' => $this->faker->randomFloat(2, 0, 50),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'price_to_pay' => $this->faker->randomFloat(2, 10, 500),
            'return_price' => $this->faker->randomFloat(2, 0, 100),
            'total_price' => $this->faker->randomFloat(2, 50, 1000),
            'weight' => $this->faker->randomNumber(),
        ];
    }
}

