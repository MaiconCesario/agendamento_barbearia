@extends('layouts.app')
@section('title','Agendamentos')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Agendamentos</h1>
    <a href="{{ route('agendamentos.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Novo Agendamento</a>
</div>

<div class="mb-4">
    <form method="GET" class="flex items-center gap-2">
        <select name="barbeiro_id" class="p-2 border rounded">
            <option value="">Todos barbeiros</option>
            @foreach($barbeiros as $b)
                <option value="{{ $b->id }}" @selected(request('barbeiro_id') == $b->id)>{{ $b->name }}</option>
            @endforeach
        </select>
        <input type="date" name="data" value="{{ request('data') }}" class="p-2 border rounded">
        <button class="bg-gray-600 text-white px-3 py-2 rounded">Filtrar</button>
    </form>
</div>

<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="p-3 text-left">Data / Hora</th>
                <th class="p-3 text-left">Cliente</th>
                <th class="p-3 text-left">Barbeiro</th>
                <th class="p-3 text-left">Serviço</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendamentos as $a)
                <tr class="border-t">
                    <td class="p-3">{{ $a->data_hora->format('d/m/Y H:i') }}</td>
                    <td class="p-3">{{ $a->cliente->nome }}</td>
                    <td class="p-3">{{ $a->barbeiro ? $a->barbeiro->nome : '—' }}</td>
                    <td class="p-3">{{ $a->servico->nome }}</td>
                    <td class="p-3">{{ ucfirst($a->status) }}</td>
                    <td class="p-3">
                        <a href="{{ route('agendamentos.show', $a) }}" class="text-blue-600 mr-2">Ver</a>
                        <a href="{{ route('agendamentos.edit', $a) }}" class="text-blue-600 mr-2">Editar</a>
                        <form action="{{ route('agendamentos.destroy', $a) }}" method="POST" class="inline" onsubmit="return confirm('Confirma exclusão?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $agendamentos->links() }}</div>
@endsection
