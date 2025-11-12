<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Servico;
use App\Models\Agendamento;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Cria o admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@barbearia.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        // Cria 3 barbeiros
        $funcionarios = Funcionario::factory(3)->create();

        // Cria um usuário para cada barbeiro
        foreach ($funcionarios as $func) {
            User::create([
                'name' => $func->nome,
                'email' => $func->email,
                'password' => Hash::make('123456'),
                'role' => 'barbeiro',
                'funcionario_id' => $func->id,
            ]);
        }

        // Cria 10 clientes
        $clientes = Cliente::factory(10)->create();

        // Cria 5 serviços
        $servicos = Servico::factory(5)->create();

        // Cria 20 agendamentos aleatórios
        foreach (range(1, 20) as $i) {
            Agendamento::create([
                'cliente_id' => $clientes->random()->id,
                'funcionario_id' => $funcionarios->random()->id,
                'servico_id' => $servicos->random()->id,
                'data_hora' => now()->addDays(rand(0, 10))->setTime(rand(8, 18), [0, 30][rand(0, 1)]),
                'status' => fake()->randomElement(['Pendente', 'Concluído', 'Cancelado']),
            ]);
        }
    }
}
