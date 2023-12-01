<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tea;
use App\Models\Brand;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tea>
 */
class TeaFactory extends Factory
{
    protected $model = Tea::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'name' => $faker->word,
            'price' => $faker->randomFloat(2, 1, 100), 
            'description' => $faker->paragraph,
            'brand_id' => function () {
                return Brand::inRandomOrder()->first()->id; //random foreign key
            },
        ];
    }
}
