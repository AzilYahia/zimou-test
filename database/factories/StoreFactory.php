<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    protected $model = Store::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('[A-Za-z0-9]{10}'),
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'phones' => $this->faker->phoneNumber,
            'company_name' => $this->faker->company,
            'capital' => $this->faker->randomFloat(2, 1000, 10000),
            'address' => $this->faker->address,
            'register_commerce_number' => $this->faker->numerify('#####'),
            'nif' => $this->faker->numerify('###-###-###'),
            'legal_form' => $this->faker->randomDigitNotNull,
            'status' => $this->faker->randomElement([1, 2]),
            'can_update_preparing_packages' => $this->faker->boolean,
        ];
    }
}

