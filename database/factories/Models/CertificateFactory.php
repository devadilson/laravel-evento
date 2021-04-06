<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Certificate;

class CertificateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certificate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'texto_1' => $this->faker->word,
            'texto_2' => $this->faker->word,
            'texto_3' => $this->faker->word,
            'texto_4' => $this->faker->word,
            'texto_5' => $this->faker->word,
            'carga_horaria' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'assinatura_1_imagem' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'assinatura_1_nome' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'assinatura_1_texto' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'assinatura_2_imagem' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'assinatura_2_nome' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'assinatura_2_texto' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'assinatura_3_imagem' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'assinatura_3_nome' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'assinatura_3_texto' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'empresa_logo' => $this->faker->randomElement(["YES","NO"]),
            'evento_logo' => $this->faker->randomElement(["YES","NO"]),
        ];
    }
}
