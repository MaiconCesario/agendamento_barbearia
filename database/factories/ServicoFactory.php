<?php

namespace Database\Factories;

use App\Models\Servico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\EloquentFactories\Factory<\App\Models\Servico>
 */
class ServicoFactory extends Factory
{
    /**
     * O modelo associado a este factory.
     *
     * @var string
     */
    protected $model = Servico::class;

    /**
     * Define o estado padrão do model.
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->randomElement(['Corte de cabelo', 'Barba', 'Sobrancelha', 'Pintura', 'Hidratação']),
            'descricao' => $this->faker->sentence(6),
            'preco' => $this->faker->randomFloat(2, 20, 150),
        ];
    }
}
