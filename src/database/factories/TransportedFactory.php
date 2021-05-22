<?php

namespace Database\Factories;

use App\Models\Transported;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransportedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transported::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'envelop',
            'number' => 5,
            'price' => 5,
        ];
    }
}
