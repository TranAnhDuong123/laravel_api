<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use Faker\Generator as Faker;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $factory->define(Customer::class, function (Faker $faker) {
            return [
                'name_customer' => $faker->firstname,
                'phone_customer' => $faker->phoneNumber,
                'address_customer' => $faker->address,
                'email_customer' => $faker->unique()->safeEmail,
                'city_customer' => $faker->city,
            ];
        });
    }
}
