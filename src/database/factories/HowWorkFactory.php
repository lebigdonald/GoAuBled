<?php

namespace Database\Factories;

use App\Models\HowWork;
use Illuminate\Database\Eloquent\Factories\Factory;

class HowWorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HowWork::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'content' => $this->faker->sentence()
        ];
    }
}
