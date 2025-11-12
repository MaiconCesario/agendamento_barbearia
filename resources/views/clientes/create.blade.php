@extends('layouts.app')
@section('title','Novo Cliente')
@section('content')
<h1 class="text-2xl mb-4">Novo Cliente</h1>

<form action="{{ route('clientes.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf
    <div>
        <label class="block mb-1">Nome</label>
        <input type="text" name="nome" value="{{ old('nome') }}" required class="w-full p-2 border rounded">
        @error('nome') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="w-full p-2 border rounded">
        @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-1">Telefone</label>
        <input type="text" name="telefone" value="{{ old('telefone') }}" class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block mb-1">Observação</label>
        <textarea name="observacao" class="w-full p-2 border rounded">{{ old('observacao') }}</textarea>
    </div>

    <div>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Salvar</button>
    </div>
</form>
@endsection
