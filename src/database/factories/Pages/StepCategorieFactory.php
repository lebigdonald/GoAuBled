<?php

namespace Database\Factories\Pages;

use App\Models\Pages\StepCategorie2;
use Illuminate\Database\Eloquent\Factories\Factory;

class StepCategorieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StepCategorie2::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name
        ];
    }
}
