<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Campu;

class CampuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->text,
            'description' => $this->faker->text,
            'maps' => $this->faker->text,
            'active' => $this->faker->randomElement(["PUBLISHED","CANCELED","DRAFT"]),
        ];
    }
}
