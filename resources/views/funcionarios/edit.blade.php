@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Editar Funcionário</h1>

    <form method="POST" action="{{ route('funcionarios.update', $funcionario) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Nome</label>
            <input type="text" name="nome" value="{{ old('nome', $funcionario->nome) }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email', $funcionario->email) }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-semibold">Nova Senha (opcional)</label>
            <input type="password" name="senha" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-semibold">Tipo</label>
            <select name="tipo" class="w-full border rounded p-2">
                <option value="barbeiro" @selected($funcionario->tipo === 'barbeiro')>Barbeiro</option>
                <option value="admin" @selected($funcionario->tipo === 'admin')>Admin</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Atualizar</button>
        <a href="{{ route('funcionarios.index') }}" class="ml-2 text-gray-600 hover:underline">Voltar</a>
    </form>
</div>
@endsection
