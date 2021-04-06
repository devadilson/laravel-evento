<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Participante;
use App\Models\Type;

class ParticipanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Participante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => $this->faker->word,
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'rgm' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'type_id' => Type::factory(),
            'active' => $this->faker->randomElement(["PUBLISHED","CANCELED"]),
        ];
    }
}
