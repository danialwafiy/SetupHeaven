<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Setup;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SetupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $title = $this->faker->sentence;
        return [
            'user_id' => User::factory()->create()->id,
            'title' => $title,   
            'detail' => $this->faker->paragraphs(3,true),
            'slug' => Str::slug($title, '-')   
        ];  
    }
}
