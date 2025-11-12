@extends('layouts.app')
@section('title','Editar Cliente')
@section('content')
<h1 class="text-2xl mb-4">Editar Cliente</h1>

<form action="{{ route('clientes.update', $cliente) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf @method('PUT')
    <div>
        <label class="block mb-1">Nome</label>
        <input type="text" name="nome" value="{{ old('nome', $cliente->nome) }}" required class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $cliente->email) }}" class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block mb-1">Telefone</label>
        <input type="text" name="telefone" value="{{ old('telefone', $cliente->telefone) }}" class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block mb-1">Observação</label>
        <textarea name="observacao" class="w-full p-2 border rounded">{{ old('observacao', $cliente->observacao) }}</textarea>
    </div>

    <div>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Atualizar</button>
    </div>
</form>
@endsection
