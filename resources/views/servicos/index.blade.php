@extends('layouts.app')
@section('title','Serviços')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Serviços</h1>
    <a href="{{ route('servicos.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Novo Serviço</a>
</div>

<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="p-3 text-left">Nome</th>
                <th class="p-3 text-left">Preço</th>
                <th class="p-3 text-left">Duração (min)</th>
                <th class="p-3 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicos as $s)
                <tr class="border-t">
                    <td class="p-3">{{ $s->nome }}</td>
                    <td class="p-3">R$ {{ number_format($s->preco,2,',','.') }}</td>
                    <td class="p-3">{{ $s->duracao }}</td>
                    <td class="p-3">
                        <a href="{{ route('servicos.edit', $s) }}" class="text-blue-600 mr-2">Editar</a>
                        <form action="{{ route('servicos.destroy', $s) }}" method="POST" class="inline" onsubmit="return confirm('Confirma exclusão?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $servicos->links() }}
</div>
@endsection
