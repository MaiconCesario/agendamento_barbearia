<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'funcionario_id',
        'servico_id',
        'data_hora',
        'status',
        'observacao',
    ];

    protected $casts = [
        'data_hora' => 'datetime',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function barbeiro()
    {
        return $this->belongsTo(\App\Models\User::class, 'funcionario_id');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
