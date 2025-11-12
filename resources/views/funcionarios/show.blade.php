@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Detalhes do Funcionário</h1>

    <div class="bg-white shadow rounded p-4 space-y-3">
        <p><strong>ID:</strong> {{ $funcionario->id }}</p>
        <p><strong>Nome:</strong> {{ $funcionario->nome }}</p>
        <p><strong>Email:</strong> {{ $funcionario->email }}</p>
        <p><strong>Tipo:</strong> {{ ucfirst($funcionario->tipo) }}</p>
        <p><strong>Criado em:</strong> {{ $funcionario->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="mt-6">
        <a href="{{ route('funcionarios.edit', $funcionario) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
        <a href="{{ route('funcionarios.index') }}" class="ml-2 text-gray-600 hover:underline">Voltar</a>
    </div>
</div>
@endsection
