<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Campu;
use App\Models\Empresa;
use App\Models\Evento;

class EventoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empresa_id' => Empresa::factory(),
            'campu_id' => Campu::factory(),
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'palestrante' => $this->faker->text,
            'publico' => $this->faker->text,
            'data' => $this->faker->date(),
            'carga_horaria' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'horario' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'local' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'local_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'duracao' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'capacidade' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'recursos' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'certificado' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'certificado_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'preview_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'token' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'logo' => $this->faker->word,
            'active_certficado' => $this->faker->randomElement(["PUBLISHED","DRAFT"]),
            'active' => $this->faker->randomElement(["PUBLISHED","CANCELED","DRAFT"]),
        ];
    }
}
