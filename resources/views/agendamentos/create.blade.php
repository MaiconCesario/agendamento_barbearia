@extends('layouts.app')
@section('title','Novo Agendamento')
@section('content')
<h1 class="text-2xl mb-4">Novo Agendamento</h1>

<form action="{{ route('agendamentos.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf

    <div>
        <label class="block mb-1">Cliente</label>
        <select name="cliente_id" required class="w-full p-2 border rounded">
            <option value="">-- selecione --</option>
            @foreach($clientes as $c)
                <option value="{{ $c->id }}" @selected(old('cliente_id') == $c->id)>{{ $c->nome }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Barbeiro</label>
        <select name="funcionario_id" required class="w-full p-2 border rounded">
            <option value="">-- selecione --</option>
            @foreach($barbeiros as $b)
                <option value="{{ $b->id }}" @selected(old('funcionario_id') == $b->id)>{{ $b->name }} ({{ $b->role }})</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Serviço</label>
        <select name="servico_id" required class="w-full p-2 border rounded">
            <option value="">-- selecione --</option>
            @foreach($servicos as $s)
                <option value="{{ $s->id }}" @selected(old('servico_id') == $s->id)>{{ $s->nome }} — R$ {{ number_format($s->preco,2,',','.') }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Data e hora</label>
        <input type="datetime-local" name="data_hora" required value="{{ old('data_hora') }}" class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block mb-1">Observação</label>
        <textarea name="observacao" class="w-full p-2 border rounded">{{ old('observacao') }}</textarea>
    </div>

    <div>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Salvar</button>
    </div>
</form>
@endsection
