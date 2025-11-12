<?php

namespace Database\Factories;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Servico;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgendamentoFactory extends Factory
{
    protected $model = Agendamento::class;

    public function definition(): array
    {
        return [
            'cliente_id' => Cliente::inRandomOrder()->first()?->id ?? Cliente::factory(),
            'funcionario_id' => Funcionario::inRandomOrder()->first()?->id ?? Funcionario::factory(),
            'servico_id' => Servico::inRandomOrder()->first()?->id ?? Servico::factory(),
            'data_hora' => $this->faker->dateTimeBetween('now', '+10 days'),
            'status' => $this->faker->randomElement(['Pendente', 'Concluído', 'Cancelado']),
        ];
    }
}
