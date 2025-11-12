@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Funcionários</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('funcionarios.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Novo Funcionário</a>

    <table class="w-full mt-6 border border-gray-200 rounded-lg">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3 border-b">#</th>
                <th class="p-3 border-b">Nome</th>
                <th class="p-3 border-b">Email</th>
                <th class="p-3 border-b">Tipo</th>
                <th class="p-3 border-b text-right">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($funcionarios as $f)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $f->id }}</td>
                    <td class="p-3">{{ $f->nome }}</td>
                    <td class="p-3">{{ $f->email }}</td>
                    <td class="p-3">{{ ucfirst($f->tipo) }}</td>
                    <td class="p-3 text-right">
                        <a href="{{ route('funcionarios.show', $f) }}" class="text-blue-600 hover:underline">Ver</a> |
                        <a href="{{ route('funcionarios.edit', $f) }}" class="text-yellow-600 hover:underline">Editar</a> |
                        <form action="{{ route('funcionarios.destroy', $f) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline" onclick="return confirm('Excluir este funcionário?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="p-3 text-center text-gray-500">Nenhum funcionário encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
