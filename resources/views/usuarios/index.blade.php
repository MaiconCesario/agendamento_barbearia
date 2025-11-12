@extends('layouts.app')
@section('title','Usuários')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Usuários</h1>
    <a href="{{ route('usuarios.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Novo Usuário</a>
</div>

<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="p-3 text-left">Nome</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Role</th>
                <th class="p-3 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $u)
                <tr class="border-t">
                    <td class="p-3">{{ $u->name }}</td>
                    <td class="p-3">{{ $u->email }}</td>
                    <td class="p-3">{{ $u->role }}</td>
                    <td class="p-3">
                        <a href="{{ route('usuarios.edit', $u) }}" class="text-blue-600 mr-2">Editar</a>
                        @if(auth()->id() !== $u->id)
                            <form action="{{ route('usuarios.destroy', $u) }}" method="POST" class="inline" onsubmit="return confirm('Confirma exclusão?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600">Excluir</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $usuarios->links() }}</div>
@endsection
