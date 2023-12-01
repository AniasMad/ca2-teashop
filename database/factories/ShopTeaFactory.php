<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tea;
use App\Models\Teashop;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShopTea>
 */
class ShopTeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teashop_id' => function () {
                return Teashop::inRandomOrder()->first()->id; //random foreign key
            },
            'tea_id' => function () {
                return Tea::inRandomOrder()->first()->id; //random foreign key
            }
        ];
    }
}
