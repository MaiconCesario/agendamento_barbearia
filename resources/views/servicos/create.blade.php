@extends('layouts.app')
@section('title','Novo Serviço')
@section('content')
<h1 class="text-2xl mb-4">Novo Serviço</h1>

<form action="{{ route('servicos.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf
    <div>
        <label class="block mb-1">Nome</label>
        <input type="text" name="nome" value="{{ old('nome') }}" required class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block mb-1">Preço</label>
        <input type="number" name="preco" value="{{ old('preco', '0.00') }}" step="0.01" required class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block mb-1">Duração (min)</label>
        <input type="number" name="duracao" value="{{ old('duracao', 30) }}" required class="w-full p-2 border rounded">
    </div>

    <div>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Salvar</button>
    </div>
</form>
@endsection
