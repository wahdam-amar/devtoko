<?php

namespace Database\Factories;

use App\Models\Jasa;
use Illuminate\Database\Eloquent\Factories\Factory;

class JasaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jasa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'status' => 'AC',
            'price' => $this->faker->numberBetween($min = 1500, $max = 6000),
        ];
    }
}
