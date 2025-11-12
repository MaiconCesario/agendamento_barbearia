<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'tipo', // 'admin' ou 'barbeiro'
    ];

    protected $hidden = [
        'senha',
    ];

    /**
     * Mutator para hash automático da senha.
     */
    public function setSenhaAttribute($value)
    {
        if (!empty($value) && substr($value, 0, 7) !== '$2y$10$') {
            $this->attributes['senha'] = Hash::make($value);
        } else {
            $this->attributes['senha'] = $value;
        }
    }

    /**
     * Um funcionário (barbeiro) pode ter vários agendamentos.
     */
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'fk_id_funcionario');
    }

    /**
     * Retorna se o funcionário é administrador.
     */
    public function isAdmin(): bool
    {
        return $this->tipo === 'admin';
    }

    /**
     * Retorna se o funcionário é barbeiro.
     */
    public function isBarbeiro(): bool
    {
        return $this->tipo === 'barbeiro';
    }
}
