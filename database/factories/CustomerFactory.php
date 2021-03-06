<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'status' => 'AC',
            'created_at' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)
        ];
    }
}
