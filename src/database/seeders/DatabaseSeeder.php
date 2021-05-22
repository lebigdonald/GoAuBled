<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Pages\ImageText;
use App\Models\Pages\Step;
use App\Models\Pages\StepCategorie2;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Category;
use App\Models\Question;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        ImageText::factory(3)->create();

        //Category::factory(5)->create();

        //Question::factory(10)->create();

        Admin::factory(1)->create();

        //Post::factory(10)->create(['User_id' => rand(1, 10)]);

        Testimonial::factory(6)->create(['user_id' => rand(1,3)]);

       // StepCategorie::factory(3)->create();

       // Step::factory(10)->create(['step_categories_id' => rand(1,3)]);
    }
}
