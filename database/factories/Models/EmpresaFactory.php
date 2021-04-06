<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Empresa;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'slug_name' => $this->faker->word,
            'logo' => $this->faker->word,
            'description' => $this->faker->text,
            'active' => $this->faker->randomElement(["PUBLISHED","CANCELED","DRAFT"]),
        ];
    }
}
