@extends('layouts.app')
@section('title','Editar Agendamento')
@section('content')
<h1 class="text-2xl mb-4">Editar Agendamento</h1>

<form action="{{ route('agendamentos.update', $agendamento) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf @method('PUT')

    <div>
        <label class="block mb-1">Cliente</label>
        <select name="cliente_id" required class="w-full p-2 border rounded">
            @foreach($clientes as $c)
                <option value="{{ $c->id }}" @selected(old('cliente_id', $agendamento->cliente_id) == $c->id)>{{ $c->nome }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Barbeiro</label>
        <select name="barbeiro_id" required class="w-full p-2 border rounded">
            @foreach($barbeiros as $b)
                <option value="{{ $b->id }}" @selected(old('barbeiro_id', $agendamento->barbeiro_id) == $b->id)>{{ $b->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Serviço</label>
        <select name="servico_id" required class="w-full p-2 border rounded">
            @foreach($servicos as $s)
                <option value="{{ $s->id }}" @selected(old('servico_id', $agendamento->servico_id) == $s->id)>{{ $s->nome }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Data e hora</label>
        <input type="datetime-local" name="data_hora" required value="{{ old('data_hora', $agendamento->data_hora->format('Y-m-d\TH:i')) }}" class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block mb-1">Status</label>
        <select name="status" required class="w-full p-2 border rounded">
            <option value="agendado" @selected($agendamento->status==='agendado')>Agendado</option>
            <option value="confirmado" @selected($agendamento->status==='confirmado')>Confirmado</option>
            <option value="cancelado" @selected($agendamento->status==='cancelado')>Cancelado</option>
            <option value="concluido" @selected($agendamento->status==='concluido')>Concluído</option>
        </select>
    </div>

    <div>
        <label class="block mb-1">Observação</label>
        <textarea name="observacao" class="w-full p-2 border rounded">{{ old('observacao', $agendamento->observacao) }}</textarea>
    </div>

    <div>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Atualizar</button>
    </div>
</form>
@endsection
