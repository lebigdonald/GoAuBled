<?php

namespace Database\Factories\Pages;

use App\Models\Pages\ImageText;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageTextFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImageText::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'rechercher vovtre voyage ici',
            'modelable_id' => 1,
            'modelable_type' => 'App\Models\Pages\Home',
            'image' => '/uploads/default/default.jpg',
            'thumb' => '/uploads/default/default.jpg',
            'content' => $this->faker->paragraphs(2, true),
            'section' => $this->defaultSection(),
        ];
    }

    public function defaultSection(): string
    {
        $array = ['header', 'about'];

        return $array[rand(0,1)];
    }
}
