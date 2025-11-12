@extends('layouts.app')


@section('title', 'Clientes')


@section('content')
    <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Novo</a>
    </div>


    <table class="w-full bg-white rounded shadow overflow-hidden">
    <thead>
    <tr class="bg-gray-50 text-left">
    <th class="p-3">Nome</th>
    <th class="p-3">Email</th>
    <th class="p-3">Telefone</th>
    <th class="p-3">Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)
    <tr class="border-t">
    <td class="p-3">{{ $cliente->nome }}</td>
    <td class="p-3">{{ $cliente->email }}</td>
    <td class="p-3">{{ $cliente->telefone }}</td>
    <td class="p-3">
    <a href="{{ route('clientes.edit', $cliente) }}" class="text-blue-600 mr-2">Editar</a>
    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline">
    @csrf @method('DELETE')
    <button type="submit" class="text-red-600" onclick="return confirm('Confirma?')">Excluir</button>
    </form>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>


    <div class="mt-4">{{ $clientes->links() }}</div>
@endsection