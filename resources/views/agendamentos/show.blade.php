@extends('layouts.app')
@section('title','Detalhes do Agendamento')
@section('content')
<h1 class="text-2xl mb-4">Detalhes</h1>

<div class="bg-white p-6 rounded shadow">
    <p><strong>Data / Hora:</strong> {{ $agendamento->data_hora->format('d/m/Y H:i') }}</p>
    <p><strong>Cliente:</strong> {{ $agendamento->cliente->nome }}</p>
    <p><strong>Barbeiro:</strong> {{ $agendamento->barbeiro->name }}</p>
    <p><strong>Serviço:</strong> {{ $agendamento->servico->nome }} — R$ {{ number_format($agendamento->servico->preco,2,',','.') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($agendamento->status) }}</p>
    <p><strong>Observação:</strong> {{ $agendamento->observacao }}</p>

    <div class="mt-4">
        <a href="{{ route('agendamentos.edit', $agendamento) }}" class="bg-blue-600 text-white px-3 py-1 rounded">Editar</a>
        <a href="{{ route('agendamentos.index') }}" class="ml-2">Voltar</a>
    </div>
</div>
@endsection
