<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'amount' => $this->faker->numberBetween(1, 100),
            'price_buy' => $this->faker->numberBetween(1, 100),
            'price_sell' => $this->faker->numberBetween(1, 100),
            'category_id' => $this->faker->numberBetween(1, 3),
            'status' => 'AC',
            'updated_at' => now()
        ];
    }
}
