<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimonial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'content' => 'La France est un pays attachant avec de magnifiques monuments et une savoureuse gastronomie',
            'photo' => '/Admin/Images/4CD5sh5YRv.jpg'
        ];
    }
}
