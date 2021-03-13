<?php

namespace Database\Factories;

use App\Models\Ekspedisi;
use Illuminate\Database\Eloquent\Factories\Factory;

class EkspedisiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ekspedisi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'status' => 'AC',
        ];
    }
}
