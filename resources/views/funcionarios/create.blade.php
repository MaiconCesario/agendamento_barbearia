@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Novo Funcionário</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('funcionarios.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label for="nome" class="block mb-1 font-medium">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="email" class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="senha" class="block mb-1 font-medium">Senha</label>
            <input type="password" name="senha" id="senha" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="tipo" class="block mb-1 font-medium">Tipo</label>
            <select name="tipo" id="tipo" class="w-full border p-2 rounded" required>
                <option value="admin" {{ old('tipo') == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="barbeiro" {{ old('tipo') == 'barbeiro' ? 'selected' : '' }}>Barbeiro</option>
            </select>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('funcionarios.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Voltar</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Salvar</button>
        </div>
    </form>
</div>
@endsection
